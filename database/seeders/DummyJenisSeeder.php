<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jenis;

class DummyJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode' => 'J01', 'nama' => 'Elektronik'],
            ['kode' => 'J02', 'nama' => 'Alat Tulis'],
            ['kode' => 'J03', 'nama' => 'Konsumsi'],
            ['kode' => 'J04', 'nama' => 'Kebersihan'],
            ['kode' => 'J05', 'nama' => 'Lainnya'],
        ];
        foreach ($data as $jenis) {
            Jenis::create($jenis);
        }
    }
}
