<?php include "./header.php"?>
<?php
    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";

    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $tendangnhap= $_COOKIE["user"];
    $sql="SELECT * FROM khachhang WHERE TenDangNhap = '$tendangnhap'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
?>

<div class="d-flex justify-content-center">
    <div class="border-0 p-3" style="width: 800px; background-color: var(--gray-color);border-radius: 15px;">
        <p class="h5 mb-3 ">Tài Khoản Của Tôi</p>
        <form action="thongtinuser.php" method="POST">
            <div class="row mt-1 mb-3">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6>Tên Đăng Nhập</h6></div>
                <div class="col-9 pt-2"><?php echo $_COOKIE['user']?></div>
            </div>
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6>Mật Khẩu</h6></div>
                <div class="col-9 pt-2">********</div>
            </div> 
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6>Họ và Tên</h6></div>
                <div class="col-9"><input type="text" class="form-control mb-3 border border-dark border-2" name="hoten" required placeholder="<?php 
                echo $row['HoTen'];?>" ></div>
            </div>
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6> Email</h6></div>
                <div class="col-9"> <input type="email" class="form-control mb-3 border border-dark border-2" name="email" required placeholder="<?php 
                echo $row['Email'];?>" ></div>
            </div>
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6>Số điện thoại</h6></div>
                <div class="col-9"><input type="tel" class="form-control mb-3 border border-dark border-2" name="sdt" required placeholder="<?php 
                echo $row['SoDienThoai'];?>" ></div>
            </div>
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6>Ngày Sinh</h6></div>
                <div class="col-9"><input type="date" class="form-control mb-3 border border-dark border-2" name="ngaysinh" required placeholder="<?php 
                echo $row['NgaySinh'];
                }
            }?>" ></div>
            </div>
            
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "></div>
                <div class="col-9">
                <input type="submit" value="Lưu">
                </div>
            </div>
        </form>
        <?php
            $servername = "localhost";
            $username = "laptoptop";
            $password = "laptoptop";
            $dbname = "laptoptop";
                
            $tendn=$_COOKIE["user"];    
            $conn = new mysqli($servername, $username, $password, $dbname);
            if (isset($_POST['hoten']))
            {
                $hoten=$_POST['hoten'] ;
                $sql= "UPDATE khachhang SET HoTen = '$hoten' WHERE khachhang.TenDangNhap = '$tendn'";
                $result = $conn->query($sql);
            }
            if (isset($_POST['email']))
            {
                $email=$_POST['email'] ;
                $sql= "UPDATE khachhang SET Email = '$email' WHERE khachhang.TenDangNhap = '$tendn'";
                $result = $conn->query($sql);
            }
            if (isset($_POST['sdt']))
            {
                $sdt=$_POST['sdt'] ;
                $sql= "UPDATE khachhang SET SoDienThoai = '$sdt' WHERE khachhang.TenDangNhap = '$tendn'";
                $result = $conn->query($sql);
            }
            if (isset($_POST['hoten']))
            {
                $ngaysinh=$_POST['ngaysinh'] ;
                $sql= "UPDATE khachhang SET NgaySinh = '$ngaysinh' WHERE khachhang.TenDangNhap = '$tendn'";
                $result = $conn->query($sql);
            }
        ?>       
    </div>
</div>

<?php include "./footer.php" ?>