<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori' => 'Elektronik',
                'slug'          => 'elektronik',
                'deskripsi'     => 'Produk elektronik berkualitas tinggi',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori' => 'Fashion',
                'slug'          => 'fashion',
                'deskripsi'     => 'Koleksi fashion terbaru dan trendy',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori' => 'Makanan & Minuman',
                'slug'          => 'makanan-minuman',
                'deskripsi'     => 'Produk makanan dan minuman pilihan',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori' => 'Kesehatan',
                'slug'          => 'kesehatan',
                'deskripsi'     => 'Produk kesehatan dan kecantikan',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('product_categories')->insertBatch($data);

        // Insert sample products
        $products = [
            [
                'category_id'  => 1,
                'nama_produk'  => 'Wireless Bluetooth Headphone',
                'slug'         => 'wireless-bluetooth-headphone',
                'deskripsi'    => 'Headphone bluetooth nirkabel dengan kualitas suara premium. Dilengkapi noise cancellation dan baterai tahan lama hingga 30 jam. Desain ergonomis dan nyaman untuk penggunaan sepanjang hari.',
                'harga'        => 350000,
                'stok'         => 25,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 1,
                'nama_produk'  => 'Smart Watch Pro X',
                'slug'         => 'smart-watch-pro-x',
                'deskripsi'    => 'Smartwatch canggih dengan fitur health monitoring, GPS tracking, dan notifikasi smartphone. Layar AMOLED 1.4 inch dengan resolusi tinggi.',
                'harga'        => 899000,
                'stok'         => 15,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 2,
                'nama_produk'  => 'Kaos Premium Cotton',
                'slug'         => 'kaos-premium-cotton',
                'deskripsi'    => 'Kaos berbahan cotton combed 30s premium, nyaman dan tidak mudah kusut. Tersedia dalam berbagai ukuran S, M, L, XL.',
                'harga'        => 125000,
                'stok'         => 100,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 2,
                'nama_produk'  => 'Jaket Windbreaker Sport',
                'slug'         => 'jaket-windbreaker-sport',
                'deskripsi'    => 'Jaket windbreaker ringan, anti air dan tahan angin. Cocok untuk aktivitas outdoor dan olahraga.',
                'harga'        => 275000,
                'stok'         => 30,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 3,
                'nama_produk'  => 'Kopi Arabica Premium 250g',
                'slug'         => 'kopi-arabica-premium-250g',
                'deskripsi'    => 'Biji kopi arabica premium dari perkebunan pilihan Indonesia. Roasting medium dengan aroma dan cita rasa yang khas.',
                'harga'        => 85000,
                'stok'         => 50,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 4,
                'nama_produk'  => 'Vitamin C 1000mg',
                'slug'         => 'vitamin-c-1000mg',
                'deskripsi'    => 'Suplemen vitamin C 1000mg untuk meningkatkan daya tahan tubuh. Isi 30 tablet, diminum 1 tablet per hari.',
                'harga'        => 65000,
                'stok'         => 75,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('products')->insertBatch($products);

        // Insert admin user
        $this->db->table('users')->insert([
            'username'     => 'admin',
            'email'        => 'admin@compro.com',
            'password'     => password_hash('admin123', PASSWORD_DEFAULT),
            'nama_lengkap' => 'Administrator',
            'role'         => 'admin',
            'status'       => 1,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s'),
        ]);
    }
}
