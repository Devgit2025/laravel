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

    function edituser()
    {
        //return redirect('/edituser');
        //$user = User::findOrFail($id);//จาก user ต้องเปลี่ยนเป็น userDetailแทนแล้วส่งค่าไปยัง edit
        //return view('edituser', compact('user'));
        return view('edituser');
    }
}
