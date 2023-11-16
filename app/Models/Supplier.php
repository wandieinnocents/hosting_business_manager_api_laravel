<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_code',
        'supplier_name',
        'supplier_email',
        'supplier_phone',
        'supplier_address',
        'supplier_city',
        'supplier_country',
        'supplier_organization',
        'supplier_status',
        'supplier_description',
        'supplier_website_url',

    ];

     // suppliers has many products
     public function products()
     {
         return $this->hasMany(Product::class);
     }

}
