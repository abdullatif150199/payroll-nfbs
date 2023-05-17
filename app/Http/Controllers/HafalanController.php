<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HafalanController extends Controller
{
    public function index () 
    {
        return view('hafalan.index');
    }
}
