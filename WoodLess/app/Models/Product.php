<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Used to populate DB with dummy data. Can be used to retrieve DB data.

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'attributes',
        'tags',
        'categories',
        'cost',
        'discount',
        'amount',
    ];
}
