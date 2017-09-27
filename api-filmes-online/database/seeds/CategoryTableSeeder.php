<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\Category::create([
            'category' => 'Ação',
            'description' => 'Muita movimentação, perseguições, explosões e emoção'
        ]);
        App\Category::create([
            'category' => 'Aventura',
            'description' => 'Muita movimentação, perseguições, explosões e emoção'
        ]);
        App\Category::create([
            'category' => 'Humor',
            'description' => 'Muita movimentação, perseguições, explosões e emoção'
        ]);
        App\Category::create([
            'category' => 'Drama',
            'description' => 'Muita movimentação, perseguições, explosões e emoção'
        ]);
        App\Category::create([
            'category' => 'Faroeste',
            'description' => 'Muita movimentação, perseguições, explosões e emoção'
        ]);
        App\Category::create([
            'category' => 'Ficção Científica',
            'description' => 'Muita movimentação, perseguições, explosões e emoção'
        ]);
        App\Category::create([
            'category' => 'Terror',
            'description' => 'Acontecimentos estranhos, estórias sobre monstros e criaturas assustadoras'
        ]);
    }
}
