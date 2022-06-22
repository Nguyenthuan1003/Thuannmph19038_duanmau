<div class="container">
<div class="mg-top">
    <div class="form-pass">
<div class="addCategory">
    <h2>Kích hoạt tài khoản</h2>
</div>
<?php if(isset($user)&&(is_array($user))){extract($user);} ?>
<form action="index.php?act=kichhoat_user" method="POST" class="btn-pass" style="text-align: center;">
    <input type="hidden" name="email" value="<?=$email?>">
    <input type="submit" value="Kích hoạt ngay" name="kichhoat_acc">
</form>
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
</div>