<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="./assets/image/logo/logo.jpg">
    
    <script src="https://kit.fontawesome.com/26a480acf4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    
    <title>Laptoptop</title>
</head>
<body>
    
    <!-- Responsive Mobile Vertical-->
    <div class="container-fluid d-flex justify-content-center align-items-center d-md-none fixed-top fixed-bottom w-100" style="background-color: #333; z-index:1031;">
        <p class="h2 text-white">Vui lòng xoay điện thoại từ dọc sang ngang</p>
    </div>
    <div class="container-fluid p-0">
        <div class="row w-100 mx-0">
            <div class="col-2 d-flex flex-column px-0 fixed-top" style="height: 100vh; background-color: var(--primary-color)">
                <img src="./../assets/image/logo/logo.jpg" alt="Logo" class="w-100 mb-5">
                <div class="menu-admin flex-grow-1 ">
                    <?php
                        $severname = "localhost";
                        $username = "laptoptop";
                        $password = "laptoptop";
                        $dbname = "laptoptop";
                        $tenuser=$_COOKIE['tenuser'];
                        $conn = new mysqli($severname, $username, $password, $dbname);
                        if($conn->connect_error) {
                            die('Connection failed: '. $conn->connect_error);
                        }
                        $sql="SELECT * FROM quantri WHERE TenDangNhap= '$tenuser'";
                        $result = $conn->query($sql);
                        while($row= mysqli_fetch_assoc($result)){
                            $capbac=$row['CapBac'];
                        }
                        if($capbac== "giamdoc"){
                        
                            echo '<a href="./"><div class="btn-admenu px-3 py-1 text-white ';
                                $cur = $_SERVER['REQUEST_URI'];
                                if (strpos($cur,'index.php') !== FALSE || $cur === '/laptoptop/admin/' || strpos($cur,'/laptoptop/admin/?') !== FALSE) {
                                    echo 'active';
                                }
                            echo '">Sản phẩm</div></a>
                            <a href="./themsanpham.php"><div class="btn-admenu px-3 py-1 text-white ';
                                if (strpos($cur,'themsanpham.php') !== FALSE) {
                                    echo 'active';
                                }
                            echo '">Thêm sản phẩm</div></a>
                            <a href="./quanlydonhang.php"><div class="btn-admenu px-3 py-1 text-white ';
                                if (strpos($cur,'quanlydonhang.php') !== FALSE) {
                                    echo 'active';
                                }
                                                
                            echo '">Quản lý đơn hàng</div></a>
                            <a href="./lichsudonhang.php"><div class="btn-admenu px-3 py-1 text-white ';
                                if (strpos($cur,'lichsudonhang.php') !== FALSE) {
                                    echo 'active';
                                }
                            
                            echo '">Lịch sử đơn hàng</div></a>
                            <a href="./doanhthu.php"><div class="btn-admenu px-3 py-1 text-white ';
                            
                                if (strpos($cur,'doanhthu.php') !== FALSE) {
                                    echo 'active';
                                }
                            echo '">Doanh thu</div></a>
                            <a href="./themadmin.php"><div class="btn-admenu px-3 py-1 text-white ';
                                if (strpos($cur,'themadmin.php') !== FALSE) {
                                    echo 'active';
                                }
                            echo '">Thêm Admin</div></a>
                            <a href="./taikhoanuser.php?search="><div class="btn-admenu px-3 py-1 text-white ';                 
                                if (strpos($cur,'taikhoanuser.php') !== FALSE) {
                                    echo 'active';
                                }
                            echo '">Tài khoản người dùng</div></a>
                            <a href="./taikhoanadmin.php?search="><div class="btn-admenu px-3 py-1 text-white ';
                                if (strpos($cur,'taikhoanadmin.php') !== FALSE) {
                                    echo 'active';
                                }
                                                
                            echo '">Tài khoản admin</div></a>';
                                }
                        else
                            if($capbac== "quanli"){
                                echo '<a href="./"><div class="btn-admenu px-3 py-1 text-white ';
                                if (strpos($cur,'index.php') !== FALSE || $cur === '/laptoptop/admin/' || strpos($cur,'/laptoptop/admin/?') !== FALSE) {
                                    echo 'active';
                                }
                            echo '">Sản phẩm</div></a>
                            <a href="./themsanpham.php"><div class="btn-admenu px-3 py-1 text-white ';
                                if (strpos($cur,'themsanpham.php') !== FALSE) {
                                    echo 'active';
                                }
                            echo '">Thêm sản phẩm</div></a>
                            <a href="./quanlydonhang.php"><div class="btn-admenu px-3 py-1 text-white ';
                                if (strpos($cur,'quanlydonhang.php') !== FALSE) {
                                    echo 'active';
                                }                
                            echo '">Quản lý đơn hàng</div></a>
                            <a href="./lichsudonhang.php"><div class="btn-admenu px-3 py-1 text-white ';
                                if (strpos($cur,'lichsudonhang.php') !== FALSE) {
                                    echo 'active';
                                }
                            echo '">Lịch sử đơn hàng</div></a>
                            <a href="./doanhthu.php"><div class="btn-admenu px-3 py-1 text-white ';
                            
                                if (strpos($cur,'doanhthu.php') !== FALSE) {
                                    echo 'active';
                                }
                            echo '">Doanh thu</div></a>';
                            }
                            else
                                {
                                    echo '<a href="./"><div class="btn-admenu px-3 py-1 text-white ';

                                    if (strpos($cur,'index.php') !== FALSE || $cur === '/laptoptop/admin/' || strpos($cur,'/laptoptop/admin/?') !== FALSE) {
                                        echo 'active';
                                    }
                                echo '">Sản phẩm</div></a>
                                <a href="./quanlydonhang.php"><div class="btn-admenu px-3 py-1 text-white ';

                                    if (strpos($cur,'quanlydonhang.php') !== FALSE) {
                                        echo 'active';
                                    }              
                                echo '">Quản lý đơn hàng</div></a>
                                <a href="./lichsudonhang.php"><div class="btn-admenu px-3 py-1 text-white ';

                                    if (strpos($cur,'lichsudonhang.php') !== FALSE) {
                                        echo 'active';
                                    }
                                
                                echo '">Lịch sử đơn hàng</div></a>';
                                }
                    ?>
                </div>
                <a href="./../" style="text-decoration: none;"><div class="btn-admenu px-3 py-1 text-white d-flex " style="margin-bottom: 100px">Trang chủ<i class="fa-solid fa-rotate-left ms-auto align-self-center" style="font-size: 16px"></i></div></a>
            </div>
            <div class="col-10 offset-2">            
                <div class="row px-4 shadow mb-4" style="height: 100px;">
                    <div class="d-flex align-items-center px-0">
                        <h2 class="me-auto" style="color:var(--third-color)">
                        <?php
                            $cur = $_SERVER['REQUEST_URI'];
                            if (strpos($cur,'doanhthu.php') !== FALSE) {
                                echo 'Doanh Thu';
                            } elseif (strpos($cur,'lichsudonhang.php') !== FALSE) {
                                echo 'Lịch sử đơn hàng';
                            } elseif (strpos($cur,'quanlydonhang.php') !== FALSE) {
                                echo 'Quản lý đơn hàng';
                            } elseif (strpos($cur,'taikhoanadmin.php') !== FALSE) {
                                echo 'Tài khoản admin';
                            } elseif (strpos($cur,'taikhoanuser.php') !== FALSE) {
                                echo 'Tài khoản user';
                            } elseif (strpos($cur,'themsanpham.php') !== FALSE) {
                                echo 'Thêm sản phẩm';
                            } elseif (strpos($cur,'suasanpham.php') !== FALSE) {
                                echo 'Sửa sản phẩm';
                            } elseif (strpos($cur,'nhaphang.php') !== FALSE) {
                                echo 'Nhập hàng';
                            } elseif (strpos($cur,'suauser.php') !== FALSE) {
                                echo 'Chỉnh sửa Tài Khoản User';
                            } elseif (strpos($cur,'suaadmin.php') !== FALSE) {
                                echo 'Chỉnh sửa Tài Khoản Admin';
                            } elseif (strpos($cur,'themadmin.php') !== FALSE) {
                                echo 'Thêm Admin';
                            } else {
                                echo 'Sản phẩm';
                            }
                        ?>
                        </h2>
                        <div class="me-4">
                            <i class="fa-solid fa-user"></i>
                            <span><?php echo $_COOKIE['tenuser'] ?? "Admin" ?></span>
                        </div>
                        <div class="header-admin-logout" style="cursor: pointer">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <a href="./../logout.php">Đăng xuất</a>
                        </div>
                    </div>
                </div>
<?php
    $severname = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    if(isset($_COOKIE['tenuser'])){
        $tenuser=$_COOKIE['tenuser'];
        $conn = new mysqli($severname, $username, $password, $dbname);
        if($conn->connect_error) {
            die('Connection failed: '. $conn->connect_error);
        }
        $sql="SELECT * FROM taikhoan WHERE TenDangNhap= '$tenuser'";
        $result = $conn->query($sql);
        while($row= mysqli_fetch_assoc($result)){
            $loaitk=$row['LoaiTK'];
        }
        if($loaitk!='ad'){
            ?>
                <script>alert('Vui lòng Đăng Nhập bằng Tài Khoản Admin')</script>
        <?php
            header( "refresh:0 ; url=../logout.php" );
        }
    }else{
        ?>
            <script>alert('Vui lòng Đăng Nhập bằng Tài Khoản Admin')</script>
    <?php
        header( "refresh:0 ; url=../login.php" );
    }
?>
               