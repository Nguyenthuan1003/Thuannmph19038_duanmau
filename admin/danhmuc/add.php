<div class="container">
    <div class="mg-top">
        <div class="form-pass">
    <div class="addCategory">
        <h1>Thêm mới loại hàng</h1>
    </div>
    <div class="content">
        <form action="index.php?vlt=addlh" method="post">
            <div class="form-password">
                <label for="">Mã loại</label>
                <input type="text" name="maloai" value="auto number" disabled>
            </div>
            <div class="form-password">
                <label for="">Tên loại</label>
                <input type="text" name="tenloai">
            </div>
            <div class="btn-pass">
                <input type="submit" name="add_dm" value="Thêm mới">
                <input type="submit" value="Nhập lại">
                <a href="index.php?vlt=listdm"><input type="button" value="Danh sách"></a>
            </div>
            <?php
                if(isset($message)&&$message != ""){
                    echo $message;
                }
            ?>
        </form>
    </div>
    </div>
    </div>
</div>