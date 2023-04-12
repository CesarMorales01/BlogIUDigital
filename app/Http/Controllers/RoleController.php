<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    
    public function index() {
       $roles= Role::all();
       return view('dashboard.role.index', ['roles'=> $roles]);
    }

    public function create()
    {
        $permisos=Permission::all();
        return view('dashboard.role.create', ['permisos'=> $permisos]);
    }

 
    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required | unique:roles', 'permission'=>'required']);
        $role=Role::create($request->only('name'));
        $role->syncPermissions($request->input('permission', []));
        return redirect()->route('role.index');
    }

    public function edit(Role $role)
    {
        $role ->load('permissions');
        $permisos=Permission::all();
        return view('dashboard.role.edit', ['role'=>$role, 'permisos'=>$permisos]);
    }

    
    public function update(Request $request, Role $role)
    {
        $this->validate($request, ['name'=>'required', 'permissions'=>'required']);
        $role->update($request->only('name'));
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('status', 'Rol eliminado!');
    }
}
