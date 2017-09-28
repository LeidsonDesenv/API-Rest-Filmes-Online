<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category', 'description' ];
    
     public function movies(){
        return Category::hasMany('App\Movie');
    }
    
    public function series(){
        return Category::hasMany('App\Serie');
    }
    
    
    
  
    
    
}
