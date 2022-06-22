<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<div class="container">
<div class="mg-top">
        <div class="form-pass">
    <div class="addCategory">
        <h1>Cập nhật loại hàng</h1>
    </div>
    <div class="content">
        <form action="index.php?vlt=updatedm" method="post">
            <div class="form-password">
                <label for="">Mã loại</label>
                <input type="text" name="maloai" value="<?=(isset($ma_loai)&&($ma_loai!="")) ? $ma_loai : "" ?>" disabled>
            </div>
            <div class="form-password">
                <label for="">Tên loại</label>
                <input type="text" name="tenloai"  value="<?=(isset($ten_loai)&&($ten_loai)) ? $ten_loai : "" ?>">
            </div>
            <div class="btn-pass">
                <input type="hidden" name="ma_loai" value="<?=(isset($ma_loai)&&($ma_loai)) ? $ma_loai : "" ?>">
                <input type="submit" name="update_dm"  value="Cập nhật">
                <input type="submit" value="Nhập lại">
                <a href="index.php?vlt=listdm"><input type="button" value="Danh sách"></a>
            </div>
        </form>
        <?php
                if(isset($message)&&$message != ""){
                    echo $message;
                }
            ?>
    </div>
        </div>
</div>
</div>