<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected  $fillable = ['name' ,
                            'release_year' ,
                            'star_list' ,
                            'classId',
                            'category_id',
                            'director_id'];
    
    protected $hidden = ['category_id','director_id' ];
    
    public function directors(){
        return $this->belongsTo('App\Director');
    }
    public function categories(){
        return $this->belongsTo('App\Category');
    }
}
