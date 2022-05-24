<?php
    $minPrice = $_GET['minPrice'] ?? "";
    $maxPrice = $_GET['maxPrice'] ?? "";

    $danhSachSanPham = filter(tenSP: $_GET['tenSP'] ?? "",
                                tenHang: $_GET['tenHang'] ?? array(), 
                                mauSac: $_GET['mauSac'] ?? array(), 
                                CPU: $_GET['CPU'] ?? array(), 
                                RAM: $_GET['RAM'] ?? array(), 
                                minPrice: $minPrice == "" ? 0 : $minPrice, 
                                maxPrice: $maxPrice == "" ? 1000000000 : $maxPrice);

    define('MAX_QUANTITY',12);  //So luong hien thi toi da san pham trong 1 trang

    $trangHienTai = $_GET['p'] ?? 1;

    $soTrang = soTrang($danhSachSanPham, MAX_QUANTITY); 

    $sanPhamStart = ($trangHienTai - 1) * MAX_QUANTITY;
    $sanPhamEnd = min($trangHienTai * MAX_QUANTITY, count($danhSachSanPham));

    for($i=$sanPhamStart; $i<$sanPhamEnd; $i++) {
        echo '
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" style="width: 100%;">
                <img src="'.$danhSachSanPham[$i]->getAnh().'" class="card-img-top" alt="Core item1">
                <div class="card-body">
                    <h5 class="card-title" style="height: 72px;">'.$danhSachSanPham[$i]->getTenSP().'</h5>
                    <p class="card-text mb-0 text-decoration-line-through">'.$danhSachSanPham[$i]->xuLyGia().' đ</p>
                    <p class="card-text fs-5">'.$danhSachSanPham[$i]->xuLyGiaKhuyenMai().' đ</p>
                    <a href="./product.php?id='.$danhSachSanPham[$i]->getMaSP().'" class="btn btn-primary rounded" style="background-color: var(--third-color)">Mua ngay</a>
                </div>
            </div>
        </div>';
    }
?>