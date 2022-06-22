<?php
    session_start();
    include_once '../../model/PDO.php';
    include_once '../../model/binhluan.php';
    $idPro = $_REQUEST['idproduct'];
    $listbl = select_bl($idPro);
?>
<div class="category-bl">
    <div class="bg-secondary text-white bl">Bình luận</div>
    <table class="table table-striped">
        <?php
            foreach ($listbl as $bl){
                extract($bl);
                echo '<tr>
                        <td>'.$noi_dung.'</td>
                        <td>'.$user.'</td>
                        <td>'.$ngay_bl.'</td>
                    </tr>';
            }
        ?>
    </table>
    <?php if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))&&($_SESSION['user']['kich_hoat']==1)) { ?>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="form-bl">
                <input type="hidden" name="id" value="<?=$idPro?>">
                <input type="text" name="msg" class="form-input-bl">
                <input type="submit" value="Gửi" name="addbl" class="btn-bl">
        </form>
    <?php }else{ ?>
        <p>Đăng nhập tài khoản đã kích hoạt để bình luận</p>
    <?php } ?>
    <?php
        if(isset($_POST['addbl'])&&($_POST['addbl'])){
            $noidung = $_POST['msg'];
            $ma_hh = $_POST['id'];
            $ma_kh = $_SESSION['user']['id'];
            $ngay_bl = date('h:i:sa d/m/Y');
            insert_bl($noidung,$ma_hh,$ma_kh,$ngay_bl);
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    ?>
</div>
