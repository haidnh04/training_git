<?php
echo date('Y-m-d H:i:s').'<br/>';
?>
<a href="<?php echo route('admin.showform1');?>">Lập trình</a>
{{-- Gọi hàm name admin.tinTuc bên web.php sang --}}
<a href="<?php echo route('admin.tinTuc', ['slug'=>'tin-tuc-the-gioi.html', 'id'=>1]);?>">Đọc tin tức</a>