<?php require "./database/SanPham.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/x-icon" href="./assets/image/logo/logo.jpg">

    <script src="https://kit.fontawesome.com/26a480acf4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    
    <title></title>
</head>
<body>
    <div class="container-fluid mb-3">
        <!--Phần trên -->
        <div class="row" style="background-color: var(--primary-color);"> 
            <div class="container-xl">
                <div class="row">                    
                    <div class="col-12 col-md-4 d-md-flex justify-content-center">
                        <!-- Logo chính giữa -->
                        <div class="d-flex d-md-inline-block justify-content-center">
                            <a href="./"><img src="./assets/image/logo/logo.jpg" alt="logo" style="height: 60px;"></a>
                        </div>
                        
                        <!-- Mobile -->
                        <div class="d-flex d-md-none justify-content-around mb-3">      
                            <!-- Menu Mobile -->
                            <a class="d-flex d-md-none align-items-center text-white text-decoration-none" data-bs-toggle="offcanvas" href="#menumobile" role="button" aria-controls="boloc" style="">
                                <i class="fa-solid fa-bars"></i>
                            </a>  

                            <div class="offcanvas offcanvas-start" tabindex="-1" id="menumobile" aria-labelledby="offcanvasExampleLabel" style="width: 320px;">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                                        <!-- <a href="./login.php" class="text-dark text-decoration-none">Đăng nhập</a> -->
                                        <!-- <i class="fa-solid fa-user me-2"></i>User -->
                                        <?php
                                            if(isset($_COOKIE["dangnhap"]))
                                            {
                                                if( $_COOKIE["dangnhap"] == "us")
                                                {
                                                    echo '<i class="fa-solid fa-user me-2"></i>'.$_COOKIE["tenuser"].'' ;                                                                                         
                                                }
                                                else
                                                {
                                                    echo '<i class="fa-solid fa-user me-2"></i>'.$_COOKIE["tenuser"].'';
                                                }
                                            }
                                            else
                                            {
                                                echo '
                                                <div class="account me-3 ">                                                        
                                                    <a class="text-dark" href="./login.php">Đăng nhập</a>
                                                    <span >/</span>
                                                    <a class="text-dark" href="./register.php">Đăng ký</a>
                                                </div>';                                                                                               
                                            }
                                        ?>
                                    </h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body px-0">
                                    <div class="container-fluid px-0">
                                        <ul class="menu-mobile list-group list-group-flush">
                                            <li class="menu-mobile-item list-group-item 
                                            <?php
                                                $cur = $_SERVER['REQUEST_URI'];
                                                if (strpos($cur,'index.php') !== FALSE || $cur === '/laptoptop/') {
                                                    echo 'active';
                                                }
                                            ?>                                                
                                            "><a href="./" class="text-dark text-decoration-none">Trang chủ</a></li>
                                            <li class="menu-mobile-item list-group-item 
                                            <?php
                                                if (strpos($cur,'gioithieu.php') !== FALSE) {
                                                    echo 'active';
                                                }
                                            ?>"><a href="./gioithieu.php" class="text-dark text-decoration-none">Giới thiệu</a></li>
                                            <li class="menu-mobile-item list-group-item 
                                            <?php
                        
                                                if (strpos($cur,'lienhe.php') !== FALSE) {
                                                    echo 'active';
                                                }
                                            ?>
                                            "><a href="./lienhe.php" class="text-dark text-decoration-none">Liên hệ</a></li>
                                            <li class="menu-mobile-item list-group-item 
                                            <?php
                        
                                                if (strpos($cur,'collections.php') !== FALSE || strpos($cur,'product.php') !== FALSE) {
                                                    echo 'active';
                                                }
                                            ?>
                                            "><a href="./collections.php" class="text-dark text-decoration-none">Sản phẩm</a></li>
                                            <li class="menu-mobile-item list-group-item 
                                            <?php
                        
                                                if (strpos($cur,'baohanh.php') !== FALSE) {
                                                    echo 'active';
                                                }
                                            ?>"><a href="./baohanh.php" class="text-dark text-decoration-none">Bảo hành</a></li>
                                            <li class="menu-mobile-item list-group-item 
                                            <?php
                        
                                                if (strpos($cur,'sale.php') !== FALSE) {
                                                    echo 'active';
                                                }
                                            ?>"><a href="./sale.php" class="text-dark text-decoration-none">Khuyến mãi</a></li>

                                            <?php 
                                                if( $_COOKIE["dangnhap"] == "us")
                                                {
                                                    echo '<li class="menu-mobile-item list-group-item"><a href="./thongtinuser.php" class="text-dark text-decoration-none">Tài khoản của tôi</a></li>
                                                            <li class="menu-mobile-item list-group-item"><a href="./lsdonhang.php" class="text-dark text-decoration-none">Lịch sử đơn hàng</a></li>' ;
                                                }
                                                else
                                                {
                                                    echo '<li class="menu-mobile-item list-group-item"><a href="./admin/" class="text-dark text-decoration-none">Cài đặt</a></li>' ;
                                                }
                                            ?>
                                            <li class="menu-mobile-item list-group-item"><a href="./logout.php" class="text-dark text-decoration-none">Đăng xuất</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Search Mobile -->
                            <div class="search-box position-relative w-75">
                                <form action="./collections.php" method="get" id="mobile_search_box">
                                    <input type="text" class="form-control" name="tenSP" placeholder="Tìm kiếm" value="<?php echo $_GET['tenSP'] ?? "" ?>">
                                    <i class="find-icon fa-solid fa-magnifying-glass position-absolute top-50 translate-middle-y" style="right: 10px;" onclick="document.getElementById('mobile_search_box').submit();"></i>
                                </form>
                            </div>

                            <!-- Cart Mobile -->
                            <div class="d-flex d-md-none align-items-center">
                                <a href="./giohang.php" class="text-white text-decoration-none"><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Search box -->
                    <div class="col-4 d-none d-md-flex align-items-center">                        
                        <div class="search-box position-relative w-100">
                                <form action="./collections.php" method="get" id="search_box">
                                    <input type="text" class="form-control" name="tenSP" placeholder="Tìm kiếm" value="<?php echo $_GET['tenSP'] ?? "" ?>">
                                    <i class="find-icon fa-solid fa-magnifying-glass position-absolute top-50 translate-middle-y" style="right: 10px;" onclick="document.getElementById('search_box').submit();"></i>
                                </form>
                        </div>
                    </div>

                    <!-- Account -->
                    <div class="d-none col-4 header-user d-md-flex align-items-center justify-content-center position-relative">
                        <!-- Chua dang nhap -->
                        <?php 
                        if(isset($_COOKIE["dangnhap"]))
                        {
                            if( $_COOKIE["dangnhap"] == "us")
                            {
                                echo '<div class="account-user me-3 position-relative">
                                <i class="fa-solid fa-user"></i>
                                <span>'.$_COOKIE["tenuser"].'</span>  
                                <i class="fa-solid fa-caret-down"></i>
                                <div class="position-absolute pt-2 d-none header-dropdown shadow" style="width: 200px; z-index:1021; ">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a class="text-dark" href="./thongtinuser.php">Tài khoản của tôi</a></li>
                                        <li class="list-group-item"><a class="text-dark" href="./lsdonhang.php">Lịch sử đơn hàng</a></li>
                                        <li class="list-group-item"><a class="text-dark" href="./logout.php">Đăng Xuất</a></li>
                                    </ul>
                                </div>
                            </div>
                            <a href="./giohang.php">
                                <div class="btn btn-cart">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Giỏ hàng</span>   
                                </div>
                            </a>';
                            }
                            else
                            {
                                echo '<div class="account-user me-3 position-relative">
                                <i class="fa-solid fa-user"></i>
                                <span>'.$_COOKIE["tenuser"].'</span>  
                                <i class="fa-solid fa-caret-down"></i>
                                <div class="position-absolute pt-2 d-none header-dropdown shadow" style="width: 200px; z-index:2; ">
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a class="text-dark" href="./logout.php">Đăng Xuất</a></li>
                                    </ul>
                                </div>
                            </div>
                            <a href="./admin/">
                                <div class="btn btn-cart">
                                    <i class="fa-solid fa-gear"></i>
                                    <span>Cài đặt</span>   
                                </div>
                            </a>';
                            }
                        }
                        else
                        {
                            echo '<div class="account me-3">                                                        
                            <a href="./login.php">Đăng nhập</a>
                            <span class="text-light">/</span>
                            <a href="./register.php">Đăng ký</a>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!--Phần dưới -->
        <div class="row d-none d-md-flex" style="background-color: var(--third-color); height: 60px;"> 
            <ul class="nav justify-content-center ">
                <li class="nav-item d-flex align-items-center me-2">
                    <a href="./"><button type="button" class="btn btn-outline-primary border-0 btn-nav text-light 
                    <?php

                        if (strpos($cur,'index.php') !== FALSE || $cur === '/laptoptop/') {
                            echo 'active';
                        }
                    ?>">Trang chủ</button></a>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <a href="./gioithieu.php"><button type="button" class="btn btn-outline-primary border-0 btn-nav text-light 
                    <?php

                        if (strpos($cur,'gioithieu.php') !== FALSE) {
                            echo 'active';
                        }
                    ?>">Giới thiệu</button></a>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <a href="./lienhe.php"><button type="button" class="btn btn-outline-primary border-0 btn-nav text-light 
                    <?php

                        if (strpos($cur,'lienhe.php') !== FALSE) {
                            echo 'active';
                        }
                    ?>">Liên hệ</button></a>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <a href="./baohanh.php"><button type="button" class="btn btn-outline-primary border-0 btn-nav text-light 
                    <?php

                        if (strpos($cur,'baohanh.php') !== FALSE) {
                            echo 'active';
                        }
                    ?>">Bảo hành</button></a>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <a href="./collections.php"><button type="button" class="btn btn-outline-primary border-0 btn-nav text-light 
                    <?php

                        if (strpos($cur,'collections.php') !== FALSE || strpos($cur,'product.php') !== FALSE) {
                            echo 'active';
                        }
                    ?>">Sản phẩm</button></a>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <a href="./sale.php"><button type="button" class="btn btn-outline-primary border-0 btn-nav text-light 
                    <?php

                        if (strpos($cur,'sale.php') !== FALSE) {
                            echo 'active';
                        }
                    ?>">Khuyến mãi</button></a>
                </li>
            </ul>
        </div>
    </div>