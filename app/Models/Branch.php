<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_code',
        'branch_name',
        'branch_address',
    ];

    // relationship btn branch and product
    // branch has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }



}
