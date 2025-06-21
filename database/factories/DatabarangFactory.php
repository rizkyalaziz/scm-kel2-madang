<?php

namespace Database\Factories;

use App\Models\Databarang;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabarangFactory extends Factory
{
    protected $model = Databarang::class;

    public function definition()
    {
        return [
            'id_barang' => $this->faker->unique()->numerify('BRG###'),
            'nama' => $this->faker->word(),
            'kode' => $this->faker->unique()->bothify('KODE-###'),
            'kategori_id' => 1, // sesuaikan dengan id kategori yang ada
            'jenis_id' => 1, // sesuaikan dengan id jenis yang ada
            'jumlah_stok' => $this->faker->numberBetween(0, 100),
            'stok_minimum' => $this->faker->numberBetween(1, 20),
            'satuan_id' => 1, // sesuaikan dengan id satuan yang ada
            'gambar' => null,
        ];
    }
}
