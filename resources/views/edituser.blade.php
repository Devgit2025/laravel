@extends('layouts.app')
@section('title')
    แก้ไขข้อมูลส่วนตัว
@endsection
@section('content')
    <h2 class="text-center">แก้ไขข้อมูลส่วนตัว</h2>
    <h1>ID : {{auth()->user()->id}}</h1>
    <h3>Fullname : {{auth()->user()->name}}</h3>
@endsection