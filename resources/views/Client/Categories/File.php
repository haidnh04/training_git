<h1>Thêm file</h1>
<form method="POST" action="<?php echo route('categories.upload'); ?>" enctype="multipart/form-data">
    <div>
        <input type="file" name="photo" id />
    </div>
    <!-- Gọi phần token ra -->
    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/> -->
    <!-- Hoặc dùng cách như sau -->
    <?php echo csrf_field(); ?>
    <button type="submit">Upload</button>
</form>