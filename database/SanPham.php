<?php
class SoLuong {
    private $maCoSo;
    private $soLuong;

    public function __construct($maCoSo, $soLuong) {
        $this->maCoSo = $maCoSo;
        $this->soLuong = $soLuong;        
    }
}

class SanPham {
    private $maSP;
    private $tenSP;
    private $tenHang;
    private $CPU; 
	private $RAM;
	private $oCung;
	private $mauSac;
	private $cauHinhKhac;
	private $giaGoc;
	private $giaKhuyenMai;
	private $youtube;
	private $anh;
    private $soLuong;

    public function __construct($maSP, $tenSP, $tenHang, $CPU, $RAM, $oCung, $mauSac, $cauHinhKhac, $gia, $giaKhuyenMai, $youtube, $anh) {
        $this->maSP = $maSP;
        $this->tenSP = $tenSP;
        $this->tenHang = $tenHang;
        $this->CPU = $CPU;
        $this->RAM = $RAM;
        $this->oCung = $oCung;
        $this->mauSac = $mauSac;
        $this->cauHinhKhac = $cauHinhKhac;
        $this->gia = $gia;
        $this->giaKhuyenMai = $giaKhuyenMai;
        $this->youtube = $youtube;
        $this->anh = $anh;
        $this->soLuong[] = new SoLuong("CSC",0);
        $this->soLuong[] = new SoLuong("CS1",0);
        $this->soLuong[] = new SoLuong("CS2",0);        
    }

    public function getMaSP() {
        return $this->maSP;
    }

    public function getTenSP() {
        return $this->tenSP;
    }

    public function getTenHang() {
        return $this->tenHang;
    }

    public function getCPU() {
        return $this->CPU;
    }

    public function getRAM() {
        return $this->RAM;
    }

    public function getOCung() {
        return $this->oCung;
    }

    public function getMauSac() {
        return $this->mauSac;
    }

    public function getCauHinhKhac() {
        return $this->cauHinhKhac;
    }

    public function getGia() {
        return $this->gia;
    }

    public function getGiaKhuyenMai() {
        return $this->giaKhuyenMai;
    }

    public function getYoutube() {
        return $this->youtube;
    }

    public function getAnh() {
        return $this->anh;
    }

    public function xuLyGia() {
        return number_format($this->gia, 0, ',', '.');
    }

    public function xuLyGiaKhuyenMai() {
        return number_format($this->giaKhuyenMai, 0, ',', '.');
    }
}

function loadData() {
    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";

    $danhSachSanPham = array();

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM sanpham";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $sanPham = new SanPham(
                $row['MaSP'], 
                $row['TenSP'], 
                $row['TenHang'], 
                $row['CPU'], 
                $row['RAM'], 
                $row['OCung'], 
                $row['MauSac'], 
                $row['CauHinhKhac'], 
                $row['Gia'], 
                $row['GiaKhuyenMai'], 
                $row['Youtube'], 
                $row['Anh']);
            $danhSachSanPham[] = $sanPham;
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    return $danhSachSanPham;
}

function filter($maSP = '', $tenSP = '', $tenHang = '', $CPU = '', $RAM = '', $mauSac = '', $giaKhuyenMai = 0) {
    global $tatCaSanPham;
    $danhSachMoi = array();

    if($tenHang != '') {
        foreach ($tatCaSanPham as $sanPham) {
            if(strtolower($sanPham->getTenHang()) == strtolower($tenHang)) $danhSachMoi[] = $sanPham;
        }
    }

   return $danhSachMoi;
}

function laySanPham($maSP = '') {
    global $tatCaSanPham;

    foreach ($tatCaSanPham as $sanPham) {
        if(strtolower($sanPham->getMaSP()) == strtolower($maSP)) return $sanPham;
    }

    return NULL;
}

function randomSanPham($danhSachSanPham, $number = 1) {
    $rands = range(0, count($danhSachSanPham)-1);
    shuffle($rands);
    for($i = 0; $i < $number; $i++) {
        $danhSachMoi[] = $danhSachSanPham[$rands[$i]];
    }

    return $danhSachMoi;
}

$tatCaSanPham = loadData();
?>
