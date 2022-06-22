<div class="container">
    <div class="mg-top">
        <div class="form-pass">
        <div class="addCategory">
            <h1>Cập nhật tài khoản</h1>
        </div>
        <?php 
            extract($acc);
            $imgpath = "../upload/".$img;
                    if(is_file($imgpath)){
                        $imgs = '../upload/'.$imgpath;
                    }else{
                        $imgs = 'no image';
                    }
        ?>
            <div>
                <div class="content">
                    <form action="index.php?vlt=uploaduser" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=(isset($id)&&($id) > 0) ? $id : "" ?>">
                        <div class="form-password">
                            <label for="">Tên đăng nhập</label>
                            <input type="text" name="name" value="<?=(isset($user)&&($user) > 0) ? $user : "" ?>">
                        </div>
                        <div class="form-password">
                            <label for="">Mật khẩu</label>
                            <input type="password" name="password" value="<?=(isset($passwords)&&($passwords) > 0) ? $passwords : "" ?>">
                        </div>
                        <div class="form-password">
                            <label for="">Nhập lại mật khẩu</label>
                            <input type="password" name="pass" value="<?=(isset($passwords)&&($passwords) > 0) ? $passwords : "" ?>">
                        </div>
                        <div class="form-password">
                            <label for="">Họ và tên</label>
                            <input type="text" name="fullname" value="<?=(isset($fullname)&&($fullname) > 0) ? $fullname : "" ?>">
                        </div>
                        <div class="form-password">
                            <label for="">Email</label>
                            <input type="email" name="email" value="<?=(isset($email)&&($email) > 0) ? $email : "" ?>">
                        </div>
                        <div class="form-password">
                            <label for="">Hình đại diện</label>
                            <img src="<?=$imgs?>" alt="" width="80px" style="margin-right: 10px;">
                            <input type="file" name="img">
                        </div>
                        <div class="form-password">
                            <label for="">Trạng thái</label>
                            <select name="kichhoat" id="">
                                <?php if($kich_hoat == 0) : ?>
                                <option value="0" selected="selected">Chưa kích hoạt</option>
                                <option value="1">Kích hoạt</option>
                                <?php else : ?>
                                    <option value="0">Chưa kích hoạt</option>
                                    <option value="1" selected="selected">Kích hoạt</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-password">
                            <label for="">Vai trò</label>
                            <select name="vaitro" id="">
                                <?php if($vai_tro == 0) : ?>
                                <option value="0" selected="selected">Khách hàng</option>
                                <option value="1">Nhân viên</option>
                                <?php else : ?>
                                    <option value="0">Khách hàng</option>
                                    <option value="1" selected="selected">Nhân viên</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="btn-pass">
                            <input type="submit" name="upload_uers" value="Cập nhật">
                            <input type="reset" value="Nhập lại">
                            <a href="index.php?vlt=dskh"><input type="button" value="Danh sách"></a>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>