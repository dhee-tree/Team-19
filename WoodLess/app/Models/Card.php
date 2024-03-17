<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $table = 'cards';

    protected $fillable = [
        'user_id',
        'card_number',
        'expiry_date',
        'house_number',
        'street_name',
        'postcode',
        'city',
    ];

    /**
     * Returns the user associated with the card.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
