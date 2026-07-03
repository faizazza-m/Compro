<?php

namespace App\Controllers;

use App\Models\UserModel;
use Google\Client as GoogleClient;

class GoogleAuth extends BaseController
{
    protected $userModel;
    protected $googleClient;

    public function __construct()
    {
        $this->userModel = new UserModel();

        $this->googleClient = new GoogleClient();
        $this->googleClient->setClientId(getenv('GOOGLE_CLIENT_ID') ?: '');
        $this->googleClient->setClientSecret(getenv('GOOGLE_CLIENT_SECRET') ?: '');
        $this->googleClient->setRedirectUri(base_url('auth/google/callback'));
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    /**
     * Redirect to Google OAuth consent screen
     */
    public function login()
    {
        $authUrl = $this->googleClient->createAuthUrl();
        return redirect()->to($authUrl);
    }

    /**
     * Handle Google OAuth callback
     */
    public function callback()
    {
        $code = $this->request->getGet('code');

        if (!$code) {
            return redirect()->to('/')->with('error', 'Login Google gagal. Silakan coba lagi.');
        }

        try {
            // Exchange authorization code for access token
            $token = $this->googleClient->fetchAccessTokenWithAuthCode($code);

            if (isset($token['error'])) {
                return redirect()->to('/')->with('error', 'Login Google gagal: ' . $token['error_description']);
            }

            $this->googleClient->setAccessToken($token);

            // Get user profile
            $oauth2 = new \Google\Service\Oauth2($this->googleClient);
            $googleUser = $oauth2->userinfo->get();

            // Find or create user
            $user = $this->userModel->findOrCreateGoogleUser([
                'google_id'    => $googleUser->id,
                'email'        => $googleUser->email,
                'nama_lengkap' => $googleUser->name,
                'avatar'       => $googleUser->picture,
            ]);

            if (!$user || $user['status'] != 1) {
                return redirect()->to('/')->with('error', 'Akun Anda tidak aktif.');
            }

            // Set session
            $sessionData = [
                'id'           => $user['id'],
                'username'     => $user['username'],
                'email'        => $user['email'],
                'nama_lengkap' => $user['nama_lengkap'],
                'avatar'       => $user['avatar'],
                'role'         => $user['role'],
                'isLoggedIn'   => true,
            ];

            session()->set($sessionData);

            // Redirect based on role
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin')->with('success', 'Selamat datang, ' . $user['nama_lengkap']);
            }

            return redirect()->to('/')->with('success', 'Selamat datang, ' . $user['nama_lengkap'] . '! 🎉');

        } catch (\Exception $e) {
            log_message('error', 'Google Auth Error: ' . $e->getMessage());
            return redirect()->to('/')->with('error', 'Terjadi kesalahan saat login Google. Silakan coba lagi.');
        }
    }
}
