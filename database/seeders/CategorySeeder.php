<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Kuliner',
            'slug' => 'kuliner'
        ]);

        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion'
        ]);

        Category::create([
            'name' => 'Agri Bisnis',
            'slug' => 'agri-bisnis'
        ]);

        Category::create([
            'name' => 'Jasa',
            'slug' => 'jasa'
        ]);
    }
}
