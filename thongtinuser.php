<?php include "./header.php"?>
<?php
    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";

    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $tendangnhap= $_COOKIE["tenuser"];
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
                <div class="col-9 pt-2"><?=$_COOKIE['tenuser']?></div>
            </div> 
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6>Họ và Tên</h6></div>
                <div class="col-9"><input type="text" class="form-control mb-3 border border-dark border-2" name="hoten"  placeholder="<?=$row['HoTen'];?>" ></div>
            </div>
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6> Email</h6></div>
                <div class="col-9"> <input type="email" class="form-control mb-3 border border-dark border-2" pattern= "[a-z0-9]+@[a-z0-9]+\.[a-z]{2,4}$" name="email" placeholder="<?=$row['Email'];?>" ></div>
            </div>
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6>Số điện thoại</h6></div>
                <div class="col-9"><input type="tel" class="form-control mb-3 border border-dark border-2" pattern="[0][0-9]{9}" name="sdt" placeholder="<?=$row['SoDienThoai'];?>" ></div>
            </div>
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6>Ngày Sinh</h6></div>
                <div class="col-9"><input type="date" class="form-control mb-3 border border-dark border-2" name="ngaysinh" value="<?=$row['NgaySinh'];
            }
        } $conn->close();?>" ></div>
            </div>
            <div class="row mt-1">
            <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "><h6>Mật Khẩu</h6></div>
            <div class="col-9 " style="float:left;" > <input type="password" name="pass" class="form-control mb-3 border border-dark border-2" placeholder=""></div>
        </div>
            
            <div class="row mt-1">
                <div class="col-3 pt-2 "style="text-align: right; font-weight: bold; "></div>
                <div class="col-9">
                <input type="submit" class="border border-dark border-2 pt-2 pb-2 ps-3 pe-3 btn-nav border border-dark border-2" style="border-radius: 5px;" value="Lưu">
                </div>
            </div>
        </form>
        <?php
            $servername = "localhost";
            $username = "laptoptop";
            $password = "laptoptop";
            $dbname = "laptoptop";
                
            $tendn=$_COOKIE["tenuser"];    
            $conn = new mysqli($servername, $username, $password, $dbname);
            if (!empty($_POST['hoten']))
            {
                $hoten=$_POST['hoten'] ;
                $sql= "UPDATE khachhang SET HoTen = '$hoten' WHERE khachhang.TenDangNhap = '$tendn'";
                $result = $conn->query($sql);
            }
            if (!empty($_POST['email']))
            {
                $newemail=$_POST['email'];
                $checkemail= "SELECT * FROM khachhang WHERE Email = '$newemail' ";
                $resu =$conn->query($checkemail);
                if ($resu->num_rows > 0) {?>
                    <script>alert("Email Đã Được Sử Dụng")</script>
                <?php }
                else 
                {
                $email=$_POST['email'] ;
                $sql= "UPDATE khachhang SET Email = '$email' WHERE khachhang.TenDangNhap = '$tendn'";
                $result = $conn->query($sql);
                }
            }
            if (!empty($_POST['sdt']))
            {
                $newsdt=$_POST['sdt'];
                $checksdt= "SELECT * FROM khachhang WHERE SoDienThoai = '$newsdt' ";
                $resul =$conn->query($checksdt);
                if ($resul->num_rows > 0) {?>
                    <script>alert("Số Diện Thoại Đã Được Sử Dụng")</script>
                <?php }
                else 
                {
                $sdt=$_POST['sdt'] ;
                $sql= "UPDATE khachhang SET SoDienThoai = '$sdt' WHERE khachhang.TenDangNhap = '$tendn'";
                $result = $conn->query($sql);
                }
            }
            if (isset($_POST['hoten']))
            {
                $ngaysinh=$_POST['ngaysinh'] ;
                $sql= "UPDATE khachhang SET NgaySinh = '$ngaysinh' WHERE khachhang.TenDangNhap = '$tendn'";
                $result = $conn->query($sql);
            }
            if (!empty($_POST['pass']))
            {
                $pass=$_POST['pass'] ;
                $sql= "UPDATE taikhoan SET MatKhau = '$pass' WHERE taikhoan.TenDangNhap = '$tendn'";
                $result = $conn->query($sql);
            }
        ?>       
    </div>
</div>

<?php include "./footer.php" ?>