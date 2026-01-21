@extends('layouts.app')
@section('title')
    ตะกร้าสินค้า
@endsection
@section('content')
    <h2>ตะกร้าสินค้า</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <table border="1" width="100%">
        <tr>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th>จำนวน</th>
            <th>รวม</th>
            <th>จัดการ</th>
        </tr>

        @php $total = 0; @endphp
        @foreach ($cart as $id => $item)
            @php
                $sum = $item['price'] * $item['quantity'];
                $total += $sum;
            @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>
                    <form action="{{ route('cart.update', $id) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                        <button class="btn btn-primary">อัปเดต</button>
                    </form>
                </td>
                <td>{{ number_format($sum) }}</td>
                <td>
                    <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger">ลบ</a>
                </td>
            </tr>
        @endforeach
    </table>

    <h3 class="text-end my-4">ยอดรวมทั้งหมด: {{number_format($total)}} บาท</h3>

    <div class="d-flex">
        <a href="{{ route('cart.clear') }}" class="btn btn-secondary ms-auto me-3">ล้างตะกร้า</a>
        <a href="#" class="btn btn-success">คิดเงิน</a>

    </div>
    
@endsection
