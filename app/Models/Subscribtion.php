<?php

namespace App\Models;

use App\Mail\SendSubscribtionMessage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscribtion extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'product_id',
    ];

    public function scopeActiveByProductId($query, $productId)
    {
        return $query->where('status', 0)->where('product_id', $productId);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function sendEmailBySubscription(Product $product)
    {
        $subscriptions = self::ActiveByProductId($product->id)->get();
        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(new SendSubscribtionMessage($product));
            $subscription->status = 1;
            $subscription->save();
        }
    }
}
