<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['name','description','price','image_url'];
    // allow only user enter the input that can found in db column

    protected $casts =['name'=>'String', 'description'=>'String', 'price'=>'double','image_url'=>'array'];

}
