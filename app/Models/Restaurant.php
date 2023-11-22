<?php

namespace App\Models;

use App\Casts\IsOpen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Restaurant extends Model
{
    use HasFactory;
    public function restaurantCategories(): BelongsToMany
    {
        return $this->belongsToMany(RestaurantCategory::class);
    }
    protected $fillable = [
        'name',
        'phone',
        'account_number',
        'user_id',
        'shipping_cost',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class);
    }
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    protected $casts = [
        'status'=>IsOpen::class,
    ];
}
