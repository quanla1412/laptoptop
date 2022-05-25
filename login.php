<?php
    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";

    $failLogin = FALSE;

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql= "SELECT * FROM taikhoan WHERE TenDangNhap = '$user' AND Matkhau = '$pass' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if ($result->num_rows > 0) {
            setcookie("tenuser",$user,time()+30*24*60*60);
            setcookie("dangnhap",$row["LoaiTK"],time()+30*24*60*60);
            header('location: index.php');
        } else $failLogin = TRUE;
    }
    $conn->close();
?>
<?php include "./header.php"?>

<div class="d-flex justify-content-center">
    <div class="border border-dark p-3" style="width: 800px; background-color: var(--third-color)">
        <p class="h5 mb-3 text-white">Đăng nhập</p>
        <form action="login.php" method="POST">
            <input type="text" class="form-control mb-3" placeholder="Nhập tên đăng nhập" name="username" required>
            <input type="password" class="form-control mb-3" placeholder="Nhập mật khẩu" name="password" required>
            <?php 
                if($failLogin)  echo'<p class="text-danger">Tên Đăng Nhập Hoặc Mật Khẩu Không Chính Xác</p>';
            ?>
            <input type="submit" class="btn mb-3" style="border:none; background-color: var(--second-color); color: var(--dark-color)" value="Đăng Nhập">
        </form>
        
        <p class="text-white ">Bạn chưa có tài khoản? <a href="./register.php" class="link-primary">Đăng ký</a></p>
    </div>
</div>

<?php include "./footer.php" ?>