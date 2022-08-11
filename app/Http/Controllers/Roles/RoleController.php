<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->paginate(10);
        return view('pages.roles.index', compact('roles'));
    }
}
