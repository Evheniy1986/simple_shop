<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug', 'image'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class)->withTimestamps();
    }
}
