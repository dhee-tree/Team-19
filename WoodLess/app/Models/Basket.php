<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'product_id',
        'attributes',
        'total_cost',
    ];

    /**
     * Returns the products that belong to the basket.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'basket_product','basket_id')->withPivot('id','amount','attributes')->withTimestamps();
    }

    /**
     * Returns the amount of products in a basket, including amount.
     */
    public function productAmount(){
        return $this->products()->sum('amount');
    }

    /**
     * Returns the User that belongs to the basket.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the total cost of the basket.
     */
    public function totalCost()
    {
        $totalCost = 0;

        foreach($this->products as $product){
            if($product->discount > 0){
                $totalCost += round($product->cost - ($product->cost * ($product->discount / 100)), 2) * $product->pivot->amount;
            }else{
                $totalCost += $product->cost * $product->pivot->amount;
            }
        }

        return $totalCost;
    }
}
