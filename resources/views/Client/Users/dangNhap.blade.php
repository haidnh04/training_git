<form action="{{ route('users.login') }}" method="post">
    <input type="text" name="username" placeholder="tên đăng nhập...">
    <input type="password" name="password" placeholder="mật khẩu đăng nhập...">
    <button type="submit0">Đăng nhập</button>
    @csrf
</form>
