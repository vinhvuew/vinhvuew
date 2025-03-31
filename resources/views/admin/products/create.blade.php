@extends('layouts.admin')

@section('title', 'Thêm sản phẩm mới')

@section('content')
    <div class="container">
        <h2>Thêm sản phẩm mới</h2>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Mã sản phẩm</label>
                <input type="text" name="ma_san_pham" class="form-control" value="{{ old('ma_san_pham') }}">
                @error('ma_san_pham')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="ten_san_pham" class="form-control" value="{{ old('ten_san_pham') }}">
                @error('ten_san_pham')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="number" name="gia" class="form-control" value="{{ old('gia') }}">
                @error('gia')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Giá sale</label>
                <input type="number" name="gia_khuyen_mai" class="form-control" value="{{ old('gia_khuyen_mai') }}">
                @error('gia_khuyen_mai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                <input type="number" name="so_luong" class="form-control" value="{{ old('so_luong') }}">
                @error('so_luong')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Ngày nhập</label>
                <input type="date" name="ngay_nhap" class="form-control" value="{{ old('ngay_nhap') }}">
                @error('ngay_nhap')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="mo_ta" class="form-control">{{ old('mo_ta') }}</textarea>
                @error('mo_ta')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="anh_san_pham" class="form-label">Hình ảnh</label>
                <input type="file" name="anh_san_pham" class="form-control @error('anh_san_pham') is-invalid @enderror">
                @error('hinh_anh')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">trang thai</label>
                <input type="text" name="trang_thai" class="form-control" value="{{ old('trang_thai') }}">
                @error('trang_thai')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục</label>
                <select name="category_id" class="form-control" @error('category_id') is-invalid @enderror >

                    <option value="">-- Chọn danh mục --</option>
                    @foreach ($category as $categorys)
                    <option value="{{ $categorys->id }}" {{ old('category_id') == $categorys->id ? 'selected' : '' }}>
                        {{ $categorys->ten_danh_muc }}
                    </option>
                @endforeach

                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Thêm mới</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
