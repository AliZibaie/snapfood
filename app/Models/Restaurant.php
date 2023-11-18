<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
}
