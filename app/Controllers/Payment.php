<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\PaymentModel;

class Payment extends BaseController
{
    protected $orderModel;
    protected $paymentModel;

    public function __construct()
    {
        $this->orderModel   = new OrderModel();
        $this->paymentModel = new PaymentModel();
    }

    /**
     * Show payment form for a specific order
     */
    public function create($nomorOrder)
    {
        $order = $this->orderModel->getOrderByNomor($nomorOrder);

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pesanan tidak ditemukan.');
        }

        // Check if payment already submitted
        $existingPayment = $this->paymentModel->getPaymentByOrderId($order['id']);

        $data = [
            'title'   => 'Konfirmasi Pembayaran',
            'order'   => $order,
            'payment' => $existingPayment,
        ];

        return view('frontend/payment/form', $data);
    }

    /**
     * Store payment confirmation
     */
    public function store()
    {
        $rules = [
            'order_id'        => 'required|integer',
            'nama_pengirim'   => 'required|min_length[2]|max_length[255]',
            'bank_pengirim'   => 'required|min_length[2]|max_length[100]',
            'jumlah_transfer' => 'required|numeric',
            'bukti_transfer'  => 'uploaded[bukti_transfer]|max_size[bukti_transfer,3072]|is_image[bukti_transfer]|mime_in[bukti_transfer,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $orderId = $this->request->getPost('order_id');
        $order = $this->orderModel->find($orderId);

        if (!$order) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        // Check if payment already exists
        $existingPayment = $this->paymentModel->getPaymentByOrderId($orderId);
        if ($existingPayment && $existingPayment['status'] !== 'rejected') {
            return redirect()->back()->with('error', 'Konfirmasi pembayaran sudah pernah diajukan.');
        }

        // Upload bukti transfer
        $buktiFile = $this->request->getFile('bukti_transfer');
        $buktiName = null;
        if ($buktiFile && $buktiFile->isValid() && !$buktiFile->hasMoved()) {
            $buktiName = $buktiFile->getRandomName();
            $buktiFile->move(FCPATH . 'uploads/payments', $buktiName);
        }

        // If re-submitting after rejection, delete old one
        if ($existingPayment && $existingPayment['status'] === 'rejected') {
            if ($existingPayment['bukti_transfer'] && file_exists(FCPATH . 'uploads/payments/' . $existingPayment['bukti_transfer'])) {
                unlink(FCPATH . 'uploads/payments/' . $existingPayment['bukti_transfer']);
            }
            $this->paymentModel->delete($existingPayment['id']);
        }

        $this->paymentModel->save([
            'order_id'        => $orderId,
            'nama_pengirim'   => $this->request->getPost('nama_pengirim'),
            'bank_pengirim'   => $this->request->getPost('bank_pengirim'),
            'jumlah_transfer' => $this->request->getPost('jumlah_transfer'),
            'bukti_transfer'  => $buktiName,
            'catatan'         => $this->request->getPost('catatan'),
            'status'          => 'pending',
        ]);

        return redirect()->to('/payment/status/' . $order['nomor_order'])
                         ->with('success', 'Konfirmasi pembayaran berhasil dikirim! Admin akan memverifikasi dalam 1x24 jam.');
    }

    /**
     * Show payment status
     */
    public function status($nomorOrder)
    {
        $order = $this->orderModel->getOrderByNomor($nomorOrder);

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pesanan tidak ditemukan.');
        }

        $payment = $this->paymentModel->getPaymentByOrderId($order['id']);

        $data = [
            'title'   => 'Status Pembayaran',
            'order'   => $order,
            'payment' => $payment,
        ];

        return view('frontend/payment/status', $data);
    }
}
