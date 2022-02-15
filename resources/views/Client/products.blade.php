@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content1')
    {{-- demo truoc do --}}
    {{-- <h2>alo picasso</h2>
    <button type="button" class="show">Thông báo</button> --}}
    <h1>Sản phẩm</h1>
@endsection

{{-- Phần này vừa có thể thay thế vừa có thể kế thừa từ trang master --}}
@section('sidebar')
    @parent {{-- Thêm cú pháp nếu vẫn muốn giữ sidebar trang master --}}
    <h3>HOME SIDEBAR</h3>
@endsection


{{-- Lệnh put là thêm vào phần dưới trong stack bên master layout vẫn chỗ cũ ở stack --}}
{{-- Với section sẽ thay thế --}}
@push('script')
    <script>
        console.log('Push lần 1');
    </script>
@endpush


{{-- Lệnh prepend là thêm vào phần trên push trong stack bên master layout vẫn chỗ cũ ở stack --}}
@prepend('script')
    <script>
        console.log('prepend lần 1');
    </script>
@endprepend
