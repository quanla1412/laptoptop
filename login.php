<?php include "./header.php"?>

<div class="d-flex justify-content-center">
    <div class="border border-dark p-3" style="width: 800px; background-color: var(--third-color)">
        <p class="h5 mb-3 text-white">Đăng nhập</p>
        <form action="login.php" method="POST">
        <input type="text" class="form-control mb-3" placeholder="Nhập tên đăng nhập" name="username" required>
        <input type="password" class="form-control mb-3" placeholder="Nhập mật khẩu" name="password" required>
        <input type="submit" class="btn mb-3" style="border:none; background-color: var(--second-color); color: var(--dark-color)" value="Đăng Nhập">
        </form>
        <?php
                $servername = "localhost";
                $username = "laptoptop";
                $password = "laptoptop";
                $dbname = "laptoptop";
        
        
                $conn = new mysqli($servername, $username, $password, $dbname);
            if(isset($_POST['username'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
        
                $sql= "SELECT * FROM taikhoan WHERE TenDangNhap = '$username' ";
                $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {

                    $sql= "SELECT * FROM taikhoan WHERE Matkhau = '$password' ";
                    $result = $conn->query($sql);
                    if($result->num_rows == true){
                        echo '<meta http-equiv="refresh" content="0;url=index.php">';
                    }
                    else{
                        echo '<h6 class="text-danger">Mật Khẩu Không Chính Xác</h6>';
                    }
                }
                else {
                    echo '<h6 class="text-danger">Tên Đăng Nhập Không Chính Xác</h6>'; 
                }
            }
        ?>
        <p class="text-white ">Bạn chưa có tài khoản? <a href="./register.php" class="link-primary">Đăng ký</a></p>
    </div>
</div>

<?php include "./footer.php" ?>