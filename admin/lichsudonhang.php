<?php include "./header.php";
    $search = $_GET['search'] ?? "";

    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop"; 

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT *
            FROM hoadon
            WHERE TinhTrang = 3";
    $result = $conn->query($sql);
?>

<div class="container-fluid px-4">
    <div class="row mb-2">
        <form action="./lichsudonhang.php" method="get">
            <div class="col-4">
                <span class="h6 me-2">Bộ lọc:</span>
                <input type="text" name="search" id="" class="form-control w-75 d-inline-block" placeholder="Nhập mã hóa đơn">
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-3 d-flex align-items-center"><p class="h6">Khoảng thời gian: </p></div>
                    <div class="col-9">
                        <input type="date" class="form-control d-inline-block" placeholder="Từ" style="width: 136px; ">
                        <p class="d-none d-lg-inline-block fw-bold mx-2" >~</p>
                        <input type="date" class="form-control d-inline-block" placeholder="Đến" style="width: 136px; " >
                    </div>
                </div>
            </div>
            <div class="col-2 d-flex align-items-center">
                <button type="submit" class="btn-qldh-timkiem w-100">Tìm kiếm</button>
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
            </tr>
        </thead>
        <tbody>
            <?php
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $maHD = $row['MaHD'];
                        
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

<?php 
    $conn->close();
    include "./footer.php";
?>