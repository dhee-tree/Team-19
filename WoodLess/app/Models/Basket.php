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

    protected $primaryKey = 'user_id';

    /**
     * Returns the products that belong to the basket.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'basket_product','basket_id')->withPivot('amount','attributes');
    }

    /**
     * Returns the User that belongs to the basket.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
