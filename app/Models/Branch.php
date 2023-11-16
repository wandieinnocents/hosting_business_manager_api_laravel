<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Sale;


class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_code',
        'branch_name',
        'branch_address',
    ];

    // branch has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

     // branch has many sales
     public function sales()
     {
         return $this->belongsTo(Sale::class);
     }




}
