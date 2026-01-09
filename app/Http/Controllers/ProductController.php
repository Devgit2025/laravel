<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    function index()
    {

        $products = Product::all();
        return view('welcome', compact('products'));

        //return view('welcome');
    }
    //insert
    function insert(Request $request)
    {
        $request->validate(
            [
                'pro_name' => 'required|string|max:100',
                'pro_detail' => 'required|string',
                'pro_price' => 'required|numeric|min:0',
                'pro_stock' => 'required|integer|min:0'
                //'pro_img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'pro_name.required' => 'กรุณากรอกชื่อสินค้า',
                'pro_name.max' => 'ชื่อสินค้าห้ามเกิน 100 ตัวอักษร',
                'pro_detail.required' => 'กรุณากรอกรายละเอียดสินค้า',
                'pro_price.required' => 'กรุณากรอกราคา',
                'pro_price.numeric' => 'ราคาต้องเป็นตัวเลข',
                'pro_stock.required' => 'กรุณากรอกจำนวนสินค้า',
                'pro_stock.integer' => 'ราคาต้องเป็นตัวเลขจำนวนเต็ม',
                'pro_img.required' => 'กรุณาเลือกรูปภาพ'
            ]
        );

        // 👉 บันทึกรูปลง localhost
        $imagePath = $request->file('image')->store('products', 'public');
        //เข้ารหัสพร้อมเก็บรูปภาพไว้ที่ public
        //$imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'pro_name' => $request->pro_name,
            'pro_img' => $imagePath,
            'pro_price' => $request->pro_price,
            'pro_detail' => $request->pro_detail,
            'pro_stock' => $request->pro_stock
        ]);

        //dd($request->all());
        //$products = Product::all();
        //return view('welcome', compact('products'));
        //return redirect('/');

        //ไปยังหน้าแอด และสร้าง session ชื่อ success พร้อมส่งข้อความด้วยไปยังหน้า addproduct
        return redirect()
            ->route('addproduct')
            ->with('success', 'บันทึกข้อมูลสำเร็จแล้ว');
    }

    function addproduct()
    {
        return view('addproduct');
    }
}
