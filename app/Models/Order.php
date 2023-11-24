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
      'address',
    ];

    public function payment() : BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
