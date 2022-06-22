<div class="container">
<div class="mg-top">
    <div class="row">
    <div class="col-md-9">
        <div class="form-pass">
        <div class="addCategory">
            <h1>Cập nhật tài khoản</h1>
        </div>
        <?php if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
            extract($_SESSION['user']);
        } ?>
        <div class="row">
            <div class="col-md-3">
                <img src="<?=$imgPath.$img?>" alt="" width="90%" class="img-avatar">
            </div>
            <div class="col-md-9">
                <div class="content">
                    <form action="index.php?act=uploadUser" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="form-password">
                            <label for="">Tên đăng nhập</label>
                            <input type="text" name="name" value="<?=$user?>">
                        </div>
                        <div class="form-password">
                            <label for="">Họ và tên</label>
                            <input type="text" name="fullname" value="<?=$fullname?>">
                        </div>
                        <div class="form-password">
                            <label for="">Email</label>
                            <input type="email" name="email" value="<?=$email?>">
                        </div>
                        <div class="form-password img-pass">
                            <label for="">Hình đại diện</label>
                            <input type="file" name="img">
                        </div>
                        <div class="btn-pass">
                            <input type="submit" name="upload_uers" value="Cập nhật">
                            <input type="reset" value="Nhập lại">
                        </div>
                    </form>
                </div>
                </div>
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