<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCatering;

class MenuCateringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'nama_menu' => 'Nasi Tumpeng Komplit Special',
                'kategori' => 'Paket Prasmanan',
                'harga' => 45000,
                'minimal_porsi' => 20,
                'status' => 'Tersedia',
                'foto' => 'res_img_1.jpg',
                'deskripsi' => 'Nasi kuning gurih harum dengan lauk ayam goreng kremes, perkedel kentang, sambal goreng ati kentang, telur dadar iris, kering tempe manis, dan urap sayur segar.',
            ],
            [
                'nama_menu' => 'Paket Prasmanan Nusantara Gold',
                'kategori' => 'Paket Prasmanan',
                'harga' => 65000,
                'minimal_porsi' => 50,
                'status' => 'Tersedia',
                'foto' => 'res_img_2.jpg',
                'deskripsi' => 'Pilihan prasmanan lengkap: Nasi putih/nasi kebuli, Daging Rendang Minang, Ayam Bakar Madu, Kakap Asam Manis, Sop Kimlo, Asinan Pengantin, Kerupuk Udang, dan Buah Potong.',
            ],
            [
                'nama_menu' => 'Ayam Bakar Madu Nala',
                'kategori' => 'Main Course',
                'harga' => 32000,
                'minimal_porsi' => 10,
                'status' => 'Tersedia',
                'foto' => 'res_img_3.jpg',
                'deskripsi' => 'Ayam bakar dengan bumbu madu rempah pilihan yang meresap hingga ke serat daging, disajikan dengan lalapan segar dan sambal bajak khas Nala.',
            ],
            [
                'nama_menu' => 'Rendang Daging Sapi Payakumbuh',
                'kategori' => 'Main Course',
                'harga' => 42000,
                'minimal_porsi' => 10,
                'status' => 'Tersedia',
                'foto' => 'res_img_4.jpg',
                'deskripsi' => 'Potongan daging sapi empuk dimasak perlahan dengan santan kental dan rempah-rempah asli Nusantara hingga berwarna gelap dan kaya rasa.',
            ],
            [
                'nama_menu' => 'Lumpia Basah Semarang',
                'kategori' => 'Starter',
                'harga' => 18000,
                'minimal_porsi' => 15,
                'status' => 'Tersedia',
                'foto' => 'res_img_7.jpg',
                'deskripsi' => 'Lumpia isi rebung segar, udang cincang, dan telur dengan saus kental manis gurih serta daun bawang segar.',
            ],
            [
                'nama_menu' => 'Pastel Tutup Premium',
                'kategori' => 'Starter',
                'harga' => 22000,
                'minimal_porsi' => 15,
                'status' => 'Tersedia',
                'foto' => 'res_img_8.jpg',
                'deskripsi' => 'Kudapan pembuka kentang lembut panggang berlapis isian daging cincang, wortel, buncis, soun, dan keju gurih meleleh.',
            ],
            [
                'nama_menu' => 'Pudding Coklat Fla Vanilla',
                'kategori' => 'Dessert',
                'harga' => 15000,
                'minimal_porsi' => 20,
                'status' => 'Tersedia',
                'foto' => 'res_img_6.jpg',
                'deskripsi' => 'Puding coklat pekat lembut bertekstur sutra disiram saus fla vanila yang manis legit dan wangi.',
            ],
            [
                'nama_menu' => 'Es Cendol Durian Nala',
                'kategori' => 'Beverage',
                'harga' => 20000,
                'minimal_porsi' => 20,
                'status' => 'Tersedia',
                'foto' => 'res_img_5.jpg',
                'deskripsi' => 'Minuman tradisional cendol daun suji alami berpadu santan gurih, gula aren asli, dan topping daging durian medan berkualitas.',
            ],
            [
                'nama_menu' => 'Snack Box Arisan & Rapat',
                'kategori' => 'Snack Box',
                'harga' => 17500,
                'minimal_porsi' => 20,
                'status' => 'Tersedia',
                'foto' => 'res_img_7.jpg',
                'deskripsi' => 'Paket snack box berisi 3 kue (Lemper Ayam, Risoles Ragout Mayo, Pie Buah) plus air mineral cup 220ml.',
            ],
        ];

        foreach ($menus as $menu) {
            MenuCatering::updateOrCreate(
                ['nama_menu' => $menu['nama_menu']],
                $menu
            );
        }
    }
}
