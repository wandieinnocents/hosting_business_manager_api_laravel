<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\ParentProductCategory;
use App\Models\ProductCategory;
use App\Models\Supplier;




class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'supplier_id',
        'branch_id',
        'product_brand_id',
        'product_parent_category_id',
        'product_category_id',
        'product_unit_id',
        'product_created_date',
        'product_expiry_date',
        'product_name',
        'product_stock_quantity',
        'product_cost_price',
        'product_selling_price',
        'product_status',
        'product_description',
        'product_image',

    ];

    // product belongs to a branch
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    // product belongs to a unit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

     // product belongs to a brand
     public function brand()
     {
         return $this->belongsTo(Brand::class);
     }

      // product belongs to a parent product category
      public function parent_product_category()
      {
          return $this->belongsTo(ParentProductCategory::class);
      }

        // product belongs to a  product category
        public function product_category()
        {
            return $this->belongsTo(ProductCategory::class);
        }

         // product belongs to a  supplier
         public function supplier()
         {
             return $this->belongsTo(Supplier::class);
         }



}
