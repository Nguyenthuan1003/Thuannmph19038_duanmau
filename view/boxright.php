<div class="login">
    <?php if(isset($_SESSION['user'])){
        extract($_SESSION['user']);
        ?>
        <h5>Xin chào <?=$user?></h5>
        <img src="<?=$imgPath.$img?>" alt="" class="avatar">
        <div class="chucnang">
        <a href="index.php?act=quenpass"><p>Quên mật khẩu</p></a>
        <a href="index.php?act=uploaduser&id=<?=$id?>"><p>Cập nhập tài khoản</p></a>
        <a href="index.php?act=doipass&id=<?=$id?>"><p>Đổi mật khẩu</p></a>
        <?php if($vai_tro==1) : ?>
        <a href="./admin/index.php"><p>Đăng nhập admin</p></a>
        <?php endif; ?>
        <a href="index.php?act=thoat"><p>Đăng xuất</p></a>
        </div>
    <?php }else{ ?>
        <h5>Đăng nhập</h5>
        <form action="index.php?act=dangnhap" class="loginUser" method="post">
            <div class="user">
                <input type="email" placeholder="Email đăng nhập" name="user" class="inputs">
            </div>
            <div class="user">
                <input type="password" placeholder="Mật khẩu" name="password" class="inputs">
            </div>
            <input type="submit" value="Đăng nhập" name="dangnhap" class="btn-login">
        </form>
        <div class="chucnang">
            <a href="index.php?act=quenpass"><p>Quên mật khẩu</p></a>
            <a href="index.php?act=dangky"><p>Đăng ký tài khoản mới</p></a>
        </div>
        <?php
            if(isset($message)&&$message != ""){
                echo $message;
            }
        ?>
    <?php } ?>
</div>
<div class="category">
    <h5>Danh mục</h5>
    <table class="table table-hover">
        <?php
            foreach ($dsdm as $dm){
                extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=".$ma_loai;
                echo '<tr>
                    <td><a href="'.$linkdm.'">'.$ten_loai.'</a></td>
                </tr>';
            }
        ?>
    </table>
</div>
<div class="top">
    <h5>Top 10</h5>
    <table class="table table-hover">
        <?php
            foreach($sptop as $top){
                extract($top);
                $linksp="index.php?act=chitiet&idsp=".$ma_hh;
                echo '<tr>
                        <td><img src="'.$imgPath.$hinh.'" alt="" width="20px"></td>
                        <td><a href="'.$linksp.'">'.$ten_hh.'</a></td>
                        </tr>';
            }
        ?>
    </table>
</div>