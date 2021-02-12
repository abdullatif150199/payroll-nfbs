<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $title = 'Setting';
        $configs = Setting::get();

        return view('setting.index', compact('title', 'configs'));
    }

    public function update(Request $request)
    {
        foreach ($request->value as $key => $val) {
            Setting::where('key', $key)->update([
                'value' => $val
            ]);
        }

        return redirect()->back()->withSuccess('Konfigurasi berhasil diupdate');
    }
}
