<?php

use Illuminate\Database\Seeder;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Movie::create([
            'name' => 'Pulp Fiction',
            'release_year' => '1994',
            'star_list' => 'John Travolta , Uma Thurman, Samuel L. Jackson, Bruce Willis e Tim Roth',
            'classId' => '18',
            'category_id' => '1',
            'director_id' => '5'
        ]);
        
        App\Movie::create([
            'name' => 'Batman Begins',
            'release_year' => '2005',
            'star_list' => 'Cristian Bale , Michael Caine, Gary Oldman, Liam Neenson e Katie Holmes',
            'classId' => '16',
            'category_id' => '2',
            'director_id' => '2'
        ]);
        App\Movie::create([
            'name' => 'De Volta Para o Futuro',
            'release_year' => '1985',
            'star_list' => 'Michael J. Fox , Christopher Lloyd, Lea Thompson, Crispin Glover e Thomas F. Wilson',
            'classId' => 'Livre',
            'category_id' => '6',
            'director_id' => '4'
        ]);
        
    }
}
