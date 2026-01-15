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

    <div class="d-flex justify-content-center mt-5">
        <table class="table table-bordered w-50 text-center">
            <tbody>
                <tr>
                    <th width="30%" class="table-primary">ID</th>
                    <td>{{ Auth::id() }}</td>
                </tr>
                <tr>
                    <th class="table-primary">ชื่อ</th>
                    <td>{{ auth()->user()->name }}</td>
                </tr>
                <tr>
                    <th class="table-primary">อีเมล</th>
                    <td>{{ auth()->user()->email }}</td>
                </tr>
                @if ($user_detail)
                    <tr>
                        <th class="table-primary">เบอร์โทรศัพท์</th>
                        <td>{{ $user_detail->user_tel }}</td>
                    </tr>
                    <tr>
                        <th class="table-primary">สิทธิ์ผู้ใช้</th>
                        <td>{{ $user_detail->role }}</td>
                    </tr>
                @else
                @endif
                <tr>
                    <td colspan="2"> <a href="{{ route('edit.user') }}" class="btn btn-warning">แก้ไขข้อมูล</a></td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
