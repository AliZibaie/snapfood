<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
    protected $fillable = [
        'open_time',
        'close_time',
        'day',
    ];
}
