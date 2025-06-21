<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Databarang;

class DummyDatabarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_barang' => 'BRG001',
                'nama' => 'Laptop Lenovo',
                'kode' => 'LP001',
                'kategori_id' => 1,
                'jenis_id' => 1,
                'jumlah_stok' => 10,
                'satuan_id' => 3,
                'gambar' => null
            ],
            [
                'id_barang' => 'BRG002',
                'nama' => 'Pulpen Biru',
                'kode' => 'PL001',
                'kategori_id' => 2,
                'jenis_id' => 2,
                'jumlah_stok' => 50,
                'satuan_id' => 1,
                'gambar' => null
            ],
            [
                'id_barang' => 'BRG003',
                'nama' => 'Snack Wafer',
                'kode' => 'SN001',
                'kategori_id' => 3,
                'jenis_id' => 3,
                'jumlah_stok' => 100,
                'satuan_id' => 5,
                'gambar' => null
            ],
            [
                'id_barang' => 'BRG004',
                'nama' => 'Sabun Cair',
                'kode' => 'SB001',
                'kategori_id' => 4,
                'jenis_id' => 4,
                'jumlah_stok' => 20,
                'satuan_id' => 2,
                'gambar' => null
            ],
            [
                'id_barang' => 'BRG005',
                'nama' => 'Kabel Roll',
                'kode' => 'KB001',
                'kategori_id' => 5,
                'jenis_id' => 5,
                'jumlah_stok' => 7,
                'satuan_id' => 3,
                'gambar' => null
            ],
        ];
        foreach ($data as $barang) {
            Databarang::create($barang);
        }
    }
}
