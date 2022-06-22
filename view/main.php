<main>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./view/image/banner2.jpg" class="d-block w-100" alt="..." height="450px">
              </div>
              <div class="carousel-item">
                <img src="./view/image/banner3.webp" class="d-block w-100" alt="..." height="450px">
              </div>
              <div class="carousel-item">
                <img src="./view/image/banner4.webp" class="d-block w-100" alt="..." height="450px">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div class="container">
            <div class="mg-main">
              <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <?php
                            foreach ($spnew as $sp){
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