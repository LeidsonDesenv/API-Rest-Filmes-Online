<?php

use Illuminate\Database\Seeder;

class SerieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Serie::create([
            'name' => 'Supernatural',
            'release_year' => '2005',            
            'classId' => '16',
            'season' => '1',
            'category_id' => '2',
            'director_id' => '6'
        ]);
        App\Serie::create([
            'name' => 'Arrow',
            'release_year' => '2012',            
            'classId' => '16',
            'season' => '1',
            'category_id' => '1',
            'director_id' => '7'
        ]);
        App\Serie::create([
            'name' => 'Lost',
            'release_year' => '2004',            
            'classId' => '16',
            'season' => '3',
            'category_id' => '1',
            'director_id' => '8'
        ]);     
        
    }
}
