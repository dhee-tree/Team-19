<?php

namespace App\Models;

use App\Models\Review;
use App\Traits\Cacheable;
use PHPUnit\Util\Json;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Broadcasting\PrivateChannel;
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

    protected static function booted(){
        static::creating(function ($product){
            Cache::forget('products');
        });

        static::saving(function ($product){
            Cache::forget('products');
        });

        static::deleting(function ($product) {
            $product->wipeCache();
            Cache::forget('products');
        });

        static::updating(function ($product) {
            $product->wipeCache();
            Cache::forget('products');
        });
    }

    public function wipeCache(){
        Cache::forget($this->cacheKey());
        Cache::forget($this->cacheKey().':categories');
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
           if ($filters['search'] ?? false) {
            $searchText = $filters['search'];
            $query->where(function ($searchQuery) use ($searchText) {
                $searchQuery->where('title', 'like', '%' . $searchText . '%')
                            ->orWhere('tags', 'like', '%' . $searchText . '%');
            });

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
        if (($filters['minCost'] ?? null) !== null && ($filters['maxCost'] ?? null) !== null) {
            $query->whereBetween('cost', [$filters['minCost'], $filters['maxCost']]);
        } elseif ($filters['minCost'] ?? null) {
            $query->where('cost', '>=', $filters['minCost']);
        } elseif ($filters['maxCost'] ?? null) {
            $query->where('cost', '<=', $filters['maxCost']);
        }
    }
        //Rating

           }

    /**
     * Returns the order status associated with the product.
     */
    public function orderProductStatus(){
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

    /**
     * Fill or update the product attributes.
     *
     * @param array $attributes
     * @param int|null $id
     * @return Product
     */
    public static function fillOrUpdate(array $attributes, $id = null)
    {
        // If an ID is provided, find the existing product
        $product = $id ? static::findOrFail($id) : new static();

        // Fill or update the attributes
        $product->fill($attributes);
        $product->save();

        return $product;
    }
}
