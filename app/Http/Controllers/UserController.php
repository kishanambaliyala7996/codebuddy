<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(25);
        return view('admin.users.index', compact('users'));
    }
}
