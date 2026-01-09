@extends('layouts.app')
@section('title')
    หน้าแรก
@endsection
@section('content')
    <div class="text-center">
        <h1 class="display-5 mb-3">กรุณาเลือกเมนู</h1>
    </div>
    <div class="row">
        @if (count($products) > 0)
            @foreach ($products as $item)
        <div class="col-sm-6 col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('storage/' . $item->pro_img) }}" alt="{{ $item->pro_name }}" width="200" height="200" class="card-img-top">
                    <h5 class="card-title">{{$item->pro_name}}</h5>
                    <p class="card-subtitle text-muted">{{$item->pro_detail}}</p>
                    <p class="card-text text-success h5">{{$item->pro_price}} บาท</p>
                    <a class="btn btn-success w-100" href="#">Add to cart</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <h2 class="text-center">ไม่พบข้อมูลสินค้าในระบบ</h2>
        @endif
        
    </div>
    @endsection
