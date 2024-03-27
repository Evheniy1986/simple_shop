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
        'sku_id',
        'status',
    ];

    public function scopeActiveBySkuId($query, $skuId)
    {
        return $query->where('status', 0)->where('sku_id', $skuId);
    }

    public function sku()
    {
        return $this->belongsTo(Sku::class);
    }

    public static function sendEmailBySubscription(Sku $sku)
    {
        $subscriptions = self::ActiveBySkuId($sku->product->id)->get();
        foreach ($subscriptions as $subscription) {
            $subscription->status = 1;
            $subscription->save();
            Mail::to($subscription->email)->send(new SendSubscribtionMessage($sku));
        }
    }
}
