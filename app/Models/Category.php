<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory;
    public function restaurants(): MorphToMany
    {
        return $this->morphedByMany(Restaurant::class, 'categoriable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function foods(): MorphToMany
    {
        return $this->morphedByMany(Food::class, 'categoriable');
    }
    protected $fillable = [
      'type',
    ];
}
