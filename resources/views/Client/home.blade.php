@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content1')
    {{-- demo truoc do --}}
    {{-- <h2>alo picasso</h2>
    <button type="button" class="show">Thông báo</button> --}}
    <h1>Trang chủ</h1>
    @datetime("2022-02-13 15:00:30")

    {{-- @env('local')
    <b>Môi trường dev</b>
    @else
    <b>Không phải môi trường dev</b>
    @endenv --}}
<hr>
    <x-alert type="danger" content="thế cơ à" />
    <x-button/>
@endsection

{{-- Phần này vừa có thể thay thế vừa có thể kế thừa từ trang master --}}
@section('sidebar')
    {{-- @parent Thêm cú pháp nếu vẫn muốn giữ sidebar trang master --}}
    <h3>HOME SIDEBAR</h3>
@endsection
