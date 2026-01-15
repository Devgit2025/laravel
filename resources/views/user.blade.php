@extends('layouts.app')
@section('title')
    ข้อมูลส่วนตัว
@endsection
@section('content')
    <h2 class="text-center">ข้อมูลส่วนตัว</h2>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <p>{{ auth()->user()->id }}</p>
    <p>{{ auth()->user()->name }}</p>
    <p>{{ auth()->user()->email }}</p>
    
    @if ($user_detail)
        <p>Tel. : {{$user_detail->user_tel}}</p>
        <p>Role : {{$user_detail->role}}</p>

    @else
        
    @endif

    <a href="{{ route('edit.user') }}" class="btn btn-warning">แก้ไข</a>
@endsection
