<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class DummyKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Elektronik'],
            ['nama' => 'Alat Tulis'],
            ['nama' => 'Konsumsi'],
            ['nama' => 'Kebersihan'],
            ['nama' => 'Lainnya'],
        ];
        foreach ($data as $kategori) {
            Kategori::create($kategori);
        }
    }
}
