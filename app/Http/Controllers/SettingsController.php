<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index', [
            'setting' => Setting::first(),
        ]);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'theme' => 'required|string',
        ]);

        $setting = Setting::firstOrCreate(
            [],
            [
                'theme' => 'light',
            ]
        );

        $setting->update($validated);

        return back()->with('success', 'Settings updated successfully.');
    }
}
