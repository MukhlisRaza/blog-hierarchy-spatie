<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Role::create(['name' => 'Publish_Moderator']);
        // Permission::create(['name' => 'Add Blogger']);
        // $role = Role::findById(6);
        // $permission = Permission::findById(9);
        // $role->givePermissionTo($permission);
        // auth()->user()->assignRole('Admin');
        // return auth()->user()->getPermissionsViaRoles();

        return view('home');
    }
}
