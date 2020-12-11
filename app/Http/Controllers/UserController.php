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
        $roles = Role::pluck('name', 'id');

        return view('user.index', [
            'roles' => $roles
        ]);
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
        $get = User::with('roles')->findOrFail($id);

        return $get;
    }

    public function show(Request $request)
    {
        return $request->user();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:users,username,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'roles' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email
        ]);

        $user->roles()->sync($request->roles);

        return response()->json([
            'status' => 200,
            'message' => 'User berhasil diupdate'
        ]);
    }
}
