<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Middleware\SimpleAuth;
use App\Models\SensorData;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    if (
        $request->username === 'admin' &&
        $request->password === '12345'
    ) {
        Session::put('logged_in', true);

        return redirect('/dashboard');
    }

    return redirect()->back()->with(
        'error',
        'Username atau Password Salah!'
    );
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('simpleauth');


Route::get('/status-notifikasi', function () {
    $sensor = SensorData::latest()->first();

    return response()->json([
        'id' => $sensor?->id,
        'abnormal_condition' => (bool) ($sensor?->abnormal_condition ?? false),
        'flow_rate' => $sensor?->flow_rate,
        'solenoid_irrigation' => (bool) ($sensor?->solenoid_irrigation ?? false),
    ]);
})->middleware('simpleauth');

Route::get('/grafik-histori', function() {
    $sensorData = SensorData::latest()->get();

    return view('grafik-histori', compact('sensorData'));
})->middleware('simpleauth');

Route::get('/log-sensor', function (Request $request) {
    $bulan = $request->query('bulan');

    $query = SensorData::query();

    if ($bulan && preg_match('/^\d{4}-\d{2}$/', $bulan)) {
        [$tahun, $nomorBulan] = explode('-', $bulan);

        $query->whereYear('created_at', $tahun) ->whereMonth('created_at', $nomorBulan); } else { $bulan = ''; } $sensorData = $query->orderByDesc('created_at'); if (!$bulan) { $sensorData = $sensorData->limit(10);

    }
    $sensorData = $sensorData->get();

    return view('log-sensor', compact('sensorData', 'bulan'));
})->middleware('simpleauth');

Route::get('/log-aktivitas', function(Request $request) {
     $bulan = $request->query('bulan');

    $query = SensorData::query();

    if ($bulan && preg_match('/^\d{4}-\d{2}$/', $bulan)) {
        [$tahun, $nomorBulan] = explode('-', $bulan);

        $query->whereYear('created_at', $tahun) ->whereMonth('created_at', $nomorBulan); } else { $bulan = ''; } $sensorData = $query->orderByDesc('created_at'); if (!$bulan) { $sensorData = $sensorData->limit(10);

    }
    $sensorData = $sensorData->get();

    return view('log-aktivitas', compact('sensorData', 'bulan'));
})->middleware('simpleauth');

Route::get('/pengaturan', function() {
    $setting = \App\Models\Setting::first();

    return view('pengaturan', compact('setting'));
})->middleware('simpleauth');

Route::post('/pengaturan', [SettingController::class, 'update'])
    ->middleware('simpleauth');

Route::get('/api/dummy', function () {
    return [
        "soil_moisture" => rand(30, 80),
        "air_temperature" => rand(24, 30),
        "air_humidity" => rand(60, 95),
        "water_level" => rand(20, 100),
        "debit_air" => rand(0, 10),
        "valve_status" => rand(0, 1)
    ];
});

Route::post('/logout', function() {
    Session::forget('logged_in');
    return redirect('/login');
});

