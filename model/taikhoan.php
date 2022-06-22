<?php
    function insert_user($name,$pass,$fullname,$email,$img){
        $sql="INSERT INTO `users`(`user`, `passwords`, `fullname`, `email`, `img`)
         VALUES('$name','$pass','$fullname','$email','$img')";
        pdo_execute($sql);
    }
    function select_user_one($name,$password){
        $sql = "SELECT * FROM users WHERE 1";
        if($password != ''){
           $sql.=" AND user='".$name."' AND passwords='".$password."'";
        }else{
            $sql.=" AND user='".$name."'";
        }
        $user = pdo_query_one($sql);
        return $user;
    }
    function select_user_login($name,$password){
        $sql = "SELECT * FROM users WHERE email='".$name."' AND passwords='".$password."'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function update_pass($id,$password){
        $sql = "UPDATE users SET `passwords`='".$password."' WHERE id=".$id;
        pdo_execute($sql);
    }
    function select_pass($name,$email){
        $sql = "SELECT * FROM users WHERE user='".$name."' AND email='".$email."'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function select_email($email){
        $sql = "SELECT * FROM users WHERE email='".$email."'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function update_user($name,$fullname,$email,$img,$id){
        if($img!=""){
            $sql = "UPDATE users SET `user`='".$name."',`fullname`='".$fullname."',
            `email`='".$email."',`img`='".$img."' WHERE id=".$id;
        }else{
            $sql = "UPDATE users SET `user`='".$name."',`fullname`='".$fullname."',
            `email`='".$email."' WHERE id=".$id;
        }
        pdo_execute($sql);
    }
    function select_acc(){
        $sql = "SELECT * FROM `users` WHERE 1";
        $acc = pdo_query($sql);
        return $acc;
    }
    function delete_acc($id){
        $sql = "DELETE FROM binhluan WHERE ma_kh=".$id;
        pdo_execute($sql);
        $sql = "DELETE FROM users WHERE id=".$id;
        pdo_execute($sql);
    }
    function select_acc_one($id){
        $sql = "SELECT * FROM users WHERE id=".$id;
        $acc = pdo_query_one($sql);
        return $acc;
    }
    function update_acc($name,$password,$fullname,$email,$imgName,$kichhoat,$vaitro,$id){
        if($imgName!=""){
            $sql = "UPDATE users SET `user`='".$name."',`passwords`='".$password."',`img`='".$imgName."',
            `fullname`='".$fullname."',`email`='".$email."',`kich_hoat`='".$kichhoat."',`vai_tro`='".$vaitro."' WHERE id=".$id;
        }else{
            $sql = "UPDATE users SET `user`='".$name."',`passwords`='".$password."',
            `fullname`='".$fullname."',`email`='".$email."',`kich_hoat`='".$kichhoat."',`vai_tro`='".$vaitro."' WHERE id=".$id;
        }
        pdo_execute($sql);
    }
    function kich_hoat($email){
        $sql = "UPDATE users SET `kich_hoat`= 1 WHERE email='".$email."'";
        pdo_execute($sql);
    }
    function selectOne($email){
        $sql = "SELECT * FROM users WHERE email='".$email."'";
        $acc = pdo_query_one($sql);
        return $acc;
    }
?>