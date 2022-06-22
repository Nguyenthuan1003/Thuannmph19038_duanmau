<div class="container">
    <div class="mg-top">
    <div class="addCategory">
        <h1>Danh sách loại hàng</h1>
    </div>
<?php
                if(isset($message)&&$message != ""){
                    echo $message;
                }
            ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listdm as $dm){
                    extract($dm);
                    $suadm = "index.php?vlt=suadm&ma_loai=".$ma_loai;
                    $xoadm = "index.php?vlt=xoadm&ma_loai=".$ma_loai;
                    echo '
                        <tr>
                        <td>'.$ma_loai.'</td>
                        <td>'.$ten_loai.'</td>
                        <td><a href="'.$suadm.'"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="'.$xoadm.'"><i class="fa-solid fa-eraser"></i></a></td>
                        </tr> 
                    ';
                };
            ?>
        </tbody>
    </table>
    <div class="btn-pass">
        <a href="index.php?vlt=addlh"><input type="button" value="Nhập thêm"></a>
    </div>
</div>
</div>
