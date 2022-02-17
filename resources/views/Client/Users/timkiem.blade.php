@extends('layouts.client')

{{-- @section('title')
    {{ $title }}
@endsection --}}

@section('content1')
    {{-- demo truoc do --}}
    {{-- <h2>alo picasso</h2>
    <button type="button" class="show">Thông báo</button> --}}
    {{-- <h1>Trang chủ</h1>
    @datetime("2022-02-13 15:00:30") --}}

    {{-- @env('local')
    <b>Môi trường dev</b>
    @else
    <b>Không phải môi trường dev</b>
    @endenv --}}

    <a href="{{ route('users.add') }}" class="btn btn-primary">Thêm người dùng</a>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT:</th>
                <th>Tên:</th>
                <th>Email:</th>
                <th width="15%">Thời gian:</th>
                <th width="10%">Sửa</th>
                <th width="10%">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($usersSearch))
                @foreach ($usersSearch as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->create_at }}</td>
                        <td>
                            <a href="{{ route('users.getEdit', ['id' => $item->id]) }}"
                                class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                href="{{ route('users.delete', ['id' => $item->id]) }}"
                                class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">Không có người dùng</td>
                </tr>
            @endif
        </tbody>
    </table>
    <a href="{{ route('users.index') }}" class="btn btn-warning">Quay lại</a>

    {{-- <x-alert type="danger" content="thế cơ à" />
    <x-button/> --}}
@endsection
