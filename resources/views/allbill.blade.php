@extends('layouts.app')
@section('title')
    รายการใบเสร็จทั้งหมด
@endsection
@section('content')
    <h2 class="text-center">รายการใบเสร็จทั้งหมด</h2>

    @if (count($orders) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">อีเมล์</th>
                    <th scope="col">ราคารวม</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orders as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->order_name }}</td>
                        <td>{{ $item->order_email }}</td>
                        <td>{{ $item->order_price_total }}</td>
                        <td><a href="{{ route('detailbill', $item->id) }}" class="btn btn-success">ดูรายละเอียด</a></td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $orders->links() }}
    @else
        <h4>ไม่พบข้อมูลในระบบ</h4>
    @endif
@endsection
