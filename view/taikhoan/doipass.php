<div class="container">
    <div class="mg-top">
        <div class="row">
            <div class="col-md-9">
                <div class="form-pass">
                    <div class="addCategory">
                        <h2>Đổi mật khẩu</h2>
                    </div>
                    <?php if(isset($user)&&(is_array($user))){extract($user);} ?>
                    <form action="index.php?act=doipassUser" method="POST">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="form-password">
                            <label for="">Tên đăng nhập</label>
                            <input type="text" name="name">
                        </div>
                        <div class="form-password">
                            <label for="">Mật khẩu cũ</label>
                            <input type="password" name="oldPassword">
                        </div>
                        <div class="form-password">
                            <label for="">Mật khẩu mới</label>
                            <input type="password" name="password">
                        </div>
                        <div class="form-password">
                            <label for="">Nhập lại mật khẩu mới</label>
                            <input type="password" name="pass">
                        </div>
                        <div class="btn-pass">
                            <input type="submit"  name="doipassword" value="Đổi mật khẩu">
                        </div>
                    </form>
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