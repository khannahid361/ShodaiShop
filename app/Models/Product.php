<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'cost', 'price', 'opening_stock', 'details', 'image_path', 'description', 'subcategory_id', 'brand_id'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
