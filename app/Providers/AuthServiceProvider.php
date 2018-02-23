<?php

namespace App\Providers;

use Auth;
use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot (GateContract $gate)
    {
        $this->registerPolicies();

        $admin = Auth::guard('admin')->user();

        if (! $admin) return;

        $adminRolesAndPermissions = $admin->roles()->with('permissions')->get()->toArray();
        $permissionsArray = [];

        foreach ($adminRolesAndPermission as $role => $permissions) {
            foreach ($permissions as $permission) {
                if (!in_array($permission['id'], $permissionsArray)) {
                    $permissionsArray[] = $permission['id'];
                }
            }
        }

        foreach (Permission::all() as $permission) {
            $gate->define($permission->name, function () {
                return in_array($permission->id, $permissionsArray);
            });
        }
    }
}
