<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'soil_threshold',
        'refill_distance',
        'abnormal_timeout',
        'automatic_mode',
    ];

    protected $casts = [
        'soil_threshold' => 'integer',
        'refill_distance' => 'float',
        'abnormal_timeout' => 'integer',
        'automatic_mode' => 'boolean',
    ];
}
