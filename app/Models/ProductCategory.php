<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [

        'parent_product_category_id',
        'product_category_code',
        'product_category_name',
        'product_category_description',
        'product_category_status',
        'product_category_image',

    ];


    // relationship


}
