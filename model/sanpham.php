<?php
    function insert_sp($tensp,$gia,$sale,$hinh,$ngay,$mota,$dacbiet,$view,$loai){
        $sql="INSERT INTO hanghoa(ten_hh,don_gia,giam_gia,hinh,ngay_nhap,mo_ta,dac_biet,so_luot_xem,ma_loai)
        VALUES('$tensp','$gia','$sale','$hinh','$ngay','$mota','$dacbiet','$view','$loai')";
        pdo_execute($sql);
    }
    function select_sp_home(){
        $sql = "SELECT * FROM hanghoa where 1 ORDER BY ma_hh DESC LIMIT 0,12";
        $listsp = pdo_query($sql);
        return $listsp;
    }
    function select_sp_top10(){
        $sql = "SELECT * FROM hanghoa where 1 ORDER BY so_luot_xem DESC LIMIT 0,10";
        $listsp = pdo_query($sql);
        return $listsp;
    }
    function select_sp($keyword,$iddm){
        $sql = "SELECT * FROM hanghoa where 1";
        if($keyword!=""){
            $sql.=" and ten_hh like '%".$keyword."%'";
        }
        if($iddm > 0){
            $sql.=" and ma_loai='".$iddm."'";
        }
        
        $sql.=" ORDER BY ma_hh DESC";
        $listsp = pdo_query($sql);
        return $listsp;
    }
    function delete_sp($id){
        $sql = "DELETE FROM binhluan WHERE ma_hh=".$id;
        pdo_execute($sql);
        $sql = "DELETE FROM hanghoa WHERE ma_hh=".$id;
        pdo_execute($sql);
    }
    function select_sp_one($id){
        $sql = "SELECT * FROM hanghoa WHERE ma_hh=".$id;
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function select_sp_similar($id,$iddm){
        $sql = "SELECT * FROM hanghoa WHERE ma_loai=".$iddm." AND ma_hh<>".$id;
        $listsp = pdo_query($sql);
        return $listsp;
    }
    function update_sp($tensp,$gia,$sale,$hinh,$mota,$dacbiet,$view,$loai,$id){
        if($hinh!=""){
            $sql = "UPDATE hanghoa SET `ten_hh`='".$tensp."',`don_gia`='".$gia."',
            `giam_gia`='".$sale."',`hinh`='".$hinh."',`mo_ta`='".$mota."',
            `dac_biet`='".$dacbiet."',`so_luot_xem`='".$view."',`ma_loai`='".$loai."' WHERE ma_hh=".$id;
        }else{
            $sql = "UPDATE hanghoa SET `ten_hh`='".$tensp."',`don_gia`='".$gia."',
            `giam_gia`='".$sale."',`mo_ta`='".$mota."',
            `dac_biet`='".$dacbiet."',`so_luot_xem`='".$view."',`ma_loai`='".$loai."' WHERE ma_hh=".$id;
        }
        pdo_execute($sql);
    }
    function update_view($view,$id){
        $sql = "UPDATE hanghoa SET `so_luot_xem`='".$view."' WHERE ma_hh=".$id;
        pdo_execute($sql);
    }
?>