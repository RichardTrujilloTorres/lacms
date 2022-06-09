<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const DO_NOT_DISTURB_STATUS_ON = 'on';
    const DO_NOT_DISTURB_STATUS_OFF = 'off';

    protected $fillable = [
        'name',
        'definition',
    ];

    protected $casts = [
        'definition' => 'json',
    ];
}
