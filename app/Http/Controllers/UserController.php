<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function getUser()
    {
        $data = User::all();

        return Datatables::of($data)
            ->editColumn('role', function($data) {
                    return $data->roles->pluck('name');
            })
            ->addColumn('actions', function($data) {
                return view('user.actions', ['data' => $data]);
            })
            ->rawColumns(['role', 'actions'])
            ->make(true);
    }
}
