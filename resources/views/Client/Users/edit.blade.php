@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content1')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif

    <h1>{{ $title }}</h1>
    <form action="{{ route('users.postEdit') }}" method="POST">
        <div class="mb-3">
            <label for="">Họ và tên: </label>
            <input type="text" class="form-control" name="fullname" placeholder="Nhập họ và tên..."
                value="{{ old('fullname') ?? $userDetail->fullname }}" />
            @error('fullname')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Email: </label>
            <input type="text" class="form-control" name="email" placeholder="Email..."
                value="{{ old('email') ?? $userDetail->email }}" />
            @error('email')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <button stype="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('users.index') }}" class="btn btn-warning">Quay lại</a>
        @csrf
    </form>
@endsection
