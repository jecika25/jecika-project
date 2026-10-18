<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'first_name' => 'Siti',
                'last_name' => 'Nurhaliza',
                'birthday' => '1995-04-12',
                'gender' => 'Female',
                'email' => 'siti.nurhaliza@example.com',
                'phone' => '081234567890',
            ],
            [
                'first_name' => 'Budi',
                'last_name' => 'Santoso',
                'birthday' => '1990-08-20',
                'gender' => 'Male',
                'email' => 'budi.santoso@example.com',
                'phone' => '082198765432',
            ],
            [
                'first_name' => 'Dewi',
                'last_name' => 'Lestari',
                'birthday' => '1998-11-05',
                'gender' => 'Female',
                'email' => 'dewi.lestari@example.com',
                'phone' => '085712349999',
            ],
            [
                'first_name' => 'Ahmad',
                'last_name' => 'Fauzi',
                'birthday' => '1992-01-15',
                'gender' => 'Male',
                'email' => 'ahmad.fauzi@example.com',
                'phone' => '087811223344',
            ],
        ];

        foreach ($data as $item) {
            Pelanggan::updateOrCreate(['email' => $item['email']], $item);
        }
    }
}
