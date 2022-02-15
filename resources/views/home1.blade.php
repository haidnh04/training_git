<h1>Học viện UNI</h1>
<hr />


{{-- Nên dùng khi thay đổi nội dung thông qua url và cookie, để dụng thực thể html để bảo mật --}}
<h2>{{ $welcome }}</h2>
<hr />


{{-- Dùng toán tử 3 ngôi để check xem có keyword trên url không --}}
<h2>{{ !empty(request()->keyword) ? request()->keyword : '' }}</h2>
<hr />


{{-- Nên dùng khi bắt buộc phải biên dịch html. Trình bày giao diện cho đẹp thì nên dùng cách này --}}
<h2>{!! $content !!}</h2>
<hr />


{{-- Vòng lặp for trong laravel --}}
@php
echo '<h2>Vòng lặp For</h2><br/>';
@endphp
@for ($i = 0; $i < 10; $i++)
    @if ($i == 3)
        @continue
    @endif
    <p>Phần tử thứ {{ $i }}</p>
    @if ($i == 8)
    @break
@endif
@endfor
<hr />


{{-- Vòng lặp while trong laravel --}}
@php
echo '<h2>Vòng lặp While</h2><br/>';
@endphp
@while ($index <= 5)
    <p>Đây là while: {{ $index }}</p>
    @php
        $index++;
    @endphp
@endwhile
<hr />


{{-- Vòng lặp forecach trong laravel --}}
@php
echo '<h2>Vòng lặp Foreach</h2><br/>';
@endphp
@foreach ($mang as $key => $item)
    {{ $item }} - {{ $key }}
@endforeach
<hr />


{{-- Vòng lặp For-Else trong laravel --}}
@php
echo '<h2>Vòng lặp For-Else</h2><br/>';
@endphp
@forelse ($mang as $item)
    <p>Có phần tử: {{ $item }}</p>
@empty
    <p>không có phần tử nào</p>
@endforelse
<hr />


@php
echo '<h2>câu lệnh rẽ nhánh If - elseIf - else</h2><br/>';
@endphp

@if ($number < 0)
    <p>{{ $number }} là số âm</p>
@elseif ($number == 0)
    <p>{{ $number }} là số 0</p>
@elseif ($number > 0 && $number <= 5)
    <p>{{ $number }} là số nhỏ</p>
@elseif ($number > 5 && $number <= 15)
    <p>{{ $number }} là số lớn</p>
@else
    <p>Bạn nhập không đúng</p>
@endif


{{-- Thêm 1 cách viết php trong template enzyn --}}
@php
echo '123';
@endphp

{{-- Có các câu lệnh java script nhu vuejs node js
Thì có câu lệnh đặc biệt là @{{ .. }} để ngăn blade biên dịch
Mặc dù vẫn chạy ở bên dưới --}}
<script>
    @{{ abc }}
</script>

{{-- Trường hợp muốn không biên dịch nhiều dòng thì dùng cú pháp
@verbatim
{{ variable }}
@endverbatim --}}
@verbatim
    <script>
        @{{ abc }}
        @{{ aadwdaw }}
    </script>
@endverbatim

@php
    $messeage = 'thành côn à'
@endphp
{{-- Câu lệnh iclude dùng để gheps part nhỏ vào trình bày hoàn thiện 1 giao dien --}}
@include('Parts.notice')