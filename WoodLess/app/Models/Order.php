<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'warehouse_id',
        'address_id',
        'status_id',
        'details',
        'product_cost',
        'order_cost',
    ];

    /**
     * Returns the user associated with the order.
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
    

    /**
     * Returns the products associated with the order and relevant order information.
     */
    public function products(){
        return $this->belongsToMany(Product::class, 'order_product_warehouse')->withPivot('id','amount','warehouse_id','attributes')->withTimestamps();
    }

    public function totalOrderedQuantity()
    {
        return $this->products()->sum('amount');
    }

    /**
     * Returns the status of the order.
     */
    public function status(){
        return $this->belongsTo(OrderStatus::class);
    }

}
