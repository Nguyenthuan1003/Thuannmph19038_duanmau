<?php
    session_start();
    include_once './model/PDO.php';
    include_once './model/sendmail.php';
    include_once './model/sanpham.php';
    include_once './model/danhmuc.php';
    include_once './model/taikhoan.php';
    include_once './global.php';
    include_once './view/header.php';
    $spnew = select_sp_home();
    $dsdm = select_dm();
    $sptop = select_sp_top10();
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act = $_GET['act'];
        switch ($act) {
            case 'gioithieu':
                    include_once './view/gioithieu.php';
                break;
            case 'lienhe':
                    include_once './view/lienhe.php';
                break;
            case 'gopy':
                    include_once './view/gopy.php';
                break;
            case 'hoidap':
                    include_once './view/hoidap.php';
                break;
            case 'dangky':
                    if(isset($_POST['add_uers'])&&($_POST['add_uers'])){
                        $name = $_POST['name'];
                        $password = $_POST['password'];
                        $pass = $_POST['pass'];
                        $fullName = $_POST['fullname'];
                        $email = $_POST['email'];
                        $img = $_FILES['img'];
                        $imgName = $img['name'];
                        $dir = './upload/';
                        $ext = pathinfo($imgName, PATHINFO_EXTENSION);
                        $imgs = ['jpg', 'jpeg', 'png'];
                        $target_file = $dir . basename($_FILES["img"]["name"]);
                        $users = select_email($email);
                        if(isset($users)&&is_array($users)){
                            $emailUser = $users['email'];
                        }else{
                            $emailUser = '';
                        }
                        $err = [];
                        if(!preg_match ('/[a-zA-Z0-9 ]/', $name)){
                            $err['name'] = '<p class="error">T??n ????ng nh???p kh??ng ???????c ch???a k?? t??? ?????c bi???t</p>';
                        }
                        if((strlen($password) < 5)||(strlen($password) > 16)){
                            $err['password'] = '<p class="error">M???t kh???u ph???i c?? ????? d??i t??? 5-16 k?? t???</p>';
                        }
                        if($pass <> $password){
                            $err['pass'] = '<p class="error">M???t kh???u nh???p l???i kh??ng tr??ng kh???p</p>';
                        }
                        if(!preg_match ('/[a-zA-Z0-9 ]/', $fullName)){
                            $err['fullname'] = '<p class="error">H??? v?? t??n kh??ng ???????c ch???a k?? t??? ?????c bi???t</p>';
                        }
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $err['email'] = '<p class="error">Email kh??ng ????ng ?????nh d???ng</p>';
                        }
                        if($img['size'] <= 0){
                            $err['file'] = '<p class="error">B???n ch??a t???i ???nh l??n</p>';
                        }
                        if($img['size'] > 0){
                            if(!in_array(strtolower($ext),$imgs)){
                                $err['file'] = '<p class="error">File kh??ng ????ng ?????nh d???ng</p>';
                            }else{
                                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                            }
                        }
                        if($email==$emailUser){
                            $err['email'] = '<p class="error">Email ???? ???????c s??? d???ng</p>';
                        }
                        if(!array_filter($err)){
                            insert_user($name,$password,$fullName,$email,$imgName);
                            $message = '????ng k?? th??nh c??ng';
                            sendmail('Xin ch??o'.$name,$email,'B???m v??o ????y ????? k??ch ho???t t??i kho???n c???a b???n: http://localhost/code/index.php?act=kichhoat&&email='.$email,'K??ch ho???t t??i kho???n','K??ch ho???t t??i kho???n');
                        }
                    }
                    include_once './view/taikhoan/taikhoan.php';
                break;
            case 'dangnhap':
                    if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                        $email = $_POST['user'];
                        $password = $_POST['password'];                        
                        $user =  select_user_login($email,$password);
                        if(is_array($user)){
                            $_SESSION['user'] = $user;
                            header('Location:index.php');
                            $message = 'B???n ???? ????ng nh???p th??nh c??ng';
                            die;
                        }else{
                            $message= '<p class="error">????ng nh???p th???t b???i</p>';
                            // header('Location:index.php');
                            // die;
                            include_once './view/main.php';
                        }
                    }
                break;
            case 'uploaduser':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $acc = select_acc_one($_GET['id']);
                }
                include_once './view/taikhoan/upload.php';
                break;
            case 'uploadUser':
                    if(isset($_POST['upload_uers'])&&($_POST['upload_uers'])){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $fullName = $_POST['fullname'];
                        $email = $_POST['email'];
                        $img = $_FILES['img'];
                        $imgName = $img['name'];
                        $dir = './upload/';
                        $ext = pathinfo($imgName, PATHINFO_EXTENSION);
                        $imgs = ['jpg', 'jpeg', 'png'];
                        $target_file = $dir . basename($_FILES["img"]["name"]);
                        $err = [];
                        if(!preg_match ('/[a-zA-Z0-9 ]/', $name)){
                            $err['name'] = '<p class="error">T??n ????ng nh???p kh??ng ???????c ch???a k?? t??? ?????c bi???t</p>';
                        }
                        if(!preg_match ('/[a-zA-Z0-9 ]/', $fullName)){
                            $err['fullname'] = '<p class="error">H??? v?? t??n kh??ng ???????c ch???a k?? t??? ?????c bi???t</p>';
                        }
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $err['email'] = '<p class="error">Email kh??ng ????ng ?????nh d???ng</p>';
                        }
                        if($img['size'] > 0){
                            if(!in_array(strtolower($ext),$imgs)){
                                $err['file'] = '<p class="error">File kh??ng ????ng ?????nh d???ng</p>';
                            }else{
                                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                            }
                        }
                        if(!array_filter($err)){
                            update_user($name,$fullName,$email,$imgName,$id);
                            $_SESSION['user'] = select_user_one($name,'');
                            $message = 'C???p nh???t th??nh c??ng';
                            include_once './view/taikhoan/upload.php';
                        }else{
                            $acc = select_acc_one($id);
                            include_once './view/taikhoan/upload.php';
                        }
                    }
                break;
            case 'doipass':
                    if(isset($_GET['id'])&&($_GET['id'] >=0 )){
                        $user = select_acc_one($_GET['id']);
                    }
                    include_once './view/taikhoan/doipass.php';
                break;
            case 'doipassUser':
                    if(isset($_POST['doipassword'])&&($_POST['doipassword'])){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $oldpass = $_POST['oldPassword'];
                        $password = $_POST['password'];
                        $pass = $_POST['pass'];
                        $account = select_user_one($name,$oldpass);
                        $err = [];
                        if(!preg_match ('/[a-zA-Z0-9 ]/', $name)){
                            $err['name'] = '<p class="error">T??n ????ng nh???p kh??ng ???????c ch???a k?? t??? ?????c bi???t</p>';
                        }
                        if((strlen($password) < 5)||(strlen($password) > 16)){
                            $err['password'] = '<p class="error">M???t kh???u ph???i c?? ????? d??i t??? 5-16 k?? t???</p>';
                        }
                        if($pass <> $password){
                            $err['pass'] = '<p class="error">M???t kh???u nh???p l???i kh??ng tr??ng kh???p</p>';
                        }
                        if(!isset($account)||(!is_array($account))){
                            $err['pass'] = '<p class="error">T??n ????ng nh???p ho???c m???t kh???u c?? kh??ng ????ng</p>';
                        }
                        if(!array_filter($err)){
                            update_pass($id,$password);
                            $message='?????i m???t kh???u th??nh c??ng';
                            include_once './view/taikhoan/doipass.php';
                        }else{
                            $user = select_acc_one($id);
                            $message='<p class="error">?????i m???t kh???u th???t b???i</p>';
                            include_once './view/taikhoan/doipass.php';
                        }
                    }
                break;
            case 'quenpass':
                    if(isset($_POST['laypass'])&&($_POST['laypass'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $users = select_pass($name,$email);
                        if(is_array($users)){
                            extract($users);
                            sendmail($user,$email,'M???t kh???u c???a b???n l??:'.$passwords,'L???y l???i m???t kh???u','L???y l???i m???t kh???u');
                            header('Location:index.php');
                            $message = 'L???y m???t kh???u th??nh c??ng';
                            die;
                        }else{
                            $message = '<p class="error">Email ho???c t??n ng?????i d??ng ???? nh???p kh??ng ????ng</p>';
                            include_once './view/taikhoan/quenpass.php';
                        }
                    }
                    include_once './view/taikhoan/quenpass.php';
                break;
            case 'kichhoat':
                $email = $_GET['email'];
                $user = selectOne($email);
                include_once './view/taikhoan/kichhoat.php';
                break;
            case 'kichhoat_user':
                if(isset($_POST['kichhoat_acc'])&&($_POST['kichhoat_acc'])){
                    $email = $_POST['email'];
                    kich_hoat($email);
                    $message = 'K??ch ho???t th??nh c??ng';
                    header('Location:index.php');
                }else{
                    include_once './view/taikhoan/kichhoat.php';
                }
                break;
            case 'thoat':
                    session_unset();
                    header('Location:index.php');
                break;
            case 'sanpham':
                    if(isset($_GET['iddm'])&&($_GET['iddm'] > 0)){
                        $iddm = $_GET['iddm'];
                        $dm =  select_dm_one($iddm);
                        extract($dm);
                        $dmsp = select_sp("",$iddm);
                        include_once './view/danhmucsp.php';
                    }else{
                        include_once './view/main.php';
                    }
                        
                    
                break;
            case 'search':
                    if(isset($_POST['inputSearch'])&&($_POST['inputSearch']!='')){
                        $keyword = $_POST['inputSearch'];
                    }else{
                        $keyword = '';
                    }
                        $dmsp = select_sp($keyword,0);
                        include_once './view/search.php';
                    
                break;
            case 'chitiet';
                    if(isset($_GET['idsp'])&&($_GET['idsp'] > 0)){
                        $onesp = select_sp_one($_GET['idsp']);
                        extract($onesp);
                        $spsimilar = select_sp_similar($_GET['idsp'],$ma_loai);
                        extract($spsimilar);
                        $so_luot_xem+=1;
                        update_view($so_luot_xem,$_GET['idsp']);
                        include_once './view/chitiet.php';
                    }else{
                        include_once './view/main.php';
                    }
                break;
            default:
                    include_once './view/main.php';
                break;
        }
    }else{
        include_once './view/main.php';
    }
    
    include_once './view/footer.php';
?>