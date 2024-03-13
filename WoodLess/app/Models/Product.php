<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Traits\Cacheable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Cacheable;

    protected $fillable = [
        'title',
        'description',
        'attributes',
        'tags',
        'images',
        'cost',
        'discount',
    ];

    /**
     * Returns the filepaths of images associated with the product as an array.
     */
    public function getImages()
    {
        $images = [];

        foreach (Storage::files('public/images/products/' . $this->id) as $path) {
            $images[] = Storage::url($path);
        }
        
        return $images;
    }

    /**
     * Returns the baskets that belong to the product.
     */
    public function baskets()
    {
        return $this->belongsToMany(Basket::class)->withPivot('id', 'amount', 'attributes')->withTimestamps();
    }

    /**
     * Returns the reviews associated with the product.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Returns the warehouses associated with the product.
     */
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class)->withPivot('amount')->withTimestamps();
    }

    /**
     * Returns the stock amount for the product.
     * @param int|null $warehouse (Optional) Specify a warehouse using id
     */
    public function stockAmount(int $warehouse = null)
    {

        $this->loadMissing('warehouses');

        if (is_null($warehouse)) {
            return $this->warehouses()->sum('amount');
        } else {
            return $this->warehouses()->wherePivot('warehouse_id', $warehouse)->sum('amount');
        }
    }

    /**
     * Sets the stock amount for the product in the specified warehouse.
     * @param int $warehouseId Specify the warehouse ID
     * @param int $amount Specify the stock amount to set
     * @return void
     */
    public function setStockAmount(int $warehouseId, int $amount): void
    {
        $this->warehouses()->syncWithoutDetaching([$warehouseId => ['amount' => $amount]]);
    }

    /**
     * Returns the categories associated with the product.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    //filters the product

    public function scopeFilter($query, array $filters)
    {
        // Search
        if ($searchText = $filters['search'] ?? false) {
            $query->where(function ($searchQuery) use ($searchText) {
                $searchQuery->where('title', 'like', '%' . $searchText . '%')
                    ->orWhere('tags', 'like', '%' . $searchText . '%');
            });
        }

        // Category
        if ($category = $filters['categories'] ?? false) {
            $query->whereHas('categories', function ($categoryQuery) use ($category) {
                $categoryQuery->where('category', $category);
            });
        }

        // Ratings
        if ($ratings = $filters['ratings'] ?? false) {
            $query->whereHas('reviews', function ($reviewQuery) use ($ratings) {
                foreach ($ratings as $rating) {
                    $reviewQuery->havingRaw('coalesce(avg(rating), 0) >= ?', [$rating]);
                }
            });
        }

        // Color
        if ($color = $filters['color'] ?? false) {
            $query->whereJsonContains('attributes->color', $color);
        }

        // Price
        if (isset($filters['minCost'])) {
            $query->where('cost', '>=', $filters['minCost']);
        }

        if (isset($filters['maxCost'])) {
            $query->where('cost', '<=', $filters['maxCost']);
        }

        // Sorting
        if (isset($filters['sort_by'])) {
            $sortBy = $filters['sort_by'];
            if ($sortBy === 'price_high_low') {
                $query->orderByDesc('cost');
            } elseif ($sortBy === 'price_low_high') {
                $query->orderBy('cost');
            } elseif ($sortBy === 'rating_high_low') {
                $query->orderByDesc('rating');
            } elseif ($sortBy === 'rating_low_high') {
                $query->orderBy('rating');
            } elseif ($sortBy === 'discount_high_low') {
                $query->orderByDesc('discount');
            } elseif ($sortBy === 'discount_low_high') {
                $query->orderBy('discount');
            }
        }

        return $query;
    }

    /**
     * Returns the order status associated with the product.
     * Rename to orderStatus to match model if possible
     */
    public function orderProductStatus()
    {
        return $this->belongsToMany(OrderStatus::class, 'order_product_warehouse', 'product_id', 'status_id');
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
