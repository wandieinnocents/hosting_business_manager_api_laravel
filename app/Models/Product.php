<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;

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



}
