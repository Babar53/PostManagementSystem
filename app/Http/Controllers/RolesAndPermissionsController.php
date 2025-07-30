<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsController extends Controller
{
    public function index()
    {
       //used yajra datatable for showing roles
        if(request()->ajax())
        {
            $roles = Role::all();
            return datatables()->of($roles)
                ->addIndexColumn()
                ->addColumn('action' ,function ($role){
                    $editRoute = route('roles.edit',$role->id);
                    $deleteRoute = route('roles.delete',$role->id);
                    $viewRoute = route('roles.show',$role->id);

                    $viewButton = '<a href="'.$viewRoute.'" class="view text-success" title="View" style="margin: 5px; font-size: 1.2em;"><i class="fas fa-eye"></i></a>';
                    $editButton = '<a href="'.$editRoute.'" class="edit "title="Edit" style="margin: 5px; font-size: 1.2em;"><i class="fas fa-edit"></i></a>';
                    $deleteButton = '<a href="'.$deleteRoute.'" class="delete text-danger" title="Delete" style="margin:  5px; font-size: 1.2em;" onclick="return confirm(\'Are you sure you want to delete this project?\')"><i class="fas fa-trash-alt"></i></a>';

                    return $viewButton.$editButton.$deleteButton;
                })->rawColumns(['action'])
                ->make(true);
        }
        $title = 'Roles';

        return view('admin.roles.index' , compact('title'));
    }
}
