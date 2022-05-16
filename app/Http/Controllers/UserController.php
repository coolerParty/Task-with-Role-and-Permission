<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('user-show');

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('user-create');
        $roles = Role::get();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->authorize('user-create');

        $this->validate($request, [
            'password' => ['required', 'min:8', 'string', new Password, 'confirmed'],
            'email'    => ['required', 'email', 'unique:users'],
            'name'     => ['required', 'min:3'],
            'role'     => ['required'],
        ]);

        $user = User::create([
            'password' => Hash::make($request->input('password')),
            'email'    => $request->input('email'),
            'name'     => $request->input('name'),
        ]);

        foreach ($request->role as $p) {
            $user->assignRole($p);
        }

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $this->authorize('user-edit');

        $user = User::find($id);
        $roles = Role::get();
        $userRoles = DB::table('model_has_roles')
            ->where('model_has_roles.model_id', $id)
            ->pluck('model_has_roles.role_id')
            ->all();

        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('user-edit');

        $this->validate($request, [
            'name' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->save();

        $user->syncRoles($request->input('role'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }
}
