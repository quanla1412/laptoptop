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
                <script>alert('lỗi')</script>
        <?php
            header( "refresh:0 ; url=http://localhost:8080/laptoptop/index.php" );
        }
    }else{
        ?>
            <script>alert('lỗi1')</script>
    <?php
        header( "refresh:0 ; url=http://localhost:8080/laptoptop/index.php" );
    }
?>
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
        $capbac=$_POST['capbac'];
        $macs=$_POST['macs'];
        if($_POST['password'] == $_POST['repassword'])
            {
                $sql= "SELECT * FROM taikhoan WHERE TenDangNhap = '$username' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {?>
                    <script>alert("Tên Đăng Nhập Đã Được Sử Dụng")</script>
                <?php }
                else 
                { 
                    $sql= "INSERT INTO TaiKhoan(TenDangNhap,MatKhau,LoaiTK) VALUES ('$username','$password','ad')";
                    $result = $conn->query($sql);
                    $them="INSERT INTO quantri(CapBac,TenDangNhap,MaCS) VALUES ('$capbac','$username','$macs')";
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
    <div class="border border-dark p-3" style=" background-color: var(--third-color)">
        <p class="h5 mb-3 text-white">Đăng ký Admin</p>
        <form action="themadmin.php" method="POST">
            <label for="capbac" class="form-label text-white">Cấp Bậc</label>
            <select class="form-control mb-3" placeholder="Cấp Bậc" name="capbac" id="capbac">
                <option value="giamdoc">giamdoc</option>
                <option value="quanli">quanli</option>
                <option value="nhanvien">nhanvien</option>
            </select>
            <label for="macs" class="form-label text-white">Mã Cơ Sở</label>
            <select class="form-control mb-3" placeholder="Mã Cơ Sở" name="macs" id="macs">
                <option value="csc">csc</option>
                <option value="cs1">cs1</option>
                <option value="cs2">cs2</option>
                <option value="null">null</option>
            </select>
            <label for="username" class="form-label text-white">Tên đăng nhập</label>
            <input type="text" class="form-control mb-3" placeholder="Tên đăng nhập" name="username" id="username" required>
            <label for="password" class="form-label text-white">Nhập mật khẩu</label>
            <input type="password" class="form-control mb-3" placeholder="Nhập mật khẩu" name="password" id="password" required>
            <label for="repassword" class="form-label text-white">Nhập lại mật khẩu</label>
            <input type="password" class="form-control mb-3" placeholder="Nhập lại mật khẩu" name="repassword" id="repassword" required>
            <input type="submit" class="btn mb-3" style="border:none; background-color: var(--second-color); color: var(--dark-color)" value="Đăng Kí">
        </form>
    </div>

<?php include "./footer.php" ?>