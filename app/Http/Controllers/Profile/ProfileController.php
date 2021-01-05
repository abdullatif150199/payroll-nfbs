<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function edit($username)
    {
        $user = User::with('karyawan')->whereUsername($username)->first();

        return view('profile.edit', ['user' => $user]);
    }

    /**
     * get Id karyawan
     */
    public function getId()
    {
        return Auth::user()->karyawan->id;
    }
}
