<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category', 'description' ];
    
    public $rules = ['category' => 'required|max:100', 
        'description' => 'required|max:400'];
    
     public function movies(){
        return Category::hasMany('App\Movie');
    }
    
    public function series(){
        return Category::hasMany('App\Serie');
    }
    
    
    
  
    
    
}
