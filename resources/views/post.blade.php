<form method="POST" action="/post1">
    <div>
        <input type='text' name="username" placeholder="Nhập username....">
        <input type="hidden" name="_method" value="POST" />
        <!-- <input type="hidden" name="_method" value="PUT" /> -->
        <!-- <input type="hidden" name="_method" value="DELETE" /> -->
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
        <button type="submit">Submit</button>
    </div>
</form>