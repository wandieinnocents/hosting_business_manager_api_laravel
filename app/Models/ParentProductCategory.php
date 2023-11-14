<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_product_category_code',
        'parent_product_category_name',
        'parent_product_category_description',
        'parent_product_category_status',
    ];


    // relationship

}
