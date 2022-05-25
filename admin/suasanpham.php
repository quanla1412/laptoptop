<?php 
    require "./header.php";
    require "../database/SanPham.php";

    $sanpham = laySanPham($_GET['masp']);

    // Fix bỏ vào trong if cho gọn
    $sua_masp = $_GET['masp'] ?? "" ;
    $sua_tensp = $_POST['tensp'] ?? "" ;
    $sua_tenhang = $_POST['tenhang'] ?? "" ;    
    $sua_anhsp = $_POST['anhsp'] ?? "" ;  
    $sua_cpu = $_POST['cpu'] ?? "" ; 
    $sua_ram = $_POST['ram'] ?? "" ;
    $sua_mausac = $_POST['mausac'] ?? "" ;
    $sua_ocung = $_POST['ocung'] ?? "" ;
    $sua_youtube = $_POST['youtube'] ?? "" ;
    $sua_cauhinhkhac = $_POST['cauhinhkhac'] ?? "" ;
    $sua_giagoc = $_POST['giagoc'] ?? "" ;
    $sua_giakm = $_POST['giakm'] ?? "" ;
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $severname = "localhost";
        $username = "laptoptop";
        $password = "laptoptop";
        $dbname = "laptoptop";
        $conn = new mysqli($severname, $username, $password, $dbname);
        if($conn->connect_error) {
            die('Connection failed: '. $conn->connect_error);
        }
        
       
        $sql_sua = "UPDATE sanpham SET TenSP = '$sua_tensp', TenHang = '$sua_tenhang', CPU = '$sua_cpu', RAM = '$sua_ram', OCung = '$sua_ocung', MauSac = '$sua_mausac', CauHinhKhac = '$sua_cauhinhkhac', Gia = '$sua_giagoc', GiaKhuyenMai = '$sua_giakm',Youtube ='$sua_youtube',Anh = '$sua_anhsp' WHERE MaSP='$sua_masp'";
        $result_sua = $conn->query($sql_sua);
        if($result_sua) echo'<script>alert("Sửa thành công");</script>';
        else echo'<script>alert("Sửa không thành công");</script>';
        
        $conn->close();

        loadData();
        $sanpham = laySanPham($_GET['masp']);
    }
?>

<form action="./suasanpham.php?masp=<?=$_GET['masp']?>" method="post" name="suasp">
    <div class="modal-body">
        <div class="row g-3">
            <div class="col-lg-6">
                <label for="masp" class="form-label">Mã SP</label>
                <input required type="text" class="form-control" id="masp" name="masp" value="<?= $sanpham->getMaSP() ?>" disabled>
            </div>
            <div class="col-lg-6">
                <label for="tensp" class="form-label">Tên SP</label>
                <input required type="text" class="form-control" id="tensp" name="tensp" value="<?= $sanpham->getTenSP() ?>">
            </div>
            <div class="col-lg-12">
                <label for="tenhang" class="form-label">Tên hãng</label>
                <select id="tenhang" name="tenhang" class="form-select">
                    <option value="Acer" <?= $sanpham->getTenHang() == "Acer" ?  "selected" : "" ?> >ACER</option>
                    <option value="ASUS" <?= $sanpham->getTenHang() == "ASUS" ?  "selected" : "" ?>>ASUS</option>
                    <option value="Dell" <?= $sanpham->getTenHang() == "Dell" ?  "selected" : "" ?>>DELL</option>
                    <option value="GIGABYTE" <?= $sanpham->getTenHang() == "GIGABYTE" ?  "selected" : "" ?>>GIGABYTE</option>
                    <option value="HP" <?= $sanpham->getTenHang() == "HP" ?  "selected" : "" ?>>HP</option>
                    <option value="LG" <?= $sanpham->getTenHang() == "LG" ?  "selected" : "" ?>>LG</option>
                    <option value="LENOVO" <?= $sanpham->getTenHang() == "LENOVO" ?  "selected" : "" ?>>LENOVO</option>
                    <option value="MICROSOFT" <?= $sanpham->getTenHang() == "MICROSOFT" ?  "selected" : "" ?>>MICROSOFT</option>
                    <option value="MSI" <?= $sanpham->getTenHang() == "MSI" ?  "selected" : "" ?>>MSI</option>
                </select>
            </div>
            <div class="col-lg-12">
                <label for="anhsp" class="form-label">Link ảnh</label>
                <input required class="form-control" type="text" id="anhsp" name="anhsp" value="<?= $sanpham->getAnh()?>">
            </div>
            <div class="col-lg-4">
                <label for="cpu" class="form-label">CPU</label>
                <select id="cpu" class="form-select" name="cpu" >
                    <option value="Intel Core i3" <?= strpos($sanpham->getCPU(),"i3")==TRUE ?  "selected" : "" ?> >Intel Core i3</option>
                    <option value="Intel Core i5" <?= strpos($sanpham->getCPU(),"i5")==TRUE ?  "selected" : "" ?> >Intel Core i5</option>
                    <option value="Intel Core i7" <?= strpos($sanpham->getCPU(),"i7")==TRUE ?  "selected" : "" ?> >Intel Core i7</option>
                    <option value="Intel Core i9" <?= strpos($sanpham->getCPU(),"i9")==TRUE ?  "selected" : "" ?> >Intel Core i9</option>
                    <option value="AMD Ryzen 3" <?= strpos($sanpham->getCPU(),"AMD Ryzen 3")==TRUE ?  "selected" : "" ?> >AMD Ryzen 3</option>
                    <option value="AMD Ryzen 5" <?= strpos($sanpham->getCPU(),"AMD Ryzen 5")==TRUE ?  "selected" : "" ?> >AMD Ryzen 5</option>
                    <option value="AMD Ryzen 7" <?= strpos($sanpham->getCPU(),"AMD Ryzen 7")==TRUE ?  "selected" : "" ?> >AMD Ryzen 7</option>
                    <option value="AMD Ryzen 9" <?= strpos($sanpham->getCPU(),"AMD Ryzen 9")==TRUE ?  "selected" : "" ?> >AMD Ryzen 9</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="ram" class="form-label">Dung lượng Ram</label>
                <select id="ram" class="form-select" name="ram">
                    <option value="4" <?= $sanpham->getRAM() == "4" ?  "selected" : "" ?> >4GB</option>
                    <option value="8" <?= $sanpham->getRAM() == "8" ?  "selected" : "" ?> >8GB</option>
                    <option value="16" <?= $sanpham->getRAM() == "16" ?  "selected" : "" ?> >16GB</option>
                    <option value="32" <?= $sanpham->getRAM() == "32" ?  "selected" : "" ?> >32GB</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="mausac" class="form-label">Màu sắc</label>
                <select id="mausac" class="form-select" name="mausac">
                    <option value="trắng" <?= $sanpham->getMauSac() == "trắng" ?  "selected" : "" ?>>Trắng</option>
                    <option value="đen" <?= $sanpham->getMauSac() == "đen" ?  "selected" : "" ?>>Đen</option>
                    <option value="xám" <?= $sanpham->getMauSac() == "xám" ?  "selected" : "" ?>>Xám</option>
                    <option value="bạc" <?= $sanpham->getMauSac() == "bạc" ?  "selected" : "" ?>>Bạc</option>
                </select>
            </div>
            <div class="col-lg-6">
                <label for="ocung" class="form-label">Ổ cứng</label>
                <input required type="text" class="form-control" id="ocung" name="ocung" value="<?= $sanpham->getOCung()?>">
            </div>
            <div class="col-lg-6">
                <label for="youtube" class="form-label">Link youtube</label>
                <input required type="text" class="form-control" id="youtube" name="youtube" value="<?= $sanpham->getYoutube()?>"> 
            </div>
            <div class="col-lg-12">
                <label for="cauhinhkhac" class="form-label">Cấu hình khác</label>
                <textarea class="form-control" id="cauhinhkhac" rows="3" name="cauhinhkhac" value="<?= $sanpham->getCauHinhKhac()?>"></textarea>
            </div>
            <div class="col-lg-6">
                <label for="giagoc" class="form-label">Giá gốc</label>
                <input required type="number" class="form-control" id="giagoc" name="giagoc" min="0" value="<?= $sanpham->getGia()?>">
            </div>
            <div class="col-lg-6">
                <label for="giakm" class="form-label">Giá khuyến mãi</label>
                <input required type="number" class="form-control" id="giakm" name="giakm" min="0" value="<?= $sanpham->getGiaKhuyenMai()?>">
            </div>
        </div>
    </div>
    <div class="float-end">
        <button type="button" class="btn btn-secondary"><a href="./suasanpham.php?masp=<?=$_GET['masp']?>">Reset</a></button>
        <input type="button" class="btn btn-admin" onclick="formSubmit()" value="Lưu">
        <script>
            function formSubmit(){
                if (confirm("Bạn muốn chỉnh sửa Sản Phẩm") == true) {
                    document.forms["suasp"].submit();
                } else {
                    // window.location="./collections.php";
                }    
            }
        </script>
    </div>
</form>

<?php require "./footer.php" ?>
