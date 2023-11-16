<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\Product;

class ParentProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_product_category_code',
        'parent_product_category_name',
        'parent_product_category_description',
        'parent_product_category_status',
    ];


    // a parent product category has many product categories
     public function product_categories()
     {
         return $this->hasMany(ProductCategory::class);
     }

      // a parent product category has many products
      public function products()
      {
          return $this->hasMany(Product::class);
      }





}
