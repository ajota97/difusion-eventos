<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
      $users = User::whereHas('roles')->get();

      return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get(['id', 'name']);
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'     => 'required | min:3',
                'email'    =>  'required | email| unique:users,email',
                'password' => 'required | confirmed | min:6',
                'password_confirmation' => 'required',
            ],
            [
                'name.required'  => 'El campo NOMBRE no puede ser vacio',
                'name.min'       => 'El campo NOMBRE tiene que ser de al menos 3 caracteres',
                'email.required' => 'El campo CORREO no puede ser vacio', 
                'email.email'    => 'Se requiere un correo valido', 
                'email.unique'   => 'El correo ya se encuentra registrado',
                'password.required' => 'El campo contraseña no puede ser vacio', 
                'password.confirmed' => 'no se pudo confirmar la contraseña intente de nuevo', 
                'password.min' => 'Se requiere una contraseña con un minimo 6 caracteres', 
                'password_confirmation.required' => 'confirme la contraseña e intente de nuevo', 
            ]
        );

        $user = User::create([
                  'name'      =>  $request->name,
                  'email'     =>  $request->email,
                  'password'  =>  Hash::make($request->password),
                ]);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function show($id)
    {
           $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get(['id', 'name']);
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('admin.users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name'     => 'required | min:3',
                'email'    =>  'required | email| unique:users,email',
            ],
            [
                'name.required'  => 'El campo NOMBRE no puede ser vacio',
                'name.min'       => 'El campo NOMBRE tiene que ser de al menos 3 caracteres',
                'email.required' => 'El campo CORREO no puede ser vacio', 
                'email.email'    => 'Se requiere un correo valido', 
                'email.unique'   => 'El correo ya se encuentra registrado',
            ]
        );

        // $user = User::where('email', $request->email)->first();
        // $user->update(['name' => $request->name]);
        // $user->syncRoles($request->input('roles'));

        $user -> update($request->all());

        return redirect()->route('users.index')->with('success', 'Usuario actualizado.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','Usuario eliminado exitosamente.');

    }
}
