<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'title',
        'information',
        'contact',
        'importance_level_id',
        'status',
    ];

    public function importanceLevel(){
        return $this->belongsTo(ImportanceLevel::class);
    }
}
