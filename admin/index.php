<?php 
    require "../database/SanPham.php";
    require "./header.php";

    define('MAX_QUANTITY',4);  //So luong hien thi toi da san pham trong 1 trang

    $trangHienTai = $_GET['p'] ?? 1;

    // filer
    $f_tenSP =  $_GET['tenSP'] ?? "";

    define('MINPRICE',0);
    define('MAXPRICE',1000000000);
    $f_minPrice = $_GET['minPrice'] ?? "";
    $f_minPrice = $f_minPrice == "" ? MINPRICE : (int)$f_minPrice;
    $f_maxPrice = $_GET['maxPrice'] ?? "";
    $f_maxPrice = $f_maxPrice == "" ? MAXPRICE : (int)$f_maxPrice;

    $danhSachSanPham = filter(tenSP: $f_tenSP, minPrice: $f_minPrice, maxPrice: $f_maxPrice);

    $soTrang = soTrang($danhSachSanPham, MAX_QUANTITY); 
?>

<div class="container-fluid px-4">
    <div class="row mb-2">
        <form class="d-flex" action="./">
            <div class="col-6">
                <label for="tenSP" class="h6 me-2">Bộ lọc:</label>
                <input type="text" name="tenSP" id="tenSP" class="form-control w-75 d-inline-block" placeholder="Nhập tên sản phẩm hoặc mã sản phẩm" value="<?= $f_tenSP ?>">
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><p class="h6">Khoảng giá: </p></div>
                    <div class="col-8">
                        <input type="number" name="minPrice" class="form-control d-inline-block" value="<?= $f_minPrice == MINPRICE ? "" : $f_minPrice?>" min="0" placeholder="Từ" style="width: 80px;">
                        <p class="d-none d-lg-inline-block fw-bold mx-2" >~</p>
                        <input type="number" name="maxPrice" class="form-control d-inline-block" value="<?= $f_maxPrice == MAXPRICE ? "" : $f_maxPrice?>" placeholder="Đến" style="width: 80px;" >
                    </div>
                </div>
            </div>
            <div class="col-2 d-flex align-items-center">
                <button type="submit" class="btn btn-qldh-timkiem w-100">Tìm kiếm</button>
            </div>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Giá khuyến mãi</th>
            <th scope="col">Cơ sở</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng số lượng</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sanPhamStart = ($trangHienTai - 1) * MAX_QUANTITY; 
                $sanPhamEnd = min($trangHienTai * MAX_QUANTITY, count($danhSachSanPham));
        
                for($i=$sanPhamStart; $i<$sanPhamEnd; $i++) {
                    echo '<tr>
                            <th scope="row" rowspan="3" class="align-middle">'.$danhSachSanPham[$i]->getTenSP().'</th>
                            <td rowspan="3" class="align-middle">'.$danhSachSanPham[$i]->getMaSP().'</td>
                            <td rowspan="3" class="align-middle">'.$danhSachSanPham[$i]->xuLyGiaKhuyenMai().' đ</td>
                            <td>CSC</td>
                            <td>'.$danhSachSanPham[$i]->getSoLuong('csc').'</td>
                            <td rowspan="3" class="align-middle text-center">'.$danhSachSanPham[$i]->getTongSoLuong().'</td>
                            <td class="'.$danhSachSanPham[$i]->checkTinhTrangHangCSS('csc').'">'.$danhSachSanPham[$i]->checkTinhTrangHang('csc').'</td>
                            <td rowspan="3" class="align-middle text-center"><a class="text-dark" href="./suasanpham.php?masp='.$danhSachSanPham[$i]->getMaSP().'">Chỉnh sửa</a></br><a class="text-dark" href="./nhaphang.php?masp='.$danhSachSanPham[$i]->getMaSP().'">Nhập hàng</a></td>
                        </tr>
                        <tr>
                            <td>CS1</td>
                            <td>'.$danhSachSanPham[$i]->getSoLuong('cs1').'</td>
                            <td class="'.$danhSachSanPham[$i]->checkTinhTrangHangCSS('cs1').'">'.$danhSachSanPham[$i]->checkTinhTrangHang('cs1').'</td>
                        </tr>
                        <tr>
                            <td>CS2</td>
                            <td>'.$danhSachSanPham[$i]->getSoLuong('cs2').'</td>
                            <td class="'.$danhSachSanPham[$i]->checkTinhTrangHangCSS('cs2').'">'.$danhSachSanPham[$i]->checkTinhTrangHang('cs2').'</td>
                        </tr>';
                }

            ?>
            <!-- <tr>
                <th scope="row" rowspan="3" class="align-middle">Acer Nitro 5</th>
                <td rowspan="3" class="align-middle">AN520212022</td>
                <td rowspan="3" class="align-middle">22.000.000 VND</td>
                <td>CSC</td>
                <td>1</td>
                <td rowspan="3" class="align-middle text-center">11</td>
                <td class="text-success">Còn hàng</td>
            </tr>
            <tr>
                <td>CS1</td>
                <td>1</td>
                <td class="text-danger">Hết hàng</td>
            </tr>
            <tr>
                <td>CS2</td>
                <td>1</td>
                <td class="text-success">Còn hàng</td>
            </tr> -->
        </tbody>
    </table>    
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php 
                $queryString = '';
                if(isset($_GET)) {
                    foreach($_GET as $key=>$value) {
                        if($key == 'p') continue;
                        if(is_array($value)) {
                            foreach($value as $valueOfValue) {
                                $queryString .= $key."[]=".$valueOfValue."&";
                            }
                        } else {
                            $queryString .= $key."=".$value."&";
                        }
                    }
                }

                if($soTrang>1) {
                    echo '<li class="page-item ';
                    if($trangHienTai<=1) echo 'disabled';
                    echo'">
                        <a class="page-link" href="?'.$queryString.'p='.($trangHienTai-1).'" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>';

                    for($i=1; $i<=$soTrang; $i++) {
                        echo'<li class="page-item ';
                        if($trangHienTai == $i) echo 'active';
                        echo '"><a class="page-link" href="?'.$queryString.'p='.$i.'">'.$i.'</a></li>';
                    }
                    
                    echo '<li class="page-item ';
                    if($trangHienTai >= $soTrang) echo 'disabled';
                    echo'">
                        <a class="page-link" href="?'.$queryString.'p='.($trangHienTai+1).'" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>


<?php include "./footer.php" ?>