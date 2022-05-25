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
        $sql="SELECT * FROM quantri WHERE TenDangNhap= '$tenuser'";
        $result = $conn->query($sql);
        while($row= mysqli_fetch_assoc($result)){
            $capbac=$row['CapBac'];
        }
        if($capbac!='giamdoc'){
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
<?php require "./header.php";
$makh=$_GET['makh'];
$tenuser=$_GET['tenuser'];

    $severname = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    $conn = new mysqli($severname, $username, $password, $dbname);
    if($conn->connect_error) {
        die('Connection failed: '. $conn->connect_error);
    }
    $sql="SELECT * FROM khachhang WHERE MaKH= '$makh' AND TenDangNhap= '$tenuser'";
    $result = $conn->query($sql);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $matkhau=$_POST['matkhau'];
        $hoten=$_POST['hoten'];
        $sdt=$_POST['sdt'];
        $ngaysinh=$_POST['ngaysinh'];
        $email=$_POST['email'];

        $sql_sua = "UPDATE khachhang SET HoTen='$hoten', SoDienThoai='$sdt', NgaySinh='$ngaysinh', Email='$email' WHERE TenDangNhap = '$tenuser'";
        $result_sua = $conn->query($sql_sua);
    }
    while($row= mysqli_fetch_assoc($result)){
        $hoten= $row['HoTen'];
        $sdt= $row['SoDienThoai'];
        $ngaysinh= $row['NgaySinh'];
        $email= $row['Email'];
        
        $resul = $conn->query("SELECT MatKhau FROM taikhoan WHERE TenDangNhap = '$tenuser'");
        while($tow= mysqli_fetch_assoc($resul)){
            $matkhau= $tow['MatKhau'];
        }
?>
<form action="suauser.php?makh=<?=$makh?>&tenuser=<?=$tenuser?>" method="POST" name="suauser">
    <div class="modal-body">
        <div class="row g-3">
            <div class="col-lg-6">
                <label for="makh" class="form-label">Mã KH</label>
                <input required type="text" class="form-control" id="makh" name="makh" value="<?=$makh?>" disabled>
            </div>
            <div class="col-lg-6">
                <label for="tenuser" class="form-label">Tên Đăng Nhập</label>
                <input required type="text" class="form-control" id="tenuser" name="tenuser" value="<?=$tenuser?>"disabled>
            </div>
            <div class="col-lg-12">
            <label for="matkhau" class="form-label">Mật Khẩu</label>
                <input required type="text" class="form-control" id="matkhau" name="matkhau" value="<?= $matkhau ?>">
            </div>
            <div class="col-lg-12">
                <label for="hoten" class="form-label">Họ Tên</label>
                <input required class="form-control" type="text" id="hoten" name="hoten" value="<?= $hoten ?>">
            </div>
            <div class="col-lg-12">
                <label for="sdt" class="form-label">Số Điện Thoại</label>
                <input required class="form-control" type="text" id="sdt" name="sdt" pattern="[0][0-9]{9}" value="<?= $sdt ?>">
            </div>
            <div class="col-lg-12">
                <label for="ngaysinh" class="form-label">Ngày Sinh</label>
                <input required class="form-control" type="date" id="ngaysinh" name="ngaysinh" value="<?= $ngaysinh ?>">
            </div>
            <div class="col-lg-12">
                <label for="email" class="form-label">Email</label>
                <input required class="form-control" type="text" id="email" name="email" pattern= "[a-z0-9]+@[a-z0-9]+\.[a-z]{2,4}$" value="<?= $email ?>">
            </div>
        </div>
    </div>
    <?php } 
            $conn->close();
            ?>
    <div class="float-end">
        <button type="button" class="btn btn-secondary"><a href="suauser.php?makh=<?=$makh?>&tenuser=<?=$tenuser?>">Reset</a></button>
        <input type="button" class="btn btn-admin" onclick="formSubmit()" value="Lưu">
        <script>
            function formSubmit(){
                if (confirm("Bạn muốn chỉnh sửa tài khoản User") == true) {
                    document.forms["suauser"].submit();
                } else {
                    // window.location="./collections.php";
                }    
            }
        </script>
    </div>
</form>
<?php require "./footer.php" ?>