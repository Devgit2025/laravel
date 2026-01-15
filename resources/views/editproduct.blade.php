@extends('layouts.app')
@section('title')
    แก้ไขสินค้า
@endsection
@section('content')
    <h2 class="text-center">แก้ไขข้อมูลสินค้า</h2>
    <form method="POST" action="{{ route('updateproduct', $product->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="pro_name">ชื่อสินค้า</label>
            <input type="text" name="pro_name" class="form-control" value="{{ $product->pro_name }}">
        </div>
        @error('pro_name')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="pro_detail">รายละเอียดสินค้า</label>
            <textarea name="pro_detail" class="form-control">{{ $product->pro_detail }}</textarea>
        </div>
        @error('pro_detail')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="pro_price">ราคาสินค้า</label>
            <input type="number" min="0" name="pro_price" class="form-control" value="{{ $product->pro_price }}">
        </div>
        @error('pro_price')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="pro_stock">สต๊อคสินค้า</label>
            <input type="number" min="1" name="pro_stock" class="form-control" value="{{ $product->pro_stock }}">
        </div>
        @error('pro_stock')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="pro_img">รูปสินค้า</label>
            <img src="{{ asset('storage/' . $product->pro_img) }}" alt="{{ $product->pro_name }}" width="100"
                height="100">
            <input type="file" name="image" class="my-3">
        </div>
        @error('pro_img')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <div class="my-4">
            <button type="submit" class="btn btn-success">อัปเดต</button>
            <a href="/allproduct" class="btn btn-secondary">กลับหน้าสินค้าทั้งหมด</a>
        </div>

    </form>
@endsection
