<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index' , compact('roles'));
    }
}
