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
        if($capbac!='quanli'&&$capbac!='giamdoc'){
            ?>
                <script>alert('Vui lòng Đăng Nhập bằng Tài Khoản Admin')</script>
        <?php
            header( "refresh:0 ; url=../logout.php" );
        }
    }else{
        ?>
            <script>alert('Vui lòng Đăng Nhập bằng Tài Khoản Admin1')</script>
    <?php
        header( "refresh:0 ; url=../login.php" );
    }
?>
<?php 
    require "./header.php";

    $them_masp = $_POST['masp'] ?? "" ;
    $them_tensp = $_POST['tensp'] ?? "" ;
    $them_tenhang = $_POST['tenhang'] ?? "" ;    
    $them_anhsp = $_POST['anhsp'] ?? "" ;  
    $them_cpu = $_POST['cpu'] ?? "" ; 
    $them_ram = $_POST['ram'] ?? "" ;
    $them_mausac = $_POST['mausac'] ?? "" ;
    $them_ocung = $_POST['ocung'] ?? "" ;
    $them_youtube = $_POST['youtube'] ?? "" ;
    $them_cauhinhkhac = $_POST['cauhinhkhac'] ?? "" ;
    $them_giagoc = $_POST['giagoc'] ?? "" ;
    $them_giakm = $_POST['giakm'] ?? "" ;

    if($them_masp != ""){
        $severname = "localhost";
        $username = "laptoptop";
        $password = "laptoptop";
        $dbname = "laptoptop";
        $conn = new mysqli($severname, $username, $password, $dbname);
        if($conn->connect_error) {
            die('Connection failed: '. $conn->connect_error);
        }
        
        // Check masp hop le
        $sql_check = "SELECT * FROM sanpham WHERE MaSP = '$them_masp'";
        $result_check = $conn->query($sql_check);
        if($result_check->num_rows > 0)   echo'<script>alert("Thêm không thành công do trùng mã sản phẩm");</script>';
        else {
            $sql_them = "INSERT INTO sanpham VALUES('$them_masp','$them_tensp','$them_tenhang','$them_cpu','$them_ram','$them_ocung','$them_mausac','$them_cauhinhkhac','$them_giakm','$them_giagoc','$them_youtube','$them_anhsp')";
            $result_them = $conn->query($sql_them);
            if($result_them) echo'<script>alert("Thêm thành công");</script>';
            else echo'<script>alert("Thêm không thành công");</script>';
        }
        $conn->close();
    }

?>

<form action="./themsanpham.php" method="post">
    <div class="modal-body">
        <div class="row g-3">
            <div class="col-lg-6">
                <label for="masp" class="form-label">Mã SP</label>
                <input required type="text" class="form-control" id="masp" name="masp" value="<?= $them_masp ?>">
            </div>
            <div class="col-lg-6">
                <label for="tensp" class="form-label">Tên SP</label>
                <input required type="text" class="form-control" id="tensp" name="tensp" value="<?= $them_tensp ?>">
            </div>
            <div class="col-lg-12">
                <label for="tenhang" class="form-label">Tên hãng</label>
                <select id="tenhang" name="tenhang" class="form-select">
                    <option value="Acer" <?= $them_tenhang == "Acer" ?  "selected" : "" ?> >ACER</option>
                    <option value="ASUS" <?= $them_tenhang == "ASUS" ?  "selected" : "" ?>>ASUS</option>
                    <option value="Dell" <?= $them_tenhang == "Dell" ?  "selected" : "" ?>>DELL</option>
                    <option value="GIGABYTE" <?= $them_tenhang == "GIGABYTE" ?  "selected" : "" ?>>GIGABYTE</option>
                    <option value="HP" <?= $them_tenhang == "HP" ?  "selected" : "" ?>>HP</option>
                    <option value="LG" <?= $them_tenhang == "LG" ?  "selected" : "" ?>>LG</option>
                    <option value="LENOVO" <?= $them_tenhang == "LENOVO" ?  "selected" : "" ?>>LENOVO</option>
                    <option value="MICROSOFT" <?= $them_tenhang == "MICROSOFT" ?  "selected" : "" ?>>MICROSOFT</option>
                    <option value="MSI" <?= $them_tenhang == "MSI" ?  "selected" : "" ?>>MSI</option>
                </select>
            </div>
            <div class="col-lg-12">
                <label for="anhsp" class="form-label">Link ảnh</label>
                <input required class="form-control" type="text" id="anhsp" name="anhsp" value="<?= $them_anhsp?>">
            </div>
            <div class="col-lg-4">
                <label for="cpu" class="form-label">CPU</label>
                <select id="cpu" class="form-select" name="cpu" >
                    <option value="Intel Core i3" <?= $them_cpu == "Intel Core i3" ?  "selected" : "" ?> >Intel Core i3</option>
                    <option value="Intel Core i5" <?= $them_cpu == "Intel Core i5" ?  "selected" : "" ?> >Intel Core i5</option>
                    <option value="Intel Core i7" <?= $them_cpu == "Intel Core i7" ?  "selected" : "" ?> >Intel Core i7</option>
                    <option value="Intel Core i9" <?= $them_cpu == "Intel Core i9" ?  "selected" : "" ?> >Intel Core i9</option>
                    <option value="AMD Ryzen 3" <?= $them_cpu == "AMD Ryzen 3" ?  "selected" : "" ?> >AMD Ryzen 3</option>
                    <option value="AMD Ryzen 5" <?= $them_cpu == "AMD Ryzen 5" ?  "selected" : "" ?> >AMD Ryzen 5</option>
                    <option value="AMD Ryzen 7" <?= $them_cpu == "AMD Ryzen 7" ?  "selected" : "" ?> >AMD Ryzen 7</option>
                    <option value="AMD Ryzen 9" <?= $them_cpu == "AMD Ryzen 9" ?  "selected" : "" ?> >AMD Ryzen 9</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="ram" class="form-label">Dung lượng Ram</label>
                <select id="ram" class="form-select" name="ram">
                    <option value="4" <?= $them_ram == "4" ?  "selected" : "" ?> >4GB</option>
                    <option value="8" <?= $them_ram == "8" ?  "selected" : "" ?> >8GB</option>
                    <option value="16" <?= $them_ram == "16" ?  "selected" : "" ?> >16GB</option>
                    <option value="32" <?= $them_ram == "32" ?  "selected" : "" ?> >32GB</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="mausac" class="form-label">Màu sắc</label>
                <select id="mausac" class="form-select" name="mausac">
                    <option value="trắng" <?= $them_mausac == "trắng" ?  "selected" : "" ?>>Trắng</option>
                    <option value="đen" <?= $them_mausac == "đen" ?  "selected" : "" ?>>Đen</option>
                    <option value="xám" <?= $them_mausac == "xám" ?  "selected" : "" ?>>Xám</option>
                    <option value="bạc" <?= $them_mausac == "bạc" ?  "selected" : "" ?>>Bạc</option>
                </select>
            </div>
            <div class="col-lg-6">
                <label for="ocung" class="form-label">Ổ cứng</label>
                <input required type="text" class="form-control" id="ocung" name="ocung" value="<?= $them_ocung?>">
            </div>
            <div class="col-lg-6">
                <label for="youtube" class="form-label">Link youtube</label>
                <input required type="text" class="form-control" id="youtube" name="youtube" value="<?= $them_youtube?>"> 
            </div>
            <div class="col-lg-12">
                <label for="cauhinhkhac" class="form-label">Cấu hình khác</label>
                <textarea class="form-control" id="cauhinhkhac" rows="3" name="cauhinhkhac" value="<?= $them_cauhinhkhac?>"></textarea>
            </div>
            <div class="col-lg-6">
                <label for="giagoc" class="form-label">Giá gốc</label>
                <input required type="number" class="form-control" id="giagoc" name="giagoc" min="0" value="<?= $them_giagoc?>">
            </div>
            <div class="col-lg-6">
                <label for="giakm" class="form-label">Giá khuyến mãi</label>
                <input required type="number" class="form-control" id="giakm" name="giakm" min="0" value="<?= $them_giakm?>">
            </div>
        </div>
    </div>
    <div class="float-end">
        <button type="button" class="btn btn-secondary"><a href="./themsanpham.php">Reset</a></button>
        <button type="submit" class="btn btn-admin">Lưu</button>
    </div>
</form>

<?php require "./footer.php" ?>
