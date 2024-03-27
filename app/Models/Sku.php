<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'count',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function propertyOptions()
    {
        return $this->belongsToMany(PropertyOption::class,'sku_property_options')->withTimestamps();
    }

    public function isAvailable(): bool
    {
        return !$this->product->trashed() && $this->count > 0;
    }

    public function getPriceCount()
    {
        if (!is_null($this->pivot->quantity)) {
            return $this->pivot->quantity * $this->price;
        }
        return $this->price;
    }
}
