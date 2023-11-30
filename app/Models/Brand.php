<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_code',
        'brand_name',
        'brand_register_date',
        'brand_status',
        'brand_image',
        'brand_description',

    ];

     // brand has many products
     public function products()
     {
         return $this->hasMany(Product::class);
     }



}
