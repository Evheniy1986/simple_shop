<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Type\FalseType;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity')->withTimestamps();
    }


    public function getTotal()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceCount();
        }
        return $sum;

    }

    public function saveOrder($name, $phone, $email)
    {
        if ($this->status == 0) {
            $this->name= $name;
            $this->phone = $phone;
            $this->email = $email;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
