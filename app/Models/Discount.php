<?php

namespace App\Models;

use App\Casts\Label;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
      'code',
      'expires_at',
      'label',
    ];
    protected $casts = [
      'label'=>Label::class,
    ];
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }
}
