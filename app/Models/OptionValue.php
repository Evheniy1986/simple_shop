<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'option_id'
    ];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
