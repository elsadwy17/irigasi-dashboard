<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    protected $table = 'sensor_data';
    protected $fillable = [
        'soil', 'temperature', 'humidity', 'pressure', 'water_distance', 'flow_rate', 'solenoid_refill', 'solenoid_irrigation', 'automatic_mode', 'abnormal_condition', ];
        protected $casts = [
            'soil' => 'integer', 'temperature' => 'float', 'humidity' => 'float', 'pressure' => 'float', 'water_distance' => 'float', 'flow_rate' => 'float', 'solenoid_refill' => 'boolean', 'solenoid_irrigation' => 'boolean', 'automatic_mode' => 'boolean', 'abnormal_condition' => 'boolean',
            ];
}
