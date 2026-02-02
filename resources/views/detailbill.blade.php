@extends('layouts.app')
@section('title')
    รายละเอียดบิล
@endsection
@section('content')
    <h2 class="text-center">รายละเอียดบิล</h2>

    <div class="d-flex justify-content-center mt-5">
        <table class="table table-bordered w-50 text-center">
            <tbody>
                <tr>
                    <th width="30%" class="table-primary">เลขที่ใบสั่งซื้อ</th>
                    <td>{{$order->id}}</td>
                </tr>
                <tr>
                    <th width="30%" class="table-primary">เวลาสั่งซื้อ</th>
                    <td>{{$order->order_date}}</td>
                </tr>
                <tr>
                    <th class="table-primary">ชื่อ-นามสกุล</th>
                    <td>{{ $order->order_name }}</td>
                </tr>
                <tr>
                    <th width="30%" class="table-primary">ที่อยู๋</th>
                    <td>{{$order->order_address}}</td>
                </tr>
                <tr>
                    <th width="30%" class="table-primary">เบอร์โทรศัพท์</th>
                    <td>{{$order->order_tel}}</td>
                </tr>
                <tr>
                    <th class="table-primary">อีเมล</th>
                    <td>{{$order->order_email }}</td>
                </tr>
                <tr>
                    <th width="30%" class="table-primary">รายการสั่งซื้อ</th>
                        <td>
                            @foreach ($order_details as $item)
                            <p>- {{$item->pro_name}} ราคา {{$item->pro_price}} บาท จำนวนชิ้น {{$item->order_detail_quantity}}</p>
                            @endforeach
                        </td>
                </tr>
                <tr>
                    <th width="30%" class="table-primary">ราคารวม</th>
                    <td>{{$order->order_price_total}} บาท</td>
                </tr>
                <tr>
                    <td colspan="2"> <a href="{{ route('allbill') }}" class="btn btn-warning">ย้อนกลับ</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    
@endsection