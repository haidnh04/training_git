{{-- Upload file demo --}}
<form action="{{ route('myFile') }}" method="POST" enctype="multipart/form-data">
    <input type="file" name="myFile1">
    <button type="submit">Tải file</button>
    @csrf
</form>
