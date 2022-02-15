@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content1')
    {{-- demo truoc do --}}
    {{-- <h2>alo picasso</h2>
    <button type="button" class="show">Thông báo</button> --}}
    <h1>Thêm sản phẩm</h1>

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif

    <form action="" method="POST">
        <div class="mb-3">
            <label for="">Tên sản phẩm</label>
            <input type="text" class="form-control" name="product-name" placeholder="Tên sản phẩm..."
                value="{{ old('product-name') }}">
            @error('product-name')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Giá sản phẩm</label>
            <input type="text" class="form-control" name="product-price" placeholder="Giá sản phẩm..."
                value="{{ old('product-price') }}">
            @error('product-price')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        @csrf
        <button type="submit" class="btn btn-danger">Submit</button>
        {{-- @method('PUT') --}}
    </form>
@endsection

{{-- Phần này vừa có thể thay thế vừa có thể kế thừa từ trang master --}}
@section('sidebar')
    @parent {{-- Thêm cú pháp nếu vẫn muốn giữ sidebar trang master --}}
    <h3>HOME SIDEBAR</h3>
@endsection
