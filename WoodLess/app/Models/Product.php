<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'attributes',
        'tags',
        'images',
        'categories',
        'cost',
        'discount',
        'amount',
    ];

    /**
     * Returns the reviews associated with the product.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Returns the categories associated with the product.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
