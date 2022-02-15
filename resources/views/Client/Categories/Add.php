<h1>Thêm chuyên mục</h1>
<form method="POST" action="<?php echo route('categories.add'); ?>">
    <div>
        <input type="text" name="category_name" placeholder="Tên chuyên mục" value="<?php old('category_name')?>"/>
    </div>
    <!-- Gọi phần token ra -->
    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/> -->
    <!-- Hoặc dùng cách như sau -->
    <?php echo csrf_field(); ?>
    <button type="submit">Thêm chuyên mục</button>
</form>