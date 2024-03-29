<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use App\Services\CurrencyConversion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes, Translatable;

    protected $with = 'category';

    protected $fillable = [
        'category_id',
        'name',
        'code',
        'image',
        'description',
        'price',
        'new',
        'hit',
        'recommend',
        'count',
        'name_en',
        'description_en',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    //todo: check table name
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_products')->withTimestamps();
    }


    public function scopeHit($query)
    {
        return $query->where('hit', 1);
    }

    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend', 1);
    }

    public function getPriceAttribute($value)
    {
        return CurrencyConversion::convert($value);
    }


}
