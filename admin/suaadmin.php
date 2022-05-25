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
$maad=$_GET['maad'];
$tenadmin=$_GET['tenadmin'];

    $severname = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    $conn = new mysqli($severname, $username, $password, $dbname);
    if($conn->connect_error) {
        die('Connection failed: '. $conn->connect_error);
    }
    $sql="SELECT * FROM quantri WHERE MaAdmin= '$maad' AND TenDangNhap= '$tenadmin'";
    $result = $conn->query($sql);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $matkhau=$_POST['matkhau'];
        $macs=$_POST['macs'];
        $capbac=$_POST['capbac'];

        $sql_sua = "UPDATE quantri SET MaCS='$macs', CapBac='$capbac' WHERE TenDangNhap = '$tenadmin'";
        $result_sua = $conn->query($sql_sua);
        if($result_sua) echo'<script>alert("Sửa thành công");</script>';
        else echo'<script>alert("Sửa không thành công");</script>';
    }
    while($row= mysqli_fetch_assoc($result)){
        $macs= $row['MaCS'];
        $capbac= $row['CapBac'];
        
        $resul = $conn->query("SELECT MatKhau FROM taikhoan WHERE TenDangNhap = '$tenadmin'");
        while($tow= mysqli_fetch_assoc($resul)){
            $matkhau= $tow['MatKhau'];
        }
?>
<form action="suaadmin.php?maad=<?=$maad?>&tenadmin=<?=$tenadmin?>" method="POST" name="suaadmin">
    <div class="modal-body">
        <div class="row g-3">
            <div class="col-lg-6">
                <label for="maad" class="form-label">Mã AD</label>
                <input required type="text" class="form-control" id="maad" name="maad" value="<?=$maad?>" disabled>
            </div>
            <div class="col-lg-6">
                <label for="tenadmin" class="form-label">Tên Đăng Nhập</label>
                <input required type="text" class="form-control" id="tenadmin" name="tenadmin" value="<?=$tenadmin?>"disabled>
            </div>
            <div class="col-lg-12">
            <label for="matkhau" class="form-label">Mật Khẩu</label>
                <input required type="text" class="form-control" id="matkhau" name="matkhau" value="<?= $matkhau ?>">
            </div>
            <div class="col-lg-12">
                <label for="macs" class="form-label">Mã Cơ Sở</label>
                <select required class="form-control" type="text" id="macs" name="macs" >
                <option value="csc" <?php if($macs=='csc') echo 'selected'?>>csc</option>
                <option value="cs1" <?php if($macs=='cs1') echo 'selected'?>>cs1</option>
                <option value="cs2" <?php if($macs=='cs2') echo 'selected'?>>cs2</option>
                <option value="null" <?php if($macs=='null') echo 'selected'?>>null</option>
                </select>
            </div>
            <div class="col-lg-12">
                <label for="capbac" class="form-label">Cấp Bậc</label>
                <select required class="form-control" type="text" id="capbac" name="capbac">
                <option value="giamdoc" <?php if($capbac=='giamdoc') echo 'selected'?> >giamdoc</option>
                <option value="quanli" <?php if($capbac=='quanli') echo 'selected'?>>quanli</option>
                <option value="nhanvien" <?php if($capbac=='nhanvien') echo 'selected'?>>nhanvien</option>
                </select>
            </div>
        </div>
    </div>
    <?php } 
            $conn->close();
            ?>
    <div class="float-end">
        <button type="button" class="btn btn-secondary"><a href="suaadmin.php?maad=<?=$maad?>&tenadmin=<?=$tenadmin?>">Reset</a></button>
        <input type="button" class="btn btn-admin" onclick="formSubmit()" value="Lưu">
        <script>
            function formSubmit(){
                if (confirm("Bạn muốn chỉnh sửa tài khoản Admin") == true) {
                    document.forms["suaadmin"].submit();
                } else {
                    // window.location="./collections.php";
                }    
            }
        </script>
    </div>
</form>
<?php require "./footer.php" ?>