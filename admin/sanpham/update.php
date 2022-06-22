<?php
    if(is_array($sp)){
        extract($sp);
        $imgpath = "../upload/".$hinh;
                    if(is_file($imgpath)){
                        $img = '../upload/'.$imgpath;
                    }else{
                        $img = 'no image';
                    }
    }
?>
<div class="container">
    <div class="mg-top">
        <div class="form-pass">
            <div class="addCategory">
                <h1>Cập nhật hàng hóa</h1>
            </div>
        <div class="content">
            <form action="index.php?vlt=updatesp" method="post" enctype="multipart/form-data">
                    <div class="form-password">
                        <label for="">Mã sản phẩm</label>
                        <input type="hidden" name="masp" value="<?=(isset($ma_hh)&&$ma_hh>0) ? $ma_hh : "" ?>">
                        <input type="text" value="<?=(isset($ma_hh)&&$ma_hh>0) ? $ma_hh : "" ?>" disabled>
                    </div>
                    <div class="form-password">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="tensp" value="<?=(isset($ten_hh)&&$ten_hh!="") ? $ten_hh : "" ?>">
                    </div>
                    <div class="form-password">
                        <label for="">Giá</label>
                        <input type="text" name="giasp" value="<?=(isset($don_gia)&&$don_gia>0) ? $don_gia : "" ?>">
                    </div>
                    <div class="form-password">
                        <label for="">Sale</label>
                        <input type="number" name="sale" value="<?=(isset($giam_gia)&&$giam_gia>0) ? $giam_gia : "" ?>">
                    </div>
                    <div class="form-password">
                        <label for="">Hình</label>
                        <img src="<?=$img?>" alt="" width="80px">
                        <input type="file" name="hinh">
                    </div>
                    <div class="form-password">
                        <label for="">Đặc biệt</label>
                        <select name="dacbiet" id="">
                            <?php  if($dac_biet==0) : ?>
                                <option value="0" selected="selected">Bình thường</option>
                                <option value="1">Đặc biệt</option>
                            <?php else : ?>
                                <option value="0">Bình thường</option>
                                <option value="1"  selected="selected">Đặc biệt</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-password">
                        <label for="">Số lượt xem</label>
                        <input type="number" name="view" id="">
                    </div>
                    <div class="form-password">
                        <label for="">Mô tả</label>
                        <textarea name="mota" id="" cols="30" rows="10"><?=(isset($mo_ta)&&$mo_ta!="") ? $mo_ta : "" ?></textarea>
                    </div>
                    <div class="form-password">
                        <select name="iddm" id="">
                            <?php
                                foreach($listdm as $dm){
                                    extract($dm);
                                    if($sp['ma_loai']==NULL){
                                        echo '<option value="0" selected></option>';
                                    }else{
                                    if($sp['ma_loai']==$ma_loai){
                                        echo '<option value="'.$ma_loai.'" selected>'.$ten_loai.'</option>';
                                    }else{
                                        echo '<option value="'.$ma_loai.'">'.$ten_loai.'</option>';
                                    }
                                }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="btn-pass">
                        <input type="submit" name="update_sp" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?vlt=listsp"><input type="button" value="Danh sách"></a>
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