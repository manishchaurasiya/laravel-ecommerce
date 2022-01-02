<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'customer_id',
        'vendor_id',
        'product_id',
        'price',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function userDetail()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }

}
