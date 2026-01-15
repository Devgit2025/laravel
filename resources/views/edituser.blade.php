@extends('layouts.app')
@section('title')
    แก้ไขข้อมูลส่วนตัว
@endsection
@section('content')
    <h2 class="text-center">แก้ไขข้อมูลส่วนตัว</h2>
    <h1>ID : {{ auth()->user()->id }}</h1>
    <h3>Fullname : {{ auth()->user()->name }}</h3>


    <form method="POST" action="{{ route('update.user', auth()->user()->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" class="form-control" value="{{ auth()->user()->id }}" readonly>
        </div>

        <div class="form-group">
            <label for="name">Fullname</label>
            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
        </div>
        @error('name')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
        </div>
        @error('email')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        @if ($user_detail)
            <div class="form-group">
                <label for="user_tel">Tel.</label>
                <input type="text" name="user_tel" class="form-control" value="{{ $user_detail->user_tel }}">
            </div>
            @error('user_tel')
                <div class="my-2">
                    <span class="text-danger">{{ $message }}</span>
                </div>
            @enderror
        @else
            <div class="form-group">
                <label for="user_tel">Tel.</label>
                <input type="text" name="user_tel" class="form-control" placeholder="กรุณาป้อนหมายเลขโทรศัพท์">
            </div>
            @error('user_tel')
                <div class="my-2">
                    <span class="text-danger">{{ $message }}</span>
                </div>
            @enderror
        @endif

        <div class="my-4">
            <button type="submit" class="btn btn-success">อัปเดต</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">กลับหน้าข้อมูลส่วนตัว</a>
        </div>

    </form>
@endsection
