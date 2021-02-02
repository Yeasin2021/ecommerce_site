<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['add_category','category_description','publication_status','category_image'];
    /*public function product(){ 
    	return $this->hasMany(Product::class);
    }*/
    public function products(){ 
    	return $this->hasMany(Product::class);
    }
}
