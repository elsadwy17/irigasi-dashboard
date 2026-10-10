<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'soil_threshold' => 'required|integer|min:0|max:100',
            'refill_distance' => 'required|numeric|min:0',
            'abnormal_timeout' => 'required|integer|min:1',
            'automatic_mode' => 'required|boolean',
        ]);

        $setting = Setting::first();

        if (!$setting) {
            Setting::create($validated);
        } else {
            $setting->update($validated);
        }

        return redirect('/pengaturan')
            ->with('success', 'Pengaturan berhasil disimpan.');
    }
}
