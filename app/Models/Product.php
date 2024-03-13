<?php

namespace App\Models;

use App\Models\Traits\Translatable;
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

    public function getPriceCount()
    {
        if (!is_null($this->pivot->quantity)) {
            return $this->pivot->quantity * $this->price;
        }
        return $this->price;
    }

    public function isAvailable(): bool
    {
       return !$this->trashed() && $this->count > 0;
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
