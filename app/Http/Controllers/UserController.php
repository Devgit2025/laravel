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
        //Eror 404 จากการหา id_users ไม่พบใน ฐานข้อมูล

        $user_detail = UserDetail::where('id_users', Auth::id())->firstOrFail();
        if ($user_detail) {
            return view('user', compact('user_detail'));
        } else {
            return redirect()->route('user.index');
        }
        
    }

    function edituser()
    {
        //return redirect('/edituser');
        //$user = User::findOrFail($id);//จาก user ต้องเปลี่ยนเป็น userDetailแทนแล้วส่งค่าไปยัง edit
        //return view('edituser', compact('user'));
        $user_detail = UserDetail::where('id_users', Auth::id())->firstOrFail();
        return view('edituser', compact('user_detail'));
    }

    function updateuser(Request $request, $id)
    {
        // 1. validate ข้อมูล
        $request->validate(
            [
                'name' => 'required|string|max:100',
                'email' => 'required|string|email',
                'user_tel' => 'required|numeric',
            ],
            [
                'name.required' => 'กรุณากรอกชื่อเต็มของคุณ',
                'name.max' => 'ชื่อห้ามเกิน 100 ตัวอักษร',
                'email.required' => 'กรุณากรอกรายอีเมล์ของคุณ',
                'user_tel.required' => 'กรุณากรอกเบอร์โทรศัพท์ของคุณ',
                'user_tel.numeric' => 'เบอร์โทรศัพท์ต้องเป็นตัวเลข'
            ]
        );

        $user = User::findOrFail($id);

        // 3. update ข้อมูล
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        // 3. insert ข้อมูล
        $user_detail = UserDetail::where('id_users', Auth::id())->first();

        if ($user_detail) {
            $user_detail->update([
                'user_tel' => $request->user_tel
            ]);
        } else {
            UserDetail::create([
                'user_tel' => $request->user_tel,
                'role' => "user",
                'id_users' => Auth::id()
            ]);
        }


        return redirect()->route('user.index')
            ->with('success', 'แก้ไขข้อมูลเรียบร้อย');
    }
}
