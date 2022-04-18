<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Role/Index', ['all_roles' => Role::select('id','name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Role/Create', ['permission_list' => Permission::select('id','name')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->role_name]);
		$role->givePermissionTo($request->selectedPermissions);

		return redirect()->action([RoleController::class, 'index'])
                        ->with('message', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return inertia('Role/View', ['role_name' => $role->name, 'permissions' => $role->permissions->pluck('name')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $granted_permission_list = $role->permissions->pluck('name', 'id');
        $all_permissions = Permission::select('id','name')->get()->pluck('name', 'id');
        return inertia('Role/Edit', compact('granted_permission_list', 'role', 'all_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update(['name' => $request->role_name]);
		$role->syncPermissions($request->selectedPermissions);
        $role->save();

		return redirect()->action([RoleController::class, 'index'])
                        ->with('message', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->action([RoleController::class, 'index'])
                        ->with('message', 'Role deleted successfully');
    }
}
