<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'status',
    ];

    protected $table = 'order_status';

    /**
     * Returns the orders associated with the status.
     */
    public function orders(){
        $this->hasMany(Order::class);
    }
}
