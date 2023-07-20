<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $foods = [
            [
                'name' => 'Nasi Goreng',
                'description' => 'Nasi goreng spesial dengan telur mata sapi dan ayam',
                'price' => 25000,
                'image' => 'nasi_goreng.jpg',
            ],
            [
                'name' => 'Mie Ayam',
                'description' => 'Mie ayam dengan tambahan bakso dan pangsit',
                'price' => 20000,
                'image' => 'mie_ayam.jpg',
            ],
            // Tambahkan data contoh lainnya jika diperlukan
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}
