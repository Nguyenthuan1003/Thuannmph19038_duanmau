<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../../Code/view/css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
            <div class="logo">
                <a href="index.php"><img src="./view/image/1.png" alt="" width="200px" height="140px"></a>
            </div>
            <nav class="navbar navbar-expand-lg">
              <div class="container">
                  <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="menu-color" href="./index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                          <a class="menu-color" href="./index.php?act=gioithieu">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                          <a class="menu-color" href="./index.php?act=lienhe">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                          <a class="menu-color" href="./index.php?act=gopy">Góp ý</a>
                        </li>
                        <li class="nav-item">
                          <a class="menu-color" href="./index.php?act=hoidap">Hỏi đáp</a>
                        </li>
                      </ul>
                      <form class="d-flex" role="search" action="index.php?act=search" method="post">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="inputSearch">
                        <button class="btn btn-custom" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                      </form>
                    </div>
                  </div>
                </div>
              </nav>
    </header>