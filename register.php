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
        $hoten=$_POST['hoten'];
        $email=$_POST['email'];
        $ngaysinh=$_POST['ngaysinh'];
        $sdt=$_POST['sdt'];

        if($_POST['password'] == $_POST['repassword'])
            {
                $sql= "SELECT * FROM taikhoan WHERE TenDangNhap = '$username' ";
                $result = $conn->query($sql);
                $check="SELECT * FROM khachhang WHERE Email='$email' OR SoDienThoai='$sdt'";
                $resul = $conn->query($check);
                if ($result->num_rows > 0) {?>
                    <script>alert("Tên Đăng Nhập Đã Được Sử Dụng")</script>
                <?php }
                if ($resul->num_rows > 0) {?>
                    <script>alert("Số điện thoại hoặc Email đã đc sử dụng")</script>
                <?php }
                else 
                { 
                    $sql= "INSERT INTO TaiKhoan(TenDangNhap,MatKhau,LoaiTK) VALUES ('$username','$password','us')";
                    $result = $conn->query($sql);
                    header('location: login.php');
                    $them="INSERT INTO khachhang(TenDangNhap,HoTen,SoDienThoai,NgaySinh,Email) VALUES ('$username','$hoten','$sdt','$ngaysinh','$email')";
                    $result = $conn->query($them);
                
                }
            }
        else
        { ?>
                <script>alert('Nhập Lại Mật Khẩu Không Chính Xác')</script>
        <?php }
    } $conn->close();
?>
<?php include "./header.php" ?>

<div class="d-flex justify-content-center">
    <div class="border border-dark p-3" style="width: 800px; background-color: var(--third-color)">
        <p class="h5 mb-3 text-white">Đăng ký</p>
        <form action="register.php" method="POST" >
            <input type="text" class="form-control mb-3" placeholder="Họ và tên" name="hoten" required>
            <input type="tel" class="form-control mb-3" placeholder="Số điện thoại" name="sdt" pattern="[0][0-9]{9}" id="sdt" onchange="checkSDT(this.value)" required>
            <p id="sdtError" class="text-danger"></p>
            <input type="date" class="form-control mb-3" name="ngaysinh" required>
            <input type="email" class="form-control mb-3" placeholder="Email" name="email" id="email" onchange="checkEmail(this.value)" pattern= "[a-z0-9]+@[a-z0-9]+\.[a-z]{2,4}$" required>
            <p id="emailError" class="text-danger"></p>
            <input type="text" class="form-control mb-3" placeholder="Tên đăng nhập" name="username" id="username" pattern= "[a-z0-9]{6,12}" title="Tên Đăng Nhập từ 6 đến 12 kí tự" onchange="checkUsername(this.value)" required>
            <p id="usernameError" class="text-danger"></p>
            <input type="password" class="form-control mb-3" placeholder="Nhập mật khẩu" name="password" id="password" required>
            <input type="password" class="form-control mb-3" placeholder="Nhập lại mật khẩu" name="repassword" id="repassword" oninput="checkRePassword()" required>
            <p id="repasswordError" class="text-danger"></p>
            <input type="submit" id="register-submit" class="btn mb-3 border-0 text-dark" style="background-color: var(--second-color);" value="Đăng Kí">
        </form>
        <p class="text-white ">Bạn đã có tài khoản? <a href="./login.php" class="link-primary">Đăng nhập</a></p>
    </div>
</div>

<script language="javascript" >
    function checkRePassword() {
        password = document.getElementById('password').value;
        repassword = document.getElementById('repassword').value;
        if (password != repassword) {
            document.getElementById('repasswordError').innerHTML = "Nhập lại mật khẩu sai, vui lòng thử lại";
            document.getElementById('register-submit').disabled = true;            
        } else {            
            document.getElementById('repasswordError').innerHTML = "";
            document.getElementById('register-submit').disabled = false;            
        }
    }

    
    function checkUsername(username) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {            
            if (this.responseText != "") {
                document.getElementById('register-submit').disabled = true;            
            } else {            
                document.getElementById('register-submit').disabled = false;            
            }
            document.getElementById('usernameError').innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "./AJAX/checkRegister.php?username=" + username);
        xmlhttp.send();
    }

    function checkSDT(sdt) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {            
            if (this.responseText != "") {
                document.getElementById('register-submit').disabled = true;            
            } else {            
                document.getElementById('register-submit').disabled = false;            
            }
            document.getElementById('sdtError').innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "./AJAX/checkRegister.php?sdt=" + sdt);
        xmlhttp.send();
    }

    function checkEmail(email) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {            
            if (this.responseText != "") {
                document.getElementById('register-submit').disabled = true;            
            } else {            
                document.getElementById('register-submit').disabled = false;            
            }
            document.getElementById('emailError').innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "./AJAX/checkRegister.php?email=" + email);
        xmlhttp.send();
    }
</script>

<?php include "./footer.php" ?>