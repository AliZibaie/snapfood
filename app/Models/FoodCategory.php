<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FoodCategory extends Model
{
    use HasFactory;
    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class);
    }
    protected $fillable = [
        'type',
    ];
}
