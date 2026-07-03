<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table            = 'payments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'order_id', 'nama_pengirim', 'bank_pengirim',
        'jumlah_transfer', 'bukti_transfer', 'catatan',
        'status', 'verified_at',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPaymentByOrderId($orderId)
    {
        return $this->where('order_id', $orderId)->first();
    }

    public function getPaymentsByStatus($status = null)
    {
        $builder = $this->select('payments.*, orders.nomor_order, orders.nama_customer, orders.total_harga as order_total')
                        ->join('orders', 'orders.id = payments.order_id');

        if ($status) {
            $builder->where('payments.status', $status);
        }

        return $builder->orderBy('payments.created_at', 'DESC')->findAll();
    }
}
