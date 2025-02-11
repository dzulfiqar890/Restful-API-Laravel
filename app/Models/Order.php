<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'customer_id', 'quantity', 'total_price'];

    // Relasi dengan Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi dengan Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
