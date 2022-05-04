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

function getAllTenHang() {
    global $tatCaSanPham;
    $allTenHang = array();

    foreach ($tatCaSanPham as $sanPham) 
        if(!in_array($sanPham->getTenHang(),$allTenHang)) 
            $allTenHang[] = $sanPham->getTenHang();

    return $allTenHang;
}

function getAllMauSac() {
    global $tatCaSanPham;
    $allMauSac = array();

    foreach ($tatCaSanPham as $sanPham) 
        if(!in_array($sanPham->getMauSac(),$allMauSac)) 
            $allMauSac[] = $sanPham->getMauSac();

    return $allMauSac;
}

function getAllCPU() {
    global $tatCaSanPham;
    $allCPU = array();

    foreach ($tatCaSanPham as $sanPham) 
        if(!in_array($sanPham->getCPU(),$allCPU)) 
            $allCPU[] = $sanPham->getCPU();

    return $allCPU;
}

function getAllRAM() {
    global $tatCaSanPham;
    $allRAM = array();

    foreach ($tatCaSanPham as $sanPham) 
        if(!in_array($sanPham->getRAM(),$allRAM)) 
            $allRAM[] = $sanPham->getRAM();

    return $allRAM;
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
                intval($row['Gia']), 
                intval($row['GiaKhuyenMai']), 
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

function filter($maSP = '', $tenSP = '', $tenHang = array(), $CPU = array(), $RAM = array(), $mauSac = array(), $minPrice = 0, $maxPrice = 100000000) {
    global $tatCaSanPham;
    $danhSachMoi = $tatCaSanPham;

    if(count($tenHang)==0)  $tenHang = getAllTenHang();
    if(count($mauSac)==0)  $mauSac = getAllMauSac();
    if(count($CPU)==0)  $CPU = getAllCPU();
    if(count($RAM)==0)  $RAM = getAllRAM();


    foreach ($tenHang as &$tungTenHang) $tungTenHang = strtolower($tungTenHang);
    foreach ($mauSac as &$tungMauSac) $tungMauSac = mb_strtolower($tungMauSac);
    foreach ($CPU as &$tungCPU) $tungCPU = strtolower($tungCPU);
    foreach ($RAM as &$tungRAM) $tungRAM = strtolower($tungRAM);

    for ($i=0; $i < count($danhSachMoi); $i++) {
        if(
            !in_array(strtolower($danhSachMoi[$i]->getTenHang()),$tenHang) ||
            !in_array(mb_strtolower($danhSachMoi[$i]->getMauSac()),$mauSac) ||            
            !in_array(strtolower($danhSachMoi[$i]->getRAM()),$RAM) ||
            $danhSachMoi[$i]->getGiaKhuyenMai() < $minPrice ||
            $danhSachMoi[$i]->getGiaKhuyenMai() > $maxPrice ||
            strpos(strtolower($danhSachMoi[$i]->getTenSP()),strtolower($tenSP))===false
        ) array_splice($danhSachMoi, $i--, 1);
    }

    for ($i=0; $i < count($danhSachMoi); $i++) {
        $flag = 0;
        foreach ($CPU as $value) {
            if (strpos(strtolower($danhSachMoi[$i]->getCPU()),strtolower($value))!==false) {
                $flag = 1;
            }
        }
        if($flag == 0)  array_splice($danhSachMoi, $i--, 1);
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

function soTrang($danhSachSanPham, $quantity) {
    return ceil(count($danhSachSanPham)/$quantity);
}

function checkTenHang($tenHang) {
    if(!isset($_GET['tenHang']))    return FALSE;
    return in_array($tenHang,$_GET['tenHang']);  
}

function checkMauSac($mauSac) {
    if(!isset($_GET['mauSac']))    return FALSE;
    return in_array($mauSac,$_GET['mauSac']);  
}

function checkCPU($CPU) {
    if(!isset($_GET['CPU']))    return FALSE;
    return in_array($CPU,$_GET['CPU']);  
}

function checkRAM($RAM) {
    if(!isset($_GET['RAM']))    return FALSE;
    return in_array($RAM,$_GET['RAM']);  
}

$tatCaSanPham = loadData();
?>
