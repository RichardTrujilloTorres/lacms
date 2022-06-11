<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    const DEFAULT_LIMIT = 10;

    protected $fillable = [
        'title',
        'body',
        'viewed',
    ];

    public function scopeNotViewed($query)
    {
        return $query->where('viewed', false);
    }
}
