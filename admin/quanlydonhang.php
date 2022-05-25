<?php 
    include "./header.php" ;
    $mode = $_GET['mode'] ?? 1;
    $search = $_GET['search'] ?? "";

    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    
    if(isset($_GET['hoanThanh'])){
        $masp = $_GET['hoanThanh'];
        $sql = "UPDATE hoadon
            SET TinhTrang = 3
            WHERE MaHD = $masp";
        $result = $conn->query($sql);
    }

    if(isset($_GET['huy'])){
        $masp = $_GET['huy'];
        $sql = "UPDATE hoadon
            SET TinhTrang = 0
            WHERE MaHD = $masp";
        $result = $conn->query($sql);
    }
            
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT *
            FROM hoadon";
    $result = $conn->query($sql);
?>

<div class="container-fluid px-4">
    <div class="row rounded mb-3" >
        <div onclick="loadPage('./quanlydonhang.php?mode=1')" class="qldh-nav col-3 border border-1 p-2 d-flex justify-content-center fw-bold <?= $mode == 1 ? 'active' : '' ?>" >Chưa thanh toán</div>
        <div onclick="loadPage('./quanlydonhang.php?mode=2')" class="qldh-nav col-3 border border-1 p-2 d-flex justify-content-center fw-bold <?= $mode == 2 ? 'active' : '' ?>" >Đang xử lý</div>
        <div onclick="loadPage('./quanlydonhang.php?mode=3')" class="qldh-nav col-3 border border-1 p-2 d-flex justify-content-center fw-bold <?= $mode == 3 ? 'active' : '' ?>" >Đã hoàn thành</div>
        <div onclick="loadPage('./quanlydonhang.php?mode=0')" class="qldh-nav col-3 border border-1 p-2 d-flex justify-content-center fw-bold <?= $mode == 0 ? 'active' : '' ?>" >Đã hủy</div>
    </div>
    <div>
        <form class="row " action="./quanlydonhang.php" method="GET">
            <div class="col-6">
                <span class="h6 me-2">Bộ lọc:</span>
                <input type="text" name="search" id="" class="form-control w-75 d-inline-block" placeholder="Nhập mã đơn hàng">
                <input type="hidden" name="mode" value="<?=$mode?>">
            </div>
            <div class="col-2 d-flex align-items-center">
                <button type="submit" class="btn-qldh-timkiem w-100 border border-0">Tìm kiếm</button>
            </div>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Mã khách hàng</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày</th>
                <?= $mode == 2 ? '<th class="text-center" scope="col">Xử Lý</th>' : '' ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $maHD = $row['MaHD'];

                    if($row['TinhTrang'] != $mode || strpos($maHD,$search)===FALSE)  continue;
                        
                    $sql_cthd = "SELECT * FROM cthd WHERE MaHD = '$maHD'";
                    $result_cthd = $conn->query($sql_cthd);
                    
                    $first_row = TRUE;

                    if($result_cthd->num_rows > 0) {
                        $numRowCTHD = $result_cthd->num_rows;

                        while($row_cthd = $result_cthd->fetch_assoc()) {
                            
                            $maSP = $row_cthd['MaSP'];

                            $sql_sp = "SELECT * FROM sanpham WHERE MaSP = '$maSP'";
                            $result_sp = $conn->query($sql_sp);
                            $row_sp = $result_sp->fetch_assoc();                            

                            $sql_tong = "select sum(GiaKhuyenMai*SoLuong) as trigia from cthd,hoadon,sanpham where cthd.MaHD=hoadon.MaHD AND sanpham.MaSP = cthd.MaSP and cthd.MaHD='$maHD'";
                            $result_tong = $conn->query($sql_tong);
                            $row_tong = $result_tong->fetch_assoc();
                            $tongTien = $row_tong['trigia'];

                            if($first_row) {
                                echo'
                                <tr>
                                    <th scope="row" rowspan="'.$numRowCTHD.'">'.$row['MaHD'].'</th>
                                    <td rowspan="'.$numRowCTHD.'">'.$row['MaKH'].'</td>
                                    <td>'.$row_sp['TenSP'].'</td>
                                    <td>'.$row_cthd['SoLuong'].'</td>
                                    <td>'.number_format($row_sp['Gia'], 0, ',', '.').' đ</td>
                                    <td rowspan="'.$numRowCTHD.'">'.number_format($tongTien, 0, ',', '.').' đ</td>
                                    <td rowspan="'.$numRowCTHD.'">'.$row['Ngay'].'</td>';
                                if($mode == 2)  echo '<td rowspan="3" class="align-middle text-center"><a class="text-dark" href="./quanlydonhang.php?mode=3&hoanThanh='.$row['MaHD'].'">Hoàn thành</a></br><a class="text-dark" href="./quanlydonhang.php?mode=0&huy='.$row['MaHD'].'">Hủy</a></td>';
                                echo '
                                </tr>
                                ';
                                $first_row = FALSE;
                            } else {
                                echo'
                                <tr>
                                    <td>'.$row_sp['TenSP'].'</td>
                                    <td>'.$row_cthd['SoLuong'].'</td>
                                    <td>'.number_format($row_sp['Gia'], 0, ',', '.').' đ</td>
                                    
                                </tr>
                                ';
                            }                            
                        }
                    }
                }
                
            } 
            ?>
            <!-- <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
                <td rowspan="3" class="align-middle text-center"><a class="text-dark" href="">Chỉnh sửa</a></br><a class="text-dark" href="">Nhập hàng</a></td>
            </tr>
            <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
            </tr>
            <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
            </tr> -->
            
        </tbody>
    </table>    
</div>

<script>
    function loadPage(url){
        window.location.href = url;
    }
</script>

<?php 
    $conn->close();
    include "./footer.php";
?>