<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VespaSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

        // Clear existing data
        $this->db->table('order_details')->truncate();
        $this->db->table('payments')->truncate();
        $this->db->table('orders')->truncate();
        $this->db->table('products')->truncate();
        $this->db->table('product_categories')->truncate();

        // Re-enable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');

        // Insert Vespa categories
        $categories = [
            [
                'nama_kategori' => 'Mesin & Performa',
                'slug'          => 'mesin-performa',
                'deskripsi'     => 'Sparepart mesin vespa, karburator, piston, blok silinder, dan komponen performa',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori' => 'Body & Eksterior',
                'slug'          => 'body-eksterior',
                'deskripsi'     => 'Panel body, fender, legshield, side panel, dan aksesoris eksterior vespa',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori' => 'Kelistrikan',
                'slug'          => 'kelistrikan',
                'deskripsi'     => 'Spul, CDI, lampu, kabel body, saklar, dan komponen kelistrikan vespa',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori' => 'Rem & Suspensi',
                'slug'          => 'rem-suspensi',
                'deskripsi'     => 'Kampas rem, shockbreaker, per, bearing, dan komponen chassis vespa',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori' => 'Aksesoris',
                'slug'          => 'aksesoris',
                'deskripsi'     => 'Spion, jok, rak, windshield, floormat, dan aksesoris tambahan vespa',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori' => 'Ban & Velg',
                'slug'          => 'ban-velg',
                'deskripsi'     => 'Ban tubeless, ban dalam, velg racing, dan komponen roda vespa',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('product_categories')->insertBatch($categories);

        // Insert Vespa sparepart products
        $products = [
            // Mesin & Performa (category 1)
            [
                'category_id'  => 1,
                'nama_produk'  => 'Karburator PE 24 Keihin Racing',
                'slug'         => 'karburator-pe-24-keihin-racing',
                'deskripsi'    => 'Karburator PE 24 Keihin untuk vespa klasik. Cocok untuk mesin PX 150, Sprint, VBB. Bore 24mm dengan pilot jet dan main jet sudah termasuk. Karburator racing yang memberikan performa tarikan lebih responsif dan bertenaga.',
                'harga'        => 850000,
                'stok'         => 15,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 1,
                'nama_produk'  => 'Piston Kit Vespa PX 150 (63mm)',
                'slug'         => 'piston-kit-vespa-px-150',
                'deskripsi'    => 'Piston kit lengkap untuk Vespa PX 150. Diameter 63mm standar. Termasuk piston, ring piston, pen piston, dan klip. Bahan aluminium alloy berkualitas tinggi, tahan panas dan awet.',
                'harga'        => 275000,
                'stok'         => 30,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 1,
                'nama_produk'  => 'Kopling Set Vespa PX/Excel/Spartan',
                'slug'         => 'kopling-set-vespa-px-excel',
                'deskripsi'    => 'Kopling set komplit untuk Vespa PX, Excel, dan Spartan. Termasuk plat kopling, per kopling, dan kampas kopling. Bahan cork import anti slip. Kopling halus dan presisi.',
                'harga'        => 385000,
                'stok'         => 20,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 1,
                'nama_produk'  => 'Knalpot Racing Vespa PX Chrome',
                'slug'         => 'knalpot-racing-vespa-px-chrome',
                'deskripsi'    => 'Knalpot racing untuk Vespa PX series. Finishing chrome berkualitas. Desain expansion chamber untuk performa maksimal. Suara bass ngebas. Cocok untuk daily use dan touring.',
                'harga'        => 650000,
                'stok'         => 10,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],

            // Body & Eksterior (category 2)
            [
                'category_id'  => 2,
                'nama_produk'  => 'Legshield Vespa Sprint Chrome',
                'slug'         => 'legshield-vespa-sprint-chrome',
                'deskripsi'    => 'Legshield chrome untuk Vespa Sprint/Primavera. Bahan stainless steel anti karat. Pemasangan mudah, bolt-on tanpa modifikasi. Memberikan tampilan klasik mewah pada vespa Anda.',
                'harga'        => 450000,
                'stok'         => 12,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 2,
                'nama_produk'  => 'Side Panel Vespa PX (Kiri-Kanan)',
                'slug'         => 'side-panel-vespa-px-set',
                'deskripsi'    => 'Set side panel kiri dan kanan untuk Vespa PX series. Bahan besi press tebal. Sudah termasuk engsel dan pengait. Cat dasar primer siap repaint sesuai warna vespa Anda.',
                'harga'        => 550000,
                'stok'         => 8,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 2,
                'nama_produk'  => 'Fender Depan Vespa Super/Sprint',
                'slug'         => 'fender-depan-vespa-super-sprint',
                'deskripsi'    => 'Fender depan (spakbor depan) untuk Vespa Super dan Sprint klasik. Bahan besi press berkualitas dengan ketebalan standar. Cat primer siap repaint.',
                'harga'        => 425000,
                'stok'         => 10,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],

            // Kelistrikan (category 3)
            [
                'category_id'  => 3,
                'nama_produk'  => 'CDI Racing Vespa PX/Excel Programmable',
                'slug'         => 'cdi-racing-vespa-px-programmable',
                'deskripsi'    => 'CDI racing programmable untuk Vespa PX dan Excel. Mapping pengapian bisa disesuaikan. Fitur rev limiter, timing advance, dan launch control. Plug and play tanpa potong kabel.',
                'harga'        => 380000,
                'stok'         => 25,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 3,
                'nama_produk'  => 'Spul/Stator Vespa PX 12V',
                'slug'         => 'spul-stator-vespa-px-12v',
                'deskripsi'    => 'Spul (stator) 12 volt untuk Vespa PX series. Output 12V stabil untuk kelistrikan modern. Cocok untuk upgrade lampu LED dan klakson. Termasuk platina dan kabel.',
                'harga'        => 295000,
                'stok'         => 18,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 3,
                'nama_produk'  => 'Lampu LED Headlight Vespa Daymaker 5.75"',
                'slug'         => 'lampu-led-headlight-vespa-daymaker',
                'deskripsi'    => 'Lampu depan LED daymaker 5.75 inch untuk vespa klasik. Super terang 45W, 6000K putih. Projector lens, low beam dan high beam. Plug and play, langsung pasang.',
                'harga'        => 320000,
                'stok'         => 22,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],

            // Rem & Suspensi (category 4)
            [
                'category_id'  => 4,
                'nama_produk'  => 'Shockbreaker Belakang YSS Vespa',
                'slug'         => 'shockbreaker-belakang-yss-vespa',
                'deskripsi'    => 'Shockbreaker belakang YSS G-Series untuk vespa klasik. Panjang 280mm, adjustable preload. Gas charged untuk kenyamanan maksimal. Warna hitam/chrome.',
                'harga'        => 750000,
                'stok'         => 14,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 4,
                'nama_produk'  => 'Kampas Rem Depan Vespa Sprint/GTS',
                'slug'         => 'kampas-rem-depan-vespa-sprint-gts',
                'deskripsi'    => 'Kampas rem depan untuk Vespa Sprint, Primavera, dan GTS. Bahan semi-metallic, daya cengkram kuat. Tahan panas dan awet. OEM quality replacement.',
                'harga'        => 125000,
                'stok'         => 40,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],

            // Aksesoris (category 5)
            [
                'category_id'  => 5,
                'nama_produk'  => 'Jok Custom Vespa PX Double Seat',
                'slug'         => 'jok-custom-vespa-px-double-seat',
                'deskripsi'    => 'Jok custom double seat untuk Vespa PX series. Bahan kulit sintetis premium anti air. Busa tebal 10cm ultra nyaman. Warna hitam, coklat, dan tan tersedia.',
                'harga'        => 485000,
                'stok'         => 16,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 5,
                'nama_produk'  => 'Spion Bar End Vespa Chrome CNC',
                'slug'         => 'spion-bar-end-vespa-chrome-cnc',
                'deskripsi'    => 'Spion bar end CNC aluminium untuk vespa. Finishing chrome. Bisa dipasang di semua tipe vespa klasik dan modern. Kaca convex anti silau. Sepasang kiri-kanan.',
                'harga'        => 185000,
                'stok'         => 35,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 5,
                'nama_produk'  => 'Rack Belakang Vespa PX Chrome',
                'slug'         => 'rack-belakang-vespa-px-chrome',
                'deskripsi'    => 'Rack belakang chrome untuk Vespa PX. Bahan besi chrome anti karat. Kuat menahan beban hingga 10kg. Cocok untuk touring, bisa dipasangi box/tas.',
                'harga'        => 275000,
                'stok'         => 20,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],

            // Ban & Velg (category 6)
            [
                'category_id'  => 6,
                'nama_produk'  => 'Ban Tubeless Michelin S1 3.50-10',
                'slug'         => 'ban-tubeless-michelin-s1-350-10',
                'deskripsi'    => 'Ban tubeless Michelin S1 ukuran 3.50-10 untuk vespa. Compound premium, grip kuat di segala kondisi jalan. Sidewall tebal, tahan tusukan. Ban favorit untuk touring.',
                'harga'        => 395000,
                'stok'         => 24,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'  => 6,
                'nama_produk'  => 'Velg Racing Vespa 10 inch Polished',
                'slug'         => 'velg-racing-vespa-10-inch-polished',
                'deskripsi'    => 'Velg racing aluminium 10 inch untuk vespa klasik. Split rim, finishing polished mirror. Ringan dan kuat. Cocok untuk tampilan klasik modern. Termasuk pentil tubeless.',
                'harga'        => 1250000,
                'stok'         => 8,
                'gambar'       => null,
                'status'       => 'aktif',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('products')->insertBatch($products);
    }
}
