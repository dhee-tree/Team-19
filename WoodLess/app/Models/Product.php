<?php

namespace App\Models;

use App\Models\Review;
use PHPUnit\Util\Json;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Broadcasting\PrivateChannel;
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
     * Returns the baskets that belong to the product.
     */
    public function baskets()
    {
        return $this->belongsToMany(Basket::class)->withPivot('id', 'amount', 'attributes')->withTimestamps();
    }

    /**
     * Returns the categories associated with the product.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Returns the categories in text format associated with the product.
     */
    public function categoriesNames()
    {
        return $this->categories->pluck('category')->implode(', ');
    }

    //filters the product
    public function scopeFilter($query, array $filters)
    {

        //Category
        if ($filters['categories'] ?? false) {
            $category = $filters['categories'];

            $query->whereHas('categories', function ($categoryQuery) use ($category) {
                $categoryQuery->where('category', $category);
            });
        }
        //ratings
        if ($filters['ratings'] ?? false) {
            $ratings = (array)$filters['ratings'];

            $query->whereHas('reviews', function ($reviewQuery) use ($ratings) {
                foreach ($ratings as $rating) {
                    $reviewQuery->orHavingRaw('coalesce(avg(rating), 0) >= ?', [$rating]);
                }
            });
        }
        //Color
        if ($filters['color'] ?? false) {
            $query->whereJsonContains('attributes->color', $filters['color']);
        }
        //Price
        if ($filters['minCost'] && $filters['maxCost'] ?? false) {
            $query->whereBetween('attributes->cost', [$filters['minCost'], $filters['maxCost']]);
        }
        //Rating

    }

    //deals with cutting/shortening description
    public function truncateDescription($words = 20)
    {
        $description = $this->description;
        $tokens = strtok($description, " ");
        $truncatedDescription = '';

        while ($tokens !== false && $words > 0) {
            $truncatedDescription .= $tokens . ' ';
            $tokens = strtok(" ");
            $words--;
        }

        // Add ellipsis if the description was truncated
        if ($tokens !== false) {
            $truncatedDescription .= '...';
        }

        return $truncatedDescription;
    }
}
