<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;
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
            ->editColumn('role', function ($data) {
                return str_replace(array('[',']','"'), '', $data->roles()->pluck('name'));
            })
            ->addColumn('actions', function ($data) {
                return view('user.actions', ['data' => $data]);
            })
            ->rawColumns(['role', 'actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        return User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    public function edit($id)
    {
        $roles = Role::pluck('name');

        $get = User::find($id);
        $get->roles = $roles;

        return $get;
    }

    public function show(Request $request)
    {
        return $request->user();
    }
}
