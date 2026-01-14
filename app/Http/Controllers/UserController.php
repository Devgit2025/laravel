<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    function index()
    {
        return view('user');
    }

    function edituser($id)
    {
        //return redirect('/edituser');
        $user = User::findOrFail($id);
        return view('edituser', compact('user'));
    }
}
