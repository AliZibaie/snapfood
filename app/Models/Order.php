<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
      'payment_id',
      'status',
      'user_id',
      'food_id',
    ];

    public function food() : BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
