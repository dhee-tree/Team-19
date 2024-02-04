<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
    ];
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'categories';

    /**
     * Returns the products that belong to the category.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
