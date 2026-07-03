<?php

namespace App\Controllers;

use App\Models\PaymentModel;
use App\Models\OrderModel;

class AdminPayment extends BaseController
{
    protected $paymentModel;
    protected $orderModel;

    public function __construct()
    {
        $this->paymentModel = new PaymentModel();
        $this->orderModel   = new OrderModel();
    }

    public function index()
    {
        $status = $this->request->getGet('status');

        $data = [
            'title'         => 'Verifikasi Pembayaran',
            'payments'      => $this->paymentModel->getPaymentsByStatus($status),
            'currentStatus' => $status,
        ];

        return view('admin/payment/index', $data);
    }

    public function verify($id)
    {
        $payment = $this->paymentModel->find($id);

        if (!$payment) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data pembayaran tidak ditemukan.');
        }

        $action = $this->request->getPost('action');

        if ($action === 'verify') {
            $this->paymentModel->update($id, [
                'status'      => 'verified',
                'verified_at' => date('Y-m-d H:i:s'),
            ]);

            // Update order status to diproses
            $this->orderModel->update($payment['order_id'], [
                'status' => 'diproses',
            ]);

            return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran berhasil diverifikasi.');

        } elseif ($action === 'reject') {
            $this->paymentModel->update($id, [
                'status' => 'rejected',
            ]);

            return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran ditolak. Customer akan diminta untuk mengirim ulang bukti transfer.');
        }

        return redirect()->back()->with('error', 'Aksi tidak valid.');
    }
}
