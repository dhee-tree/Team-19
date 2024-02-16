<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';

    protected $fillable = [
        'house_number',
        'street_name',
        'postcode',
        'city',
    ];

    /**
     * Get the user associated with the address.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
