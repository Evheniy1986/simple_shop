<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'preview_image',
        'price',
        'count',
        'is_published',
        'category_id',
        'slug',
        'brand_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products')
            ->withPivot('qty', 'price')
            ->withTimestamps();
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class,'product_property')
            ->withPivot('value')
            ->withTimestamps();
    }

    public function optionValues()
    {
        return $this->belongsToMany(OptionValue::class, 'option_value_product')->withTimestamps();
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
