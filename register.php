<?php include "./header.php" ?>

<div class="d-flex justify-content-center">
    <div class="border border-dark p-3" style="width: 800px; background-color: var(--third-color)">
        <p class="h5 mb-3 text-white">Đăng ký</p>
        <form action="register.php" method="POST">
        <input type="text" class="form-control mb-3" placeholder="Họ và tên" name="hoten" required>
        <input type="tel" class="form-control mb-3" placeholder="Số điện thoại" name="sdt" pattern="[0][0-9]{9}" required>
        <input type="date" class="form-control mb-3" name="" required>
        <input type="email" class="form-control mb-3" placeholder="Email" name="email" pattern= "[a-z0-9]+@[a-z0-9]+\.[a-z]{2,4}$" required>
        <input type="text" class="form-control mb-3" placeholder="Tên đăng nhập" name="username" required>
        <input type="password" class="form-control mb-3" placeholder="Nhập mật khẩu" name="password" required>
        <input type="password" class="form-control mb-3" placeholder="Nhập lại mật khẩu" name="repassword" required>
        <input type="submit" class="btn mb-3" style="border:none; background-color: var(--second-color); color: var(--dark-color)" value="Đăng Kí">
        </form>
        <?php
                $servername = "localhost";
                $username = "laptoptop";
                $password = "laptoptop";
                $dbname = "laptoptop";
        
        
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $sql= "SELECT * FROM taikhoan WHERE TenDangNhap = '$username' ";
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        echo '<h6 class="text-danger">Tên Đăng Nhập Đã Được Sử Dụng</h6>';
                    }
                    else { 
                    
                        if($_POST['password'] == $_POST['repassword'])
                        {
                            $sql= "INSERT INTO TaiKhoan(TenDangNhap,MatKhau,LoaiTK) VALUES ('$username','$password','us')";
                            $result = $conn->query($sql);
                            echo '<h6 class="text-white">Đăng Kí Thành công</h6>';
                            echo '<meta http-equiv="refresh" content="0;url=login.php">';
                        }
                        else{
                            echo '<h6 class="text-danger">Nhập Lại Mật Khẩu Không Chính Xác</h6>';
                        }
                    }
                }
        ?>
        <p class="text-white ">Bạn đã có tài khoản? <a href="./login.php" class="link-primary">Đăng nhập</a></p>
    </div>
</div>

<?php include "./footer.php" ?>