<?php

namespace App\Models;

use App\Models\Review;
use PHPUnit\Util\Json;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
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
        'cost',
        'discount',
    ];
    
    /**
     * Return/create a cached version of all products.
     * @param int $id Return/create a cached version of a single product.
     */
    
    protected static function allCached(int $id = null){
        if (is_null($id)){
            return Cache::rememberForever('products', function() {
                return Product::all();
            });
        }

        else{
            return Cache::remember('products_'.$id, now()->addSeconds(30), function() use ($id) {
                return Product::findOrFail($id);
            });
        }
    }

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

    /**
     * Returns the cache key of a product instance.
     */
    public function cacheKey()
    {
        return 'product_' . $this->id;
    }

    /**
     * Return/create a cached version of the product.
     */
    
     public function cached(){
        return Cache::remember($this->cacheKey(),now()->addSeconds(30), function() {
            return $this;
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
    public function stockAmount(int $warehouse = null){

        $this->loadMissing('warehouses');

        if(is_null($warehouse)){
            return $this->warehouses()->sum('amount');
        }

        else{
            return $this->warehouses()->wherePivot('warehouse_id', $warehouse)->sum('amount');
        }
    }

    /**
     * Returns the categories associated with the product.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Returns a cached version of categories associated with the product.
     */
    public function cachedCategories()
    {   
        return Cache::remember($this->cacheKey() . ':categories', now()->addSeconds(60), function () {
            return $this->categories()->get();
        });
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
        if (($filters['minCost'] ?? null) !== null && ($filters['maxCost'] ?? null) !== null) {
            $query->whereBetween('cost', [$filters['minCost'], $filters['maxCost']]);
        } elseif ($filters['minCost'] ?? null) {
            $query->where('cost', '>=', $filters['minCost']);
        } elseif ($filters['maxCost'] ?? null) {
            $query->where('cost', '<=', $filters['maxCost']);
        }
        //Rating

    }

    /**
     * Returns the order status associated with the product.
     */
    public function orderProductStatus(){
        return $this->belongsToMany(OrderStatus::class, 'order_product_warehouse', 'product_id', 'status_id');
    }
}
