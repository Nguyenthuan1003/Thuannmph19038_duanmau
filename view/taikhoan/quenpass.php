<div class="container">
    <div class="mg-top">
        <div class="row">
            <div class="col-md-9">
                <div class="form-pass">
                <div class="addCategory">
                    <h2>Quên mật khẩu</h2>
                </div>
                <div class="content">
                    <form action="index.php?act=quenpass" method="post">
                        <div class="form-password">
                            <label for="">Tên đăng nhập</label>
                            <input type="text" name="name">
                        </div>
                        <div class="form-password">
                            <label for="">Email</label>
                            <input type="email" name="email">
                        </div>
                        <div class="btn-pass">
                            <input type="submit" name="laypass" value="Quên mật khẩu">
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