<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey     = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'email', 'password', 'nama_lengkap', 'role', 'status', 'google_id', 'avatar'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[100]|is_unique[users.username]',
        'email'    => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
    ];

    protected $validationMessages = [
        'username' => [
            'is_unique' => 'Username sudah digunakan.',
        ],
        'email' => [
            'is_unique' => 'Email sudah digunakan.',
        ],
    ];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getUserByGoogleId($googleId)
    {
        return $this->where('google_id', $googleId)->first();
    }

    /**
     * Create or update user from Google OAuth data
     */
    public function findOrCreateGoogleUser($googleData)
    {
        // Check if user exists by google_id
        $user = $this->getUserByGoogleId($googleData['google_id']);
        if ($user) {
            // Update avatar & name
            $this->update($user['id'], [
                'avatar'       => $googleData['avatar'],
                'nama_lengkap' => $googleData['nama_lengkap'],
            ]);
            return $this->find($user['id']);
        }

        // Check if user exists by email
        $user = $this->getUserByEmail($googleData['email']);
        if ($user) {
            // Link google_id to existing account
            $this->update($user['id'], [
                'google_id'    => $googleData['google_id'],
                'avatar'       => $googleData['avatar'],
            ]);
            return $this->find($user['id']);
        }

        // Create new user
        $this->skipValidation(true)->save([
            'username'     => 'google_' . $googleData['google_id'],
            'email'        => $googleData['email'],
            'password'     => password_hash(bin2hex(random_bytes(16)), PASSWORD_DEFAULT),
            'nama_lengkap' => $googleData['nama_lengkap'],
            'google_id'    => $googleData['google_id'],
            'avatar'       => $googleData['avatar'],
            'role'         => 'user',
            'status'       => 1,
        ]);

        return $this->find($this->getInsertID());
    }
}
