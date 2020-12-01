<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $guarded = [];

    public function CategoryProduct()
    {
    	return $this->belongsTo(CategoryProduct::class);
    }

    public function User()
    {
    	return $this->belongsTo(User::class,'created_by');
    }
    
}
