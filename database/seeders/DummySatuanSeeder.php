<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Satuan;

class DummySatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Pcs'],
            ['nama' => 'Box'],
            ['nama' => 'Unit'],
            ['nama' => 'Lusin'],
            ['nama' => 'Pack'],
        ];
        foreach ($data as $satuan) {
            Satuan::create($satuan);
        }
    }
}
