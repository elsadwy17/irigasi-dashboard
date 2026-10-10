<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'soil' => 'nullable|integer|min:0|max:100',
            'temperature' => 'nullable|numeric',
            'humidity' => 'nullable|numeric|min:0|max:100',
            'pressure' => 'nullable|numeric',
            'water_distance' => 'nullable|numeric',
            'flow_rate' => 'nullable|numeric',

            'solenoid_refill' => 'nullable|boolean',
            'solenoid_irrigation' => 'nullable|boolean',
            'automatic_mode' => 'nullable|boolean',
            'abnormal_condition' => 'nullable|boolean',
        ]);

        $sensorData = SensorData::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data sensor berhasil disimpan',
            'data' => $sensorData
        ], 201);
    }
}
