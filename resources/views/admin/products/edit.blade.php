@extends('layouts.admin')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
<div class="container">
    <h2>Chỉnh sửa sản phẩm</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Mã sản phẩm</label>
            <input type="text" name="ma_san_pham" class="form-control" value="{{ old('ma_san_pham', $product->ma_san_pham) }}">
            @error('ma_san_pham')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="ten_san_pham" class="form-control" value="{{ old('ten_san_pham', $product->ten_san_pham) }}">
            @error('ten_san_pham')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" name="gia" class="form-control" value="{{ old('gia', $product->gia) }}">
            @error('gia')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Giá khuyến mãi</label>
            <input type="number" name="gia_khuyen_mai" class="form-control" value="{{ old('gia_khuyen_mai', $product->gia_khuyen_mai) }}">
            @error('gia_khuyen_mai')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Số lượng</label>
            <input type="number" name="so_luong" class="form-control" value="{{ old('so_luong', $product->so_luong) }}">
            @error('so_luong')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày nhập</label>
            <input type="date" name="ngay_nhap" class="form-control" value="{{ old('ngay_nhap', $product->ngay_nhap) }}">
            @error('ngay_nhap')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="mo_ta" class="form-control">{{ old('mo_ta', $product->mo_ta) }}</textarea>
            @error('mo_ta')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="trang_thai" class="form-control">
                <option value="con_hang" {{ old('trang_thai', $product->trang_thai) == 'con_hang' ? 'selected' : '' }}>Còn hàng</option>
                <option value="het_hang" {{ old('trang_thai', $product->trang_thai) == 'het_hang' ? 'selected' : '' }}>Hết hàng</option>
            </select>
            @error('trang_thai')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <select name="category_id" class="form-control">
                <option value="">Chọn danh mục</option>
                @foreach($category as $categorys)
                    <option value="{{ $categorys->id }}"
                        {{ old('category_id', $product->category_id) == $categorys->id ? 'selected' : '' }}>
                        {{ $categorys->ten_danh_muc }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">Ảnh sản phẩm</label>
            <input type="file" name="anh_san_pham" class="form-control">
            @if($product->anh_san_pham)
                <img src="{{ asset('storage/' . $product->anh_san_pham) }}" width="100" class="mt-2">
            @endif
            @error('anh_san_pham')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
