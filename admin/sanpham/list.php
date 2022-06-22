<div class="container">
    <div class="mg-top">
        <form action="index.php?vlt=listsp" method="post" class="form-search">
            <input type="text" name="keyword" class="input-search" placeholder="Keyword">
            <select name="iddm" id="" class="select-search">
                <option value="0" selected>Tất cả</option>
                <?php
                    foreach($listdm as $dm){
                        extract($dm);
                        echo '<option value="'.$dm['ma_loai'].'">'.$dm['ten_loai'].'</option>';
                    }
                ?>
            </select>
            <input type="submit" name="listgo" value="GO" class="btn-search">
        </form>
        <div class="mg-top">
        <div class="addCategory">
            <h1>Danh sách hàng hóa</h1>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Hình</th>
                    <th>Lượt xem</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($listsp as $sp){
                        extract($sp);
                        $suasp = "index.php?vlt=suasp&ma_hh=".$ma_hh;
                        $xoasp = "index.php?vlt=xoasp&ma_hh=".$ma_hh;
                        $imgpath = "../upload/".$hinh;
                        if(is_file($imgpath)){
                            $img = '<img src="../upload/'.$imgpath.'" alt="" width="60px">';
                        }else{
                            $img = 'no image';
                        }
                        echo '
                            <tr>
                            <td>'.$ma_hh.'</td>
                            <td>'.$ten_hh.'</td>
                            <td>'.$don_gia.'</td>
                            <td>'.$img.'</td>
                            <td>'.$so_luot_xem.'</td>
                            <td><a href="'.$suasp.'"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="'.$xoasp.'"><i class="fa-solid fa-eraser"></i></a></td>
                            </tr> 
                        ';
                    };
                ?>
            </tbody>
        </table>
        <div class="btn-pass">
            <a href="index.php?vlt=addhh"><input type="button" value="Nhập thêm"></a>
        </div>
        <?php
        if(isset($message)&&$message != ""){
            echo $message;
        }
        if(isset($err)&&$err != ""){
            foreach($err as $e){
                echo $e.'<br>'.'<br>';
            }
        }
        ?>
        </div>
    </div>
</div>
