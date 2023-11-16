<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Branch;
use App\Models\Product;

class Sale extends Model
{
    use HasFactory;


    protected $fillable = [
        'sale_date',
        'sale_ref_number',
        'customer_id',
        'branch_id',
        'product_id',
        'sale_quantity',
        'sub_total',
        'grand_total',
        'payment_status',
        'sale_status',
        'sale_notes',
        'sale_payment_method',

    ];

      // sale belongs to a customer
      public function customer()
      {
          return $this->belongsTo(Customer::class);
      }

    // sale belongs to a branch
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

      // sale belongs to a product
      public function product()
      {
          return $this->belongsTo(Product::class);
      }
}
