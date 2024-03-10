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

    public function importanceLevel()
    {
        return $this->belongsTo(ImportanceLevel::class);
    }

    public function scopeFilter($query, $filter)
    {
        $user = auth()->user();
        // Search
        if ($filter == "all") {
            // No additional filtering needed for "all"
        } else if ($filter == "current") {
            $query->where('admin_id', $user->id);
        } else if ($filter == "solved") {
            $query->where('status', 3)->where('admin_id', $user->id);
        } else {
            // Return an error message if the filter is invalid
            throw new \InvalidArgumentException("Invalid filter provided.");
        }

        return $query;
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
