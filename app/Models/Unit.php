<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_name',
        'unit_description',
    ];

     // unit has many products
     public function products()
     {
         return $this->hasMany(Product::class);
     }
}
