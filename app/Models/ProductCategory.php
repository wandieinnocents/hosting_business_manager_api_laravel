<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

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


    // a product category belongs to a parent product category
    public function parent_product_category(){

        return $this->belongsTo(ParentProductCategory::class);

    }

    // a product category has many products
    public function products(){

        return $this->hasMany(Product::class);

    }


}
