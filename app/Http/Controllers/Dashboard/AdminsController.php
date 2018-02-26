<?php

namespace App\Http\Controllers\Dashboard;

use Hash;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    /**
     * Display a listing of Admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $admins = Admin::latest()->paginate(15);

        return view(
            'dashboard.admins.index',
            compact('admins')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        $roles = Role::all();

        return view(
            'dashboard.admins.create',
            compact('roles')
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
        $this->validateNewAdmin($request);

        $admin = new Admin;

        $admin->firstname = $request->firstname;
        $admin->lastname  = $request->lastname;
        $admin->email     = $request->email;
        $admin->phone     = $request->phone;
        $admin->password  = Hash::make($request->password);

        if (!$admin->save()) {
            return back()->with(
                'global.error',
                'Something went wrong while creating new admin. Please try again later.'
            )->withInput();
        }

        $admin->roles()->attach($request->roles);

        return redirect()->route('dashboard.admins.index')->with(
            'global.success',
            'A new admin created successfully.'
        );
    }

    /**
     * validates new Admin request
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateNewAdmin(Request $request)
    {
        $rules = [
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'email'     => 'required|email|unique:admins',
            'phone'     => 'required|unique:admins',
            'password'  => 'required|confirmed|min:6|max:16',
            'roles'     => 'required|array|min:1',
        ];

        $this->validate($request, $rules);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show (Admin $admin)
    {
        $roles = $admin->roles;

        return view(
            'dashboard.admins.show',
            compact('admin', 'roles')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit (Admin $admin)
    {
        $roles      = Role::all();
        $adminRoles = [];

        foreach ($admin->roles as $role) {
            $adminRoles[] = $role->id;
        }

        return view(
            'dashboard.admins.edit',
            compact('admin', 'roles', 'adminRoles')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin         $admin
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, Admin $admin)
    {
        $this->validateExistingAdmin($request, $admin);

        $admin->firstname = $request->firstname;
        $admin->lastname  = $request->lastname;
        $admin->email     = $request->email;
        $admin->phone     = $request->phone;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        if (!$admin->save()) {
            return back()->with(
                'global.error',
                'Something went wrong while updating the Admin. Please try again later.'
            );
        }

        $admin->roles()->detach();
        $admin->roles()->attach($request->roles);

        return redirect()->route('dashboard.admins.show', $admin->id)->with(
            'global.success',
            'Admin profile updated successfully.'
        );
    }

    /**
     * validates an existing Admin when updating
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin         $admin
     * @return void
     */
    protected function validateExistingAdmin (Request $request, Admin $admin)
    {
        $rules = [
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'roles'     => 'required|array|min:1',

            'email' => [
                'required', 'email',
                Rule::unique('admins')->ignore($admin->id),
            ],

            'phone' => [
                'required',
                Rule::unique('admins')->ignore($admin->id),
            ],
        ];

        if ($request->password) {
            $rules['password'] = 'required|confirmed|min:6|max:16';
        }

        $this->validate($request, $rules);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
