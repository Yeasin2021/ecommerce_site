<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $fillable = ['first_name','last_name','company','phone','email','address','town_city','district','zipcode'];
}
