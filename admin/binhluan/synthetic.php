<div class="container">
    <div class="mg-top">
        <div class="addCategory">
            <h1>Danh sách bình luận</h1>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Hàng hóa</th>
                    <th>Số bình luận</th>
                    <th>Mới nhất</th>
                    <th>Cũ nhất</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($listbl as $bl){
                        extract($bl);
                        $chitiet = "index.php?vlt=chitiet&id=".$ma_hh;
                        echo '
                            <tr>
                            <td>'.$ten_hh.'</td>
                            <td>'.$sobl.'</td>
                            <td>'.$maxbl.'</td>
                            <td>'.$minbl.'</td>
                            <td><a href="'.$chitiet.'"><input type="button" value="Chi tiết"></a></td>
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