<?php

namespace App\Models;

use App\Models\Traits\Cacheable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    use Cacheable;

    protected $fillable = [
        'rating',
        'title',
        'description',
        'attributes',
        'user_id',
        'product_id',
    ];

    /**
     * Get the user associated with the review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product associated with the review.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
