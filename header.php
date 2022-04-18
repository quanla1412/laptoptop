<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/26a480acf4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    
    <title>Laptoptop</title>
</head>
<body>
    <div class="container-fluid mb-3">
        <div class="row" style="background-color: var(--primary-color); height: 60px;"> 
            <div class="container-xl">
                <div class="row">                    
                    <div class="col-4 d-flex justify-content-center">
                        <a href="./"><img src="./assets/image/logo/logo.jpg" alt="logo" style=" height: 60px;"></a>
                    </div>
                    <div class="col-4 d-flex align-items-center">                        
                        <div class="search-box position-relative w-100">
                            <input type="text" class="form-control" placeholder="Tìm kiếm">
                            <i class="find-icon fa-solid fa-magnifying-glass position-absolute top-50 translate-middle-y" style="right: 10px;"></i>
                        </div>
                    </div>
                    <div class="col-4 header-user d-flex align-items-center justify-content-center position-relative">
                        <!-- Chua dang nhap -->
                        <!-- <div class="account me-3">                                                        
                            <a href="./login.php">Đăng nhập</a>
                            <span class="text-light">/</span>
                            <a href="./register.php">Đăng ký</a>
                        </div>
                        <div class="btn btn-cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span>Giỏ hàng</span>   
                        </div> -->

                        
                        <!-- Dang nhap user -->
                        <div class="account-user me-3">
                            <i class="fa-solid fa-user"></i>
                            <span>User</span>  
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="btn btn-cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span>Giỏ hàng</span>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row " style="background-color: var(--third-color); height: 60px;"> 
            <ul class="nav justify-content-center ">
                <li class="nav-item d-flex align-items-center me-2">
                    <button type="button" class="btn btn-outline-primary border-0 btn-nav text-light active">Trang chủ</button>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <button type="button" class="btn btn-outline-primary border-0 btn-nav text-light">Giới thiệu</button>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <button type="button" class="btn btn-outline-primary border-0 btn-nav text-light">Liên hệ</button>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <button type="button" class="btn btn-outline-primary border-0 btn-nav text-light">Bảo hành</button>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <button type="button" class="btn btn-outline-primary border-0 btn-nav text-light">Sản phẩm</button>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <button type="button" class="btn btn-outline-primary border-0 btn-nav text-light">Khuyến mãi</button>
                </li>
            </ul>
        </div>
    </div>