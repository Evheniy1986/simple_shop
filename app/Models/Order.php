<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Type\FalseType;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'status',
        'currency_id',
        'sum',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot(['quantity', 'price'])->withTimestamps();
    }

    public function skus()
    {
        return $this->belongsToMany(Sku::class)->withPivot(['quantity', 'price'])->withTimestamps();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function calculateFullSum()
    {
        $sum = 0;
        foreach ($this->skus()->withTrashed()->get() as $sku) {
            $sum += $sku->getPriceCount();
        }
        if (session()->has('full_order_sum')) {
            session(['full_order_sum' => $sum]);
        }

        return $sum;
    }

    public  function getFullSum()
    {
        $sum = 0;

        foreach ($this->skus as $sku) {
           $sum += $sku->price * $sku->countInOrder;
        }
        return $sum;
    }

    public function saveOrder($name, $phone, $email)
    {
            $this->name= $name;
            $this->phone = $phone;
            $this->email = $email;
            $this->status = 1;
            $this->sum = $this->getFullSum();

            $skus = $this->skus;
            $this->save();

        foreach ($skus as $skuInOrder) {
            $this->skus()->attach($skuInOrder, [
                'quantity' => $skuInOrder->countInOrder,
                'price' => $skuInOrder->price,
            ]);
            }
            session()->forget('order');
            return true;

    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
