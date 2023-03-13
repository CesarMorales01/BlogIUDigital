<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    public function __construct() {
        $this->middleware(['auth', 'rol.admin']);
    }
    
    public function index(){
        $users = User::all();
        return view('dashboard.user.index', ['users'=> $users]);
    }

    public function create() {
        return view('dashboard.user.create', ['user'=> new User()]);
    }

    public function store(Request $request) {
        User::create(
            [
                'name'=> $request['name'],
                'surname'=> $request['surname'],
                'rol_id'=> $request['rol_id'],
                'email'=> $request['email'],
                'password'=> Hash::make($request['name'])
            ]
        );
        return back()->with('status', 'Usuario creado con exito.');
    }

    public function show(User $user){
        return view('dashboard.user.show', ['user'=>$user]);
    }

    public function edit(User $user){
        return view('dashboard.user.edit', ['user'=>$user]);
    }

    
    public function update(Request $request, User $user){
        $user->update([
            'name'=> $request['name'],
            'surname'=> $request['surname'],
            'email'=> $request['email'],
        ]);
        return back()->with('status', 'Usuario actualizado con exito.');
    }


    public function destroy(User $user){
        $user->delete();
        return back()->with('status', 'Usuario eliminado!');
    }
}
