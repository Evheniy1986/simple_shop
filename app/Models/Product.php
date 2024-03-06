<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceCount()
    {
        if (!is_null($this->pivot->quantity)) {
            return $this->pivot->quantity * $this->price;
        }
        return $this->price;
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

}
