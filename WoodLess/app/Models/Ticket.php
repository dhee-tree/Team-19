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

    //deals with cutting/shortening information
    public function truncateInformation($words = 20)
    {
        $information = $this->information;
        $tokens = strtok($information, " ");
        $truncatedinformation = '';

        while ($tokens !== false && $words > 0) {
            $truncatedinformation .= $tokens . ' ';
            $tokens = strtok(" ");
            $words--;
        }

        // Add ellipsis if the description was truncated
        if ($tokens !== false) {
            $truncatedinformation .= '...';
        }

        return $truncatedinformation;
    }
}
