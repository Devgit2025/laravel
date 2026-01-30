@extends('layouts.app')
@section('title')
    จัดส่งสินค้า
@endsection
@section('content')
    <h2 class="text-center">จัดส่งสินค้า</h2>

    @php
        $cart = session('cart', []);
    @endphp
    <table border="1" width="50%" class="my-4">
        <tr>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th>จำนวน</th>
            <th>รวม(บาท)</th>
        </tr>

        @php $total = 0; @endphp

        @foreach ($cart as $item)
            @php
                $sum = $item['price'] * $item['quantity'];
                $total += $sum;

            @endphp
            <tr>
                <td>- {{ $item['name'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ number_format($sum, 2) }}</td>
                @php
                    session(['total' => $total]);
                @endphp
            </tr>
        @endforeach

    </table>

    <form method="POST" action="/sendorder" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="order_name">ชื่อ-นามสกุล</label>
            <input type="text" name="order_name" class="form-control">
        </div>
        @error('order_name')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="order_address">ที่อยู่</label>
            <textarea name="order_address" class="form-control"></textarea>
        </div>
        @error('order_address')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="order_tel">เบอร์โทรศัพท์</label>
            <input type="text" name="order_tel" class="form-control">
        </div>
        @error('order_tel')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="order_email">อีเมล์</label>
            <input type="text" name="order_email" class="form-control">
        </div>
        @error('order_email')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror


        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="{{ route('allproduct') }}" class="btn btn-secondary">กลับหน้าหลัก</a>
    </form>
@endsection
