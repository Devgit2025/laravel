<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;


use function Symfony\Component\Clock\now;

class CheckoutController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        } else {
            $cart = session()->get('cart', []);
        }
        return view('checkout', compact('cart'));
    }

    function sendorder(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'ไม่มีสินค้าในตะกร้า');
        } else {
            $request->validate(
                [
                    'order_name' => 'required|string|max:100',
                    'order_address' => 'required|string',
                    'order_tel' => 'required|numeric',
                    'order_email' => 'required|string'
                ],
                [
                    'order_name.required' => 'กรุณากรอกชื่อ-นามสกุล',
                    'order_name.max' => 'ชื่อห้ามเกิน 100 ตัวอักษร',
                    'order_address.required' => 'กรุณากรอกที่อยู่',
                    'order_tel.required' => 'กรุณากรอกเบอร์โทรศัพท์',
                    'order_tel.numeric' => 'เบอร์โทรศัพท์ต้องเป็นตัวเลข',
                    'order_email.required' => 'กรุณากรอกอีเมล์'
                ]
            );

            $alltotal = session('total');

            $order = Orders::create([
                'order_date' => now(),
                'order_name' => $request->order_name,
                'order_email' => $request->order_email,
                'order_tel' => $request->order_tel,
                'order_address' => $request->order_address,
                'order_price_total' => $alltotal,
                'id_users' => Auth::id()
            ]);

            $orderId = $order->id; // 👉 order_id ที่เพิ่ง insert

            foreach ($cart as $item) {
                $sum = $item['price'] * $item['quantity'];
                //$total += $sum;
                OrderDetail::create([
                    'order_id' => $orderId,
                    'pro_id'        => $item['id'],
                    'pro_name'      => $item['name'],
                    'pro_price' => $item['price'],
                    'order_detail_quantity' => $item['quantity'],
                    'order_detail_total' => $sum
                ]);
            }

            $order = Orders::where('id', $orderId)->firstOrFail();
            $order_details = OrderDetail::where('order_id', $orderId)->get();


            session()->forget('cart');
        }

        return view('bill', compact('order', 'order_details'));
    }

    function allbill()
    {
        //$orders = Orders::all();
        //$orders = Orders::orderByDesc('id')->paginate(5);
        $orders = Orders::where('id_users', Auth::id())
            ->orderByDesc('id')
            ->paginate(5);
        return view('allbill', compact('orders'));

    }

    function detailbill($id)
    {
        $order = Orders::findOrFail($id);

        $order_details = OrderDetail::where('order_id', $id)->get();


        return view('detailbill', compact('order', 'order_details'));
    }
}
