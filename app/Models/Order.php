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
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity')->withTimestamps();
    }

    public function calculateFullSum()
    {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $sum += $product->getPriceCount();
        }
        if (session()->has('full_order_sum')) {
            session(['full_order_sum' => $sum]);
        }
//        if (!$product) {
//            session()->forget('full_order_sum');
//        }
        return $sum;
    }

    public static function changeFullSum($changeSum)
    {
       $sum = self::getFullSum() + $changeSum;
       session(['full_order_sum' => $sum]);
    }

    public static function getFullSum()
    {
       return session('full_order_sum', 0);
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
            session()->forget('full_order_sum');
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
