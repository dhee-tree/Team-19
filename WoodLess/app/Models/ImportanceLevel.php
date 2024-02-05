<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportanceLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
    ];
}
