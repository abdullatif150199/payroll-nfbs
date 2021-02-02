<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BulkImport;

class BulkImportController extends Controller
{
    public function index()
    {
        return view('bulk.index');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');

        $import = new BulkImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        return back()->withStatus('Data berhasil diimport ke database');
    }
}
