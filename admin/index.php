<?php
    session_start();
    include_once '../model/PDO.php';
    include_once '../model/danhmuc.php';
    include_once '../model/sanpham.php';
    include_once '../model/taikhoan.php';
    include_once '../model/binhluan.php';
    include_once '../model/thongke.php';
    require_once './header.php';
    if(isset($_GET['vlt'])){
        $vlt = $_GET['vlt'];
        if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
        switch ($vlt) {
            case 'addlh':
                    // Kiểm tra xem người dùng có click vào nút add hay không?
                    if(isset($_POST['add_dm'])&&($_POST['add_dm'])){
                        $tenloai = $_POST['tenloai'];
                        if (preg_match ('/[a-zA-Z0-9 ]/', $tenloai)) {
                            insert_dm($tenloai);
                            $message = "Thêm thành công!";
                        }else{
                            $message = '<p class="err">Tên loại hàng không được chứa ký tự đặc biệt</p>';
                        }
                    }
                    include_once './danhmuc/add.php' ;
                break;
            case 'listdm':
                    $listdm = select_dm();
                    include_once './danhmuc/list.php';
                break;
            case 'xoadm':
                    if(isset($_GET['ma_loai'])&&$_GET['ma_loai']>0){
                        delete_dm($_GET['ma_loai']);
                    }
                    $listdm = select_dm();
                    include_once './danhmuc/list.php';
                break;
            case 'suadm':
                    if(isset($_GET['ma_loai'])&&$_GET['ma_loai']>0){
                        $dm = select_dm_one($_GET['ma_loai']);
                    }
                    include_once './danhmuc/update.php';
                break;
            case 'updatedm':
                    if(isset($_POST['update_dm'])&&$_POST['update_dm']){
                        $id = $_POST['ma_loai'];
                        $name = $_POST['tenloai'];
                        if (preg_match ('/[a-zA-Z0-9 ]/', $name)) {
                            update_dm($name,$id);
                            $message = "Cập nhật thành công";
                            $listdm = select_dm();
                            include_once './danhmuc/list.php';
                        }else{
                            $dm = select_dm_one($id);
                            $message = '<p class="err">Tên loại hàng không được chứa ký tự đặc biệt</p>';
                            include_once './danhmuc/update.php';
                        }
                        
                    }
                    
                break;
            /* controller sản phẩm */
            
            case 'addhh':
                // Kiểm tra xem người dùng có click vào nút add hay không?
                if(isset($_POST['add_sp'])&&($_POST['add_sp'])){
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $sale = $_POST['sale'];
                    $dacbiet = $_POST['dacbiet'];
                    $view = $_POST['view'];
                    $ngay = date('d/m/Y');
                    $mota = $_POST['mota'];
                    $danhmuc = $_POST['iddm'];
                    $file = $_FILES['hinh'];
                    $filename = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $ext = pathinfo($filename,PATHINFO_EXTENSION);
                    $imgs = ['jpg','jpeg','png'];
                    $err = [
                        'name'=>'',
                        'price' => '',
                        'sale' => '',
                        'category' => '',
                        'file' => ''
                    ];
                    if(!preg_match ('/[a-zA-Z0-9 ]/', $tensp)){
                        $err['name'] = '<p class="err">Tên sản phẩm không được chứa ký tự đặc biệt</p>';
                    }
                    if($giasp < 0){
                        $err['price'] = '<p class="err">Giá sản phẩm phải lớn hơn 0</p>';
                    }
                    if(!empty($sale)){
                        if($sale < 0){
                            $err['sale'] = '<p class="err">Giảm giá phải lớn hơn 0</p>';
                        }
                    }
                    if(!empty($view)){
                        if($view < 0){
                            $err['view'] = '<p class="err">Số lượt xem phải lớn hơn 0</p>';
                        }
                    }
                    if(empty($danhmuc)){
                        $err['category'] = '<p class="err">Hãy chọn danh mục cho sản phẩm</p>';
                    }
                    if($file['size'] <= 0){
                        $err['file'] = '<p class="err">Hãy nhập ảnh sản phẩm</p>';
                    }
                    if($file['size'] > 0){
                        if(!in_array($ext,$imgs)){
                            $err['file'] = '<p class="err">Ảnh không đúng định dạng</p>';
                        }else{
                            $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                        }
                    }
                    if(!array_filter($err)){
                        insert_sp($tensp,$giasp,$sale,$filename,$ngay,$mota,$dacbiet,$view,$danhmuc);
                        $message = "Thêm thành công!";
                    }                   
                }
                $listdm = select_dm();
                include_once './sanpham/add.php' ;
                break;
            case 'listsp':
                    if(isset($_POST['listgo'])&&($_POST['listgo'])){
                        $keyword = $_POST['keyword'];
                        $iddm = $_POST['iddm'];
                    }else{
                        $keyword = "";
                        $iddm = 0;
                    }
                    $listdm = select_dm();
                    $listsp = select_sp($keyword,$iddm);
                    include_once './sanpham/list.php';
                break;
            case 'xoasp':
                    if(isset($_GET['ma_hh'])&&$_GET['ma_hh']>0){
                        delete_sp($_GET['ma_hh']);
                    }
                    $listsp = select_sp("",0);
                    include_once './sanpham/list.php';
                break;
            case 'suasp':
                    if(isset($_GET['ma_hh'])&&$_GET['ma_hh']>0){
                        $sp = select_sp_one($_GET['ma_hh']);
                    }
                    $listdm = select_dm();
                    include_once './sanpham/update.php';
                break;
            case 'updatesp':
                    if(isset($_POST['update_sp'])&&$_POST['update_sp']){
                        $id = $_POST['masp'];
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $sale = $_POST['sale'];
                        $dacbiet = $_POST['dacbiet'];
                        $view = $_POST['view'];
                        $mota = $_POST['mota'];
                        $danhmuc = $_POST['iddm'];
                        $file = $_FILES['hinh'];
                        $filename = $_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $ext = pathinfo($filename,PATHINFO_EXTENSION);
                        $imgs = ['jpg','jpeg','png'];
                        $err = [
                            'name'=>'',
                            'price' => '',
                            'sale' => '',
                            'category' => '',
                            'file' => ''
                        ];
                        if(!preg_match ('/[a-zA-Z0-9 ]/', $tensp)){
                            $err['name'] = '<p class="err">Tên sản phẩm không được chứa ký tự đặc biệt</p>';
                        }
                        if($giasp < 0){
                            $err['price'] = '<p class="err">Giá sản phẩm phải lớn hơn 0</p>';
                        }
                        if(!empty($sale)){
                            if($sale < 0){
                                $err['sale'] = '<p class="err">Giảm giá phải lớn hơn 0</p>';
                            }
                        }
                        if(empty($danhmuc)){
                            $err['category'] = '<p class="err">Hãy chọn danh mục cho sản phẩm</p>';
                        }
                        if(!empty($view)){
                            if($view < 0){
                                $err['view'] = '<p class="err">Số lượt xem phải lớn hơn 0</p>';
                            }
                        }
                        if($file['size'] > 0){
                            if(!in_array($ext,$imgs)){
                                $err['file'] = '<p class="err">Ảnh không đúng định dạng</p>';
                            }else{
                                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                            }
                        }
                        if(!array_filter($err)){
                        update_sp($tensp,$giasp,$sale,$filename,$mota,$dacbiet,$view,$danhmuc,$id);
                        $message = "Cập nhật thành công";
                        $listdm = select_dm();
                        $listsp = select_sp("",0);
                        include_once './sanpham/list.php';
                        }else{
                            $sp = select_sp_one($id);
                            $listdm = select_dm();
                            include_once './sanpham/update.php';
                        }
                    }
                break;
            case 'dskh':
                    $listacc = select_acc();
                    include_once './taikhoan/list.php';
                break;
                case 'xoaacc':
                    if(isset($_GET['id'])&&$_GET['id']>0){
                        delete_acc($_GET['id']);
                    }
                    $listacc = select_acc();
                    include_once './taikhoan/list.php';
                break;
            case 'suaacc':
                    if(isset($_GET['id'])&&$_GET['id']>0){
                        $acc = select_acc_one($_GET['id']);
                    }
                    include_once './taikhoan/update.php';
                break;
            case 'uploaduser':
                    if(isset($_POST['upload_uers'])&&$_POST['upload_uers']){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $password = $_POST['password'];
                        $pass = $_POST['pass'];
                        $kichhoat = $_POST['kichhoat'];
                        $vaitro = $_POST['vaitro'];
                        $fullname = $_POST['fullname'];
                        $email = $_POST['email'];
                        $file = $_FILES['img'];
                        $imgName = $_FILES['img']['name'];
                        $ext = pathinfo($imgName, PATHINFO_EXTENSION);
                        $imgs = ['jpg', 'jpeg', 'png'];
                        $target_dir = "../upload/";
                        $err = [];
                        if(!preg_match ('/[a-zA-Z0-9 ]/', $name)){
                            $err['name'] = '<p class="err">Tên đăng nhập không được chứa ký tự đặc biệt</p>';
                        }
                        if((strlen($password) < 5)||(strlen($password) > 16)){
                            $err['password'] = '<p class="err">Mật khẩu phải có độ dài từ 5-16 ký tự</p>';
                        }
                        if($pass <> $password){
                            $err['pass'] = '<p class="err">Mật khẩu nhập lại không trùng khớp</p>';
                        }
                        if(!preg_match ('/[a-zA-Z0-9 ]/', $fullname)){
                            $err['fullname'] = '<p class="err">Họ và tên không được chứa ký tự đặc biệt</p>';
                        }
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $err['fullname'] = '<p class="err">Email không đúng định dạng</p>';
                        }
                        if($file['size'] > 0){
                            if(!in_array(strtolower($ext),$imgs)){
                                $err['fullname'] = '<p class="err">File không đúng định dạng</p>';
                            }else{
                                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                            }
                        }
                        if(!array_filter($err)){
                            $target_file = $target_dir . basename($_FILES["img"]["name"]);
                            update_acc($name,$password,$fullname,$email,$imgName,$kichhoat,$vaitro,$id);
                            $message = "Cập nhật thành công";
                            $listacc = select_acc();
                            include_once './taikhoan/list.php';
                        }
                        else{
                            $acc = select_acc_one($id);
                            include_once './taikhoan/update.php';
                        }
                    }
                break;
            case 'dsbl':
                    $listbl = synthetic_bl();
                    include_once './binhluan/synthetic.php';
                break; 
            case 'chitiet':
                    if(isset($_GET['id'])&&($_GET['id'] > 0)){
                        $listbl = select_bl($_GET['id']);
                    }
                    include_once './binhluan/list.php';
                break;
            case 'xoabl';
                    if(isset($_GET['id'])&&$_GET['id']>0){
                        delete_bl($_GET['id']);
                    }
                    if(isset($_GET['ma_hh'])&&($_GET['ma_hh'] > 0)){
                        $listbl = select_bl($_GET['ma_hh']);
                    }
                    include_once './binhluan/list.php';
                break;
            case 'tk':
                    $listtk = select_tk();
                    include_once './thongke/list.php';
                break; 
            case 'bieudo':
                    $listtk = select_tk();
                    include_once './thongke/bieudo.php';
                break; 
            default:
                require_once './main.php';
                break;
        }
    }else{
        header('Location: ../index.php');
    }
    }else{
        if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
            require_once './main.php';
        }else{
            header('Location: ../index.php');
        }
    }
    require_once './footer.php';
?>