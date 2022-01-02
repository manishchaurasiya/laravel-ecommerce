<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id', 'price', 'customer_id', 'vendor_id', 'product_id', 'status'
    ];
}
