<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
      'order_id',
      'score',
      'comment_id',
      'message',
      'is_accepted',
      'message',
      'seller_wants_delete',
    ];
    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function comment() : HasOne
    {
       return $this->hasOne(Comment::class);
    }
}
