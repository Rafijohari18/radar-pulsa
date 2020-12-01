<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';
    protected $guarded = [];
    
    public function Product(){
        return $this->hasMany('App\Models\Product');
    }

    public function cekProduk($id)
    {
      return Product::where('category_product_id',$id)->get();
    }
}
