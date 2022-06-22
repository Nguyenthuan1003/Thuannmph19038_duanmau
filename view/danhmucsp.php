<main>
        <div class="container">
            <div class="mg-top">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="addCategory">
                                <h3><?=$ten_loai?></h3>
                            </div>
                            <?php
                                foreach ($dmsp as $sp){
                                    extract($sp);
                                    $linksp="index.php?act=chitiet&idsp=".$ma_hh;
                                    echo '<div class="col-xl-4">
                                                <div class="product-boder">
                                                    <div class="img">
                                                        <a href="'.$linksp.'"><img src="'.$imgPath.$hinh.'" alt="" width="100px"></a>
                                                    </div>
                                                    <div class="titleProduct">
                                                        <h5><a href="'.$linksp.'">'.$ten_hh.'</a></h5>
                                                        <p class="priceProduct">'.$don_gia.'$</p>
                                                    </div>
                                                </div>
                                            </div>';
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
</main>