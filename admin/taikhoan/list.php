<div class="container">
    <div class="mg-top">
        <div class="addCategory">
            <h1>Danh sách khách hàng</h1>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id tài khoản</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Ảnh đại diện</th>
                    <th>Vai trò</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                        $user = $_SESSION['user'];
                        $iduser = $user['id'];
                    }
                    foreach($listacc as $acc){
                        extract($acc);
                        $suaacc = "index.php?vlt=suaacc&id=".$id;
                        $xoaacc = "index.php?vlt=xoaacc&id=".$id;
                        $imgpath = "../upload/".$img;
                        if($iduser!=$id){
                            $xoa = '<td><a href="'.$xoaacc.'"><i class="fa-solid fa-eraser"></i></a></td>';
                        }else{
                            $xoa = "";
                        }
                        if(is_file($imgpath)){
                            $imgs = '<img src="../upload/'.$imgpath.'" alt="" width="60px">';
                        }else{
                            $imgs = 'no image';
                        }
                        if($vai_tro == 0){
                            $role = 'Khách hàng';
                        }else{
                            $role = 'Nhân viên';
                        }
                        echo '
                            <tr>
                            <td>'.$id.'</td>
                            <td>'.$user.'</td>
                            <td>'.$passwords.'</td>
                            <td>'.$email.'</td>
                            <td>'.$imgs.'</td>
                            <td>'.$role.'</td>
                            <td><a href="'.$suaacc.'"><i class="fa-solid fa-pen-to-square"></i></a></td>'.$xoa.'</tr> '
                        ;
                    };
                ?>
            </tbody>
        </table>
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
