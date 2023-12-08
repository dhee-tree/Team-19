<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Broadcasting\PrivateChannel;
use PHPUnit\Util\Json;
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
     * Returns the baskets that belong to the product.
     */
    public function baskets()
    {
        return $this->belongsToMany(Basket::class)->withPivot('id','amount','attributes')->withTimestamps();
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
        //ddd($this->reviews);
        //Category
        if($filters['category'] ?? false){
            $query->whereJsonContains('attributes->category', $filters['category']);
        }
        //Finish
        if($filters['finish'] ?? false){
            $query->whereJsonContains('attributes->finish', $filters['finish']);
        }
        //Size
        if($filters['size'] ?? false){
            //Width
            $query->whereJsonContains('attributes->size->width', $filters['size']['width']);
            //Height
            $query->whereJsonContains('attributes->size->height', $filters['size']['height']);
            //Length
            $query->whereJsonContains('attributes->size->length', $filters['size']['length']);
        }
        //Color
        if($filters['color'] ?? false){
            $query->whereJsonContains('attributes->color', $filters['color']);
        }
        //Price
        if($filters['minCost'] && $filters['maxCost'] ?? false){
            $query->whereBetween('attributes->cost', [$filters['minCost'], $filters['maxCost']]);
            
        }
        //Rating

    }
}
