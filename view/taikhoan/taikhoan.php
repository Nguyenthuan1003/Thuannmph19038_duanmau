<div class="container">
    <div class="mg-top">
    <div class="row">
    <div class="col-md-9">
        <div class="form-pass">
        <div class="addCategory">
            <h1>Đăng ký tài khoản</h1>
        </div>
        <div class="content">
            <form action="index.php?act=dangky" method="post" enctype="multipart/form-data">
                <div class="form-password">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" name="name">
                </div>
                <div class="form-password">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password">
                </div>
                <div class="form-password">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" name="pass">
                </div>
                <div class="form-password">
                    <label for="">Họ và tên</label>
                    <input type="text" name="fullname">
                </div>
                <div class="form-password">
                    <label for="">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="form-password">
                    <label for="">Hình đại diện</label>
                    <input type="file" name="img">
                </div>
                <div class="btn-pass">
                    <input type="submit" name="add_uers" value="Đăng ký">
                    <input type="reset" value="Nhập lại">
                </div>
            </form>
            </div>
            <?php
                if(isset($message)&&$message != ""){
                    echo $message;
                }
                if(isset($err)&&$err != ""){
                    foreach($err as $e){
                        echo $e;
                    }
                }
            ?>
        </div>
    </div>
    <div class="col-md-3">
        <?php include_once './view/boxright.php'; ?>
    </div>
</div>
</div>
</div>