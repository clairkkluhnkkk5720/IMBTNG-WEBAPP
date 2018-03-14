<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsTrashController extends Controller
{
	/**
	 * shows deleted admins
	 * 
	 * @return \Illuminate\Http\Response
	 */
    public function index ()
    {
    	$admins = Admin::onlyTrashed()->paginate(15);

    	return view(
    		'dashboard.admins.trash.index',
    		compact('admins')
    	);
    }

    /**
     * shows the deleted admin profile
     * 
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
    	$admin = $this->getTrashedAdmin($id);
    	$roles = $admin->roles;

    	return view(
    		'dashboard.admins.trash.show',
    		compact('admin', 'roles')
    	);
    }

    /**
     * get deleted admin
     * 
     * @param  string  $id
     * @return \App\Models\Admin
     */
    protected function getTrashedAdmin (string $id)
    {
    	return Admin::onlyTrashed()->findOrFail($id);
    }

    /**
     * restores a deleted Admin
     * 
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function restore ($id)
    {
    	$admin = $this->getTrashedAdmin($id);

    	if (!$admin->restore()) {
    		return back()->with(
    			'global.error',
    			'Something went wrong while restoring the Admin. Please try again later.'
    		);
    	}

    	return redirect()->route('dashboard.admins.trash.index')->with(
    		'global.success',
    		'Admin restored successfully.'
    	);
    }
}
