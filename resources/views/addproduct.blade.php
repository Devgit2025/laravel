@extends('layouts.app')
@section('title')
    เพิ่มสินค้า
@endsection
@section('content')
    <h2 class="text-center">เพิ่มสินค้า</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="/insert" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="pro_name">ชื่อสินค้า</label>
            <input type="text" name="pro_name" class="form-control">
        </div>
        @error('pro_name')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="pro_detail">รายละเอียดสินค้า</label>
            <textarea name="pro_detail" class="form-control"></textarea>
        </div>
        @error('pro_detail')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="pro_price">ราคาสินค้า</label>
            <input type="number" min="0" name="pro_price" class="form-control">
        </div>
        @error('pro_price')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="pro_stock">สต๊อคสินค้า</label>
            <input type="number" min="1" name="pro_stock" class="form-control">
        </div>
        @error('pro_stock')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="pro_img">รูปสินค้า</label>
            <input type="file" name="image" class="my-3">
        </div>
        @error('pro_img')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="{{route('allproduct')}}" class="btn btn-secondary">กลับหน้าหลัก</a>
    </form>
@endsection
