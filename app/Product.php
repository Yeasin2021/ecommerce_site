<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','brand_id','product_name','product_price','product_quantity','short_desc','long_desc','product_image','publication_status'];


public function brand(){ 
    	return $this->belongsTo(Brand::class);
    }
    /*public function brands(){ 
    	return $this->belongsTo('App\Brand','brand_id','id');
    }*/
}
