<?php

namespace App\Models;

use App\Casts\FoodPrice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Food extends Model
{
    use HasFactory;
    public function foodCategories(): BelongsToMany
    {
        return $this->belongsToMany(FoodCategory::class);
    }
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class);
    }
    protected $fillable = [
        'name',
        'raw_materials',
        'restaurant_id',
        'price',
        'discount_id',
    ];
    protected $casts = [
      'price'=>FoodPrice::class,
    ];

}
