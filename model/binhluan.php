<?php
    function insert_bl($noidung,$ma_hh,$ma_kh,$ngay_bl){
        $sql="INSERT INTO `binhluan`(`noi_dung`, `ma_hh`, `ma_kh`, `ngay_bl`) 
        VALUES('$noidung','$ma_hh','$ma_kh','$ngay_bl')";
        pdo_execute($sql);
    }
    function select_bl($id){
        $sql = "SELECT * FROM binhluan LEFT JOIN users ON binhluan.ma_kh=users.id";
        if($id > 0){
            $sql.=" WHERE ma_hh='".$id."'";
        }
        $sql.=" ORDER BY ma_bl DESC";
        $listbl = pdo_query($sql);
        return $listbl;
    }
    function delete_bl($id){
        $sql = "DELETE FROM binhluan WHERE ma_bl=".$id;
        pdo_execute($sql);
    }
    function synthetic_bl(){
        $sql = "SELECT hanghoa.ten_hh, count(binhluan.ma_hh) as sobl, min(binhluan.ngay_bl) as minbl, max(binhluan.ngay_bl) as maxbl,hanghoa.ma_hh
        FROM hanghoa RIGHT JOIN binhluan ON hanghoa.ma_hh=binhluan.ma_hh GROUP BY hanghoa.ma_hh ORDER BY hanghoa.ma_hh DESC";
        $sum = pdo_query($sql);
        return $sum;
    }
?>