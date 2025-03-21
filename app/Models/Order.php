<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
      'total_price',
      'count',
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

    public function comments(): hasMany
    {
        return  $this->hasMany(Comment::class);
    }

}
