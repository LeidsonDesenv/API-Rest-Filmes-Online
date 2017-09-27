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
     
}
