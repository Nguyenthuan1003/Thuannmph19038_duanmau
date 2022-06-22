<div class="container">
    <div class="mg-top">
        <div class="addCategory">
            <h1>Chi tiết bình luận</h1>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nội dung</th>
                    <th>Người bình luận</th>
                    <th>Id sản phẩm</th>
                    <th>Ngày bình luận</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($listbl as $bl){
                        extract($bl);
                        $xoa = "index.php?vlt=xoabl&id=".$ma_bl."&ma_hh=".$ma_hh;
                        echo '
                            <tr>
                            <td>'.$ma_bl.'</td>
                            <td>'.$noi_dung.'</td>
                            <td>'.$user.'</td>
                            <td>'.$ma_hh.'</td>
                            <td>'.$ngay_bl.'</td>
                            <td><a href="'.$xoa.'"><input type="button" value="Xóa"></a></td>
                            </tr> 
                        ';
                    };
                ?>
            </tbody>
        </table>
        <?php
            if(isset($message)&&$message != ""){
                echo $message;
            }
        ?>
    </div>
</div>