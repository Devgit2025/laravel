<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    // แสดงตะกร้า
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // เพิ่มสินค้า
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->pro_name,
                "price" => $product->pro_price,
                "quantity" => 1,
                "image" => $product->pro_img
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'เพิ่มสินค้าแล้ว');
    }

    // อัปเดตจำนวน
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'อัปเดตสินค้าเรียบร้อย');
    }

    // ลบสินค้า
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    // ล้างตะกร้า
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back();
    }

}
