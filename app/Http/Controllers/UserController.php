<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function datatable()
    {
        $data = User::with('roles')->whereDoesntHave('roles', function (Builder $query) {
            $query->where('name', 'root');
        })->get();

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
