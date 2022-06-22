<div class="container">
<div class="mg-top">
    <div class="row">
            <div class="col-md-9">
                <div class="mg-top">
                <div class="row">
                <div class="addCategory">
                    <h4>Chi tiết sản phẩm</h4>
                </div>
                    <?php
                        extract($onesp);
                        echo '<div class="col-md-3">
                                    <img src="'.$imgPath.$hinh.'" alt="" width="100%">
                                </div>
                                <div class="col-md-9">
                                    <p>Mã sản phẩm: '.$ma_hh.'</p>
                                    <p>Tên sản phẩm: '.$ten_hh.'</p>
                                    <p>Đơn giá: '.$don_gia.'</p>
                                    <p>Giảm giá: '.$giam_gia.'</p>
                                </div>';
                    ?>
                </div>
                </div>
                <div class="mg-top">
                <div class="describe">
                    <h4 class="bg-secondary text-white bl">Mô tả</h4>
                    <?php 
                        echo $mo_ta;
                    ?>
                </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $("#comments").load("./view/binhluan/binhluanform.php", {idproduct:<?=$ma_hh?>});
                    });
                </script>
                <div class="mg-top">
                <div class="comment" id="comments">
                   
                </div>
                </div>
                <div class="similar">
                    <h4 class="bg-secondary text-white bl">Sản phẩm tương tự</h4>
                    <?php
                        foreach ($spsimilar as $sp){
                            extract($sp);
                            $linksp="index.php?act=chitiet&idsp=".$ma_hh;
                            echo '<li><a href="'.$linksp.'">'.$ten_hh.'</a></li>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php include_once 'boxright.php'; ?>
            </div>
    </div>
</div>
</div>