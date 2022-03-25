<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchPassword;
use App\Models\User;

class AkunController extends ProfileController
{
    public function password()
    {
        return view('profile.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchPassword],
            'password' => ['required'],
            'confirm_password' => ['same:password'],
        ]);

        User::find(auth()->user()->id)->update([
            'password'=> Hash::make($request->password)
        ]);

        return redirect()->back()
            ->with('success', 'Password berhasil diubah!');
    }
}
