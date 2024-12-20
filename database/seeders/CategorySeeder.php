<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anaKategoriler = [
            "Konut",
            "Is Yeri",
            "Arsa",
            "Devre Mülk",
            "Turistik Tesis"
    ];

        foreach ($anaKategoriler as $kategori) {
            Category::create([
                'parentid' => 0,
                'title' => $kategori,
                'keywords' => $kategori . ' ilanları',
                'description' => $kategori . ' kategorisi ilanları',
                'slug' => Str::slug($kategori),
                'status' => "True"
            ]);
        }
    }
}
