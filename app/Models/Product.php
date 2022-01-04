<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'price', 'vendor_id', 'category_id', 'color_id', 'brand_id', 'status'];

    protected $appends = ['average_rating', 'count_rating','brand_status'];
    // protected $m =['count_rating'];
    // protected $appends =['count_rating'];
    public function getAverageRatingAttribute()
    {
        return $this->Review->avg('rating');
    }

    public function getCountRatingAttribute()
    {
        return $this->Review()->count('rating');
    }

    public function getBrandStatusAttribute()
    {
        return $this->Brand()->value('status');
    }

    public function details()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function Thumbnail()
    {
        return $this->hasOne(ProductImage::class)->where('type', 'thumbnail');
    }
    public function gallary()
    {
        return $this->hasMany(ProductImage::class)->where('type', '<>', 'thumbnail');
    }

    public function Review()
    {
        return $this->hasMany(Product_review::class);
    }

    public function Color()
    {
        return $this->belongsTo(Color::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function userName()
    {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
}
