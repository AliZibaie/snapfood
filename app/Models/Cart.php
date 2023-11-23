<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class);
    }
    protected $fillable =
        [
            'count',
            'user_id',
        ];
}
