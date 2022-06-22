<?php
    function select_tk(){
        $sql = "SELECT loaihang.ten_loai, count(hanghoa.ma_hh) as idsp, min(hanghoa.don_gia) as minsp, 
        max(hanghoa.don_gia) maxsp, avg(hanghoa.don_gia) as avgsp, loaihang.ma_loai FROM loaihang LEFT JOIN hanghoa
        ON hanghoa.ma_loai=loaihang.ma_loai GROUP BY loaihang.ma_loai ORDER BY ma_loai DESC";
        $listtk = pdo_query($sql);
        return $listtk;
    }
?>