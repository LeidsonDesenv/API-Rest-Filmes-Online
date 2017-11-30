<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
     protected  $fillable = ['name' ,
                            'release_year' ,                            
                            'classId',
                            'season',
                            'category_id',
                            'director_id'];
     
     public $rules = ['name' => 'required|max:100',
                     'year' => 'max:4',
                     'season' => 'numeric'];
     
}
