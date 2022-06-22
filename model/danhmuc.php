<?php
    function insert_dm($tenloai){
        $sql="INSERT INTO loaihang(ten_loai) VALUES('$tenloai')";
        pdo_execute($sql);
    }
    function select_dm(){
        $sql = "SELECT * FROM loaihang ORDER BY ma_loai DESC";
        $listdm = pdo_query($sql);
        return $listdm;
    }
    function delete_dm($id){
        $sql = "UPDATE hanghoa SET ma_loai = NULL WHERE ma_loai=".$id;
        pdo_execute($sql);
        $sql = "DELETE FROM loaihang WHERE ma_loai = ".$id;
        pdo_execute($sql);
    }
    function select_dm_one($id){
        $sql = "SELECT * FROM loaihang WHERE ma_loai=".$id;
        $dm = pdo_query_one($sql);
        return $dm;
    }
    function update_dm($name,$id){
        $sql = "UPDATE loaihang SET ten_loai='".$name."'WHERE ma_loai=".$id;
        pdo_execute($sql);
    }
?>