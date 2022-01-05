<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'vendor_id', 'product_id', 'price', 'status', 'name', 'email', 'mobile_no', 'address', 'zip_code', 'city', 'state', 'country',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
    public function userDetail()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
