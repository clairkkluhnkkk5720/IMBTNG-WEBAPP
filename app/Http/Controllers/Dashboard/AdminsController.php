<?php

namespace App\Http\Controllers\Dashboard;

use Hash;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
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
        $this->validateAdmin($request);

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
     * validates Admin store or update request
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateAdmin(Request $request)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
