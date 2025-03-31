@extends('layouts.admin')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="container">
    <h2>Chi tiết sản phẩm</h2>
    <table class="table">
        <tr>
            <th>ID:</th>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>Mã SP:</th>
            <td>{{ $product->ma_san_pham }}</td>
        </tr>
        <tr>
            <th>Tên sản phẩm:</th>
            <td>{{ $product->ten_san_pham }}</td>
        </tr>
        <tr>
            <th>Giá:</th>
            <td>{{ number_format($product->gia, 0, ',', '.') }} VND</td>
        </tr>
        <tr>
            <th>Ảnh:</th>
            <td>
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="150">
                @else
                    Không có ảnh
                @endif
            </td>
        </tr>
    </table>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
