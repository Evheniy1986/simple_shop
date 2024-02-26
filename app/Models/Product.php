<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceCount()
    {
        if (!is_null($this->pivot->quantity)) {
          return  $this->pivot->quantity * $this->price;
        }
        return $this->price;
    }


}
