<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BulkUploadController extends Controller
{
    public function index()
    {
        return view('bulk.index');
    }
}
