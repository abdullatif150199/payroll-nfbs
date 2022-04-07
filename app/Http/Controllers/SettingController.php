<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

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
        $ruleSetting = Setting::pluck('rule', 'key')->toArray();
        $request->validate($ruleSetting);

        $data = $request->except('_token', '_method');
        foreach ($data as $key => $val) {
            Setting::where('key', $key)->update([
                'value' => $val
            ]);
        }

        Cache::forget('setting');
        Cache::remember('setting', 720 * 60, function () {
            return array_pluck(Setting::all()->toArray(), 'value', 'key');
        });

        return redirect()->back()->withSuccess('Konfigurasi berhasil diupdate');
    }
}
