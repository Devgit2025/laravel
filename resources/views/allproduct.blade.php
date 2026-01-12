@extends('layouts.app')
@section('title')
    สินค้าทั้งหมด
@endsection
@section('content')
    <h2 class="text-center">สินค้าทั้งหมด</h2>
    @if (count($products) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">รูปภาพ</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $item)
                    <tr>
                        <td> <img src="{{ asset('storage/' . $item->pro_img) }}" alt="{{ $item->pro_name }}" width="100"
                                height="100">
                        </td>
                        <td>{{ $item->pro_name }}</td>
                        <td><a href="#" class="btn btn-warning">แก้ไข</a></td>
                        <td><a href="#" class="btn btn-danger">ลบ</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $products->links() }}
    @else
        <h4>ไม่พบข้อมูลในระบบ</h4>
    @endif
@endsection
