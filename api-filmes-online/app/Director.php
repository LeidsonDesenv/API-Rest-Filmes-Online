<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $fillable = ['name' , 'description'];
    
    public function movies(){
        return Director::hasMany('App\Movie');
    }
    public function series(){
        return Director::hasMany('App\Serie');
    }
}
