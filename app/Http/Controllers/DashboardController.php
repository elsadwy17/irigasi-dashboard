<?php

namespace App\Http\Controllers;

use App\Models\SensorData;

class DashboardController extends Controller
{
    public function index()
    {
        $latestSensor = SensorData::latest()->first();

        return view('dashboard', compact('latestSensor'));
    }
}



