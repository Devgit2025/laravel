@extends('layouts.app')
@section('title')
    ข้อมูลส่วนตัว
@endsection
@section('content')
    <h2 class="text-center">ข้อมูลส่วนตัว</h2>
    <p>{{ auth()->user()->id }}</p>
    <p>{{ auth()->user()->name }}</p>
    <p>{{ auth()->user()->email }}</p>
    <a href="{{ route('edit.user', auth()->user()->id) }}" class="btn btn-warning">แก้ไข</a>
@endsection
