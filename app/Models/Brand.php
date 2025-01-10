<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}


