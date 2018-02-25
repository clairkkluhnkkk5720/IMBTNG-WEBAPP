<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $roles = Role::latest()->withCount(['admins', 'permissions'])->paginate(15);

        return view(
            'dashboard.roles.index',
            compact('roles')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        $permissions = Permission::all();

        return view(
            'dashboard.roles.create',
            compact('permissions')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $this->validateRole($request);

        $role = new Role;

        $role->name    = $request->name;
        $role->details = $request->details;

        if (! $role->save()) {
            return back()->with(
                'global.error',
                'Something went wrong while creating the Role. Please try again later.'
            );
        }

        $permissions = $request->permissions;

        if (! $role->permissions()->attach($permissions)) {
            return redirect()->route('dashboard.roles.index')->with(
                'global.warning',
                'Role is created successfully but couldn\'t attach the permissions.'
            );
        }

        return redirect()->route('dashboard.roles.index')->with(
            'global.success',
            'Role is created successfully.'
        );
    }

    /**
     * Validates role
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateRole (Request $request)
    {
        $rules = [
            'name'        => 'required|string',
            'details'     => 'required|string',
            'permissions' => 'required|array|min:1',
        ];

        $this->validate($request, $rules);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show (Role $role)
    {
        $permissions = $role->permissions;
        $admins      = $role->admins;

        return view(
            'dashboard.roles.show',
            compact('role', 'permissions', 'admins')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit (Role $role)
    {
        $permissions = Permission::all();

        $rolePermissions = [];

        foreach ($role->permissions as $permission) {
            $rolePermissions[] = $permission->id;
        }

        return view(
            'dashboard.roles.edit',
            compact('role', 'permissions', 'rolePermissions')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, Role $role)
    {
        $this->validateRole($request);

        $role->name    = $request->name;
        $role->details = $request->details;

        if (!$role->save()) {
            return back()->with(
                'global.error',
                'Something went wrong while updating the Role. Please try again.'
            );
        }

        $role->permissions()->detach();
        $role->permissions()->attach($request->permissions);

        return redirect()->route('dashboard.roles.show', $role->id)->with(
            'global.success',
            'Role is updated successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Role $role)
    {
        if ($role->delete()) {
            return redirect()->route('dashboard.roles.index')->with(
                'global.success',
                'Role is successfully deleted'
            );
        }

        return back()->with(
            'global.error',
            'Something went wrong while deleting the role. Please try again later.'
        );
    }
}
