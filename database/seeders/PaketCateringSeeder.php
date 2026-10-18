<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaketCatering;

class PaketCateringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pakets = [
            [
                'nama_paket' => 'Paket Prasmanan Royal Nusantara',
                'jenis_paket' => 'Prasmanan',
                'harga_paket' => 65000,
                'minimal_porsi' => 50,
                'deskripsi' => 'Nasi Putih / Nasi Liwet Gurih, Sop Ayam Jagung Sosis, Daging Sapi Rendang Padang, Ayam Bakar Bumbu Rujak, Kakap Asam Manis, Capcay Seafood, Kerupuk Udang, Sambal & Lalapan, Es Buah Cocktail, Puding Coklat Fla Vanilla.',
                'fasilitas' => 'Meja prasmanan berdekorasi, pemanas roll top stainless steel, piring sendok garpu, waiter/pramusaji standby 4 jam, gratis ongkir se-kota.',
                'status' => 'Tersedia',
                'foto' => 'res_img_6.jpg',
            ],
            [
                'nama_paket' => 'Paket Prasmanan Deluxe Silaturahmi',
                'jenis_paket' => 'Prasmanan',
                'harga_paket' => 45000,
                'minimal_porsi' => 30,
                'deskripsi' => 'Nasi Putih, Soto Ayam Ambengan, Ayam Goreng Lengkuas, Sambal Goreng Ati Kentang, Tumis Buncis Daging Giling, Kerupuk, Sambal Bajak, Es Cincau Kelapa Muda, Buah Semangka & Melon Potong.',
                'fasilitas' => 'Peralatan prasmanan lengkap, piring sendok, pemanas roll top, 1 petugas standby, pengantaran tepat waktu.',
                'status' => 'Tersedia',
                'foto' => 'res_img_5.jpg',
            ],
            [
                'nama_paket' => 'Paket Nasi Box Syukuran Komplit',
                'jenis_paket' => 'Nasi Box',
                'harga_paket' => 32000,
                'minimal_porsi' => 20,
                'deskripsi' => 'Nasi Kuning Wangi Daun Pandan, Ayam Panggang Kecap Manis, Telur Balado Pedas Manis, Mie Goreng Sayuran, Perkedel Kentang Daging, Orek Tempe Manis, Sambal Bawang, Kerupuk Udang, Pisang Sunpride, Air Mineral Cup.',
                'fasilitas' => 'Box bento tebal eksklusif, sendok tisu higienis, stiker ucapan custom syukuran gratis.',
                'status' => 'Tersedia',
                'foto' => 'res_img_7.jpg',
            ],
            [
                'nama_paket' => 'Paket Nasi Box Seminar & Kantor',
                'jenis_paket' => 'Nasi Box',
                'harga_paket' => 28000,
                'minimal_porsi' => 15,
                'deskripsi' => 'Nasi Putih Pandan Wangi, Daging Ayam Fillet Saus Teriyaki, Capcay Goreng Bakso, Tahu Telur Asin Crispy, Sambal Terasi Segar, Kerupuk, Buah Jeruk Manis, Air Mineral.',
                'fasilitas' => 'Kemasan bento premium, cutlery set ramah lingkungan, label nama menu.',
                'status' => 'Tersedia',
                'foto' => 'res_img_8.jpg',
            ],
            [
                'nama_paket' => 'Paket Tumpeng Kuning Megah Juara',
                'jenis_paket' => 'Tumpeng',
                'harga_paket' => 650000,
                'minimal_porsi' => 1,
                'deskripsi' => 'Tumpeng Nasi Kuning Kerucut hiasan janur & garnish wortel timun (Porsi untuk 15-20 orang). Lauk pauk: Ayam Bekakak Utuh Gurih, Sambal Goreng Hati Sapi, Urap Sayuran Segar, Telur Dadar Rawis, Kering Tempe Kacang Renyah, Perkedel.',
                'fasilitas' => 'Tampah anyaman bambu dekoratif premium, ucapan akrilik selamat & sukses, pisau tumpeng hias.',
                'status' => 'Tersedia',
                'foto' => 'res_img_6.jpg',
            ],
            [
                'nama_paket' => 'Paket Coffee Break & Snack Box VIP',
                'jenis_paket' => 'Coffee Break',
                'harga_paket' => 20000,
                'minimal_porsi' => 25,
                'deskripsi' => '3 Macam Kue Premium (Lemper Ayam Pandan, Pastel Tutup Ayam Rogout, Pie Buah Segar Vanilla) + Kopi Hitam Toraja, Teh Melati Hangat, Gula Pasir & Rendah Kalori.',
                'fasilitas' => 'Dispenser water boiler, cangkir keramik / cup kertas premium, sendok pengaduk, tisu.',
                'status' => 'Tersedia',
                'foto' => 'res_img_7.jpg',
            ],
        ];

        foreach ($pakets as $paket) {
            PaketCatering::updateOrCreate(
                ['nama_paket' => $paket['nama_paket']],
                $paket
            );
        }
    }
}
