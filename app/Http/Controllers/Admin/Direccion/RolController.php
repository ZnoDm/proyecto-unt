<?php

namespace App\Http\Controllers\Admin\Direccion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.direccion.roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.direccion.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions'=>'required'
        ]);

        $role = Role::create([
            'name'=> $request->name
        ]);

        $role->permissions()->attach($request->permissions);

        return redirect()->route('admin.direccion.roles.index')->with('info','El rol se creo satisfactoriamente');
    }

    public function show(Role $role)
    {

    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.direccion.roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'permissions'=>'required'
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.direccion.roles.edit',$role)->with('info','El rol se actualizo satisfactoriamente');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.direccion.roles.index')->with('info','El rol se elimino satisfactoriamente');;
    }
}
