<?php

namespace App\Models;

use App\Casts\IsDefault;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    use HasFactory;
    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
    protected $visible = [
        'title',
        'address',
        'latitude',
        'longitude',
    ];
    protected $fillable = [
        'title',
        'address',
        'latitude',
        'longitude',
        'is_default',
    ];
    protected $casts = [
      'is_default'=>IsDefault::class,
    ];

}
