<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const DO_NOT_DISTURB_STATUS_ON = 'on';
    const DO_NOT_DISTURB_STATUS_OFF = 'off';

    const SYNC_STATUS_UP_TO_DATE = 'up-to-date';
    const SYNC_STATUS_NOT_UP_TO_DATE = 'not-up-to-date';

    const DO_NOT_DISTURB_KEY = 'do_not_disturb';
    const SYNC_KEY = 'sync';

    protected $fillable = [
        'name',
        'definition',
    ];

    protected $casts = [
        'definition' => 'json',
    ];
}
