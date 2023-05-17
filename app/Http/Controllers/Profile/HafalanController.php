<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

class HafalanController extends ProfileController
{
    public function index () 
    {
        return view('profile.hafalan.index');
    }
}