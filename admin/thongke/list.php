<div class="container">
    <div class="mg-top">
        <div class="addCategory">
            <h1>Danh sách thống kê</h1>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-secondary text-white">
                    <th>Loại hàng</th>
                    <th>Số lượng</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($listtk as $tk){
                        extract($tk);
                        echo '
                            <tr>
                            <td>'.$ten_loai.'</td>
                            <td>'.$idsp.'</td>
                            <td>'.$maxsp.'</td>
                            <td>'.$minsp.'</td>
                            <td>'.$avgsp.'</td>
                            </tr> 
                        ';
                    };
                ?>
            </tbody>
        </table>
        <div class="btn_list_dm">
            <a href="index.php?vlt=bieudo"><input type="button" value="Xem biểu đồ"></a>
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