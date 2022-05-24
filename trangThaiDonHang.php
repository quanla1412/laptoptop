<?php
    $trangThai = $_GET['trangthai'];
    $tenDangNhap = $_COOKIE["tenuser"];

    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    
            
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT hoadon.MaHD, cthd.MaSP, sanpham.TenSP, sanpham.GiaKhuyenMai, cthd.SoLuong, sanpham.Anh
            FROM hoadon, cthd, khachhang, sanpham
            WHERE cthd.MaSP = sanpham.MaSP AND khachhang.MaKH = hoadon.MaKH AND hoadon.MaHD = cthd.MaHD  AND khachhang.TenDangNhap = '$tenDangNhap' AND hoadon.TinhTrang = $trangThai ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if ($trangThai == 1){
                $maHD = $row['MaHD'];
                $maSP = $row['MaSP'];
                $tenSP = $row['TenSP'];
                $soLuong = $row['SoLuong'];
                $gia = $row['GiaKhuyenMai'];
                $anh = $row['Anh'];
                echo'
                    <div class="row pt-3 mt-2">
                        <h4 class="col-9">Đơn Hàng: '.$maHD.'</h4>
                        <h6 class="col-3 ps-5 text-danger">Chưa Thanh Toán</h6>
                    </div>
                    <div class="row">
                        <div class="col-2 d-flex justify-content-center align-items-center"><img src="'.$anh.'" alt="itemsale1" class="w-100 mt-3 ms-2"></div>
                        <div class="col-7 mt-4">
                            <h4 class="mb-0">'.$tenSP.'</h4><br>
                            <h6 class="mb-0">'.$maSP.'</h6><br>
                        </div>
                        <div class="col-2 align-items-end">
                            <h6 class="mt-5 pt-5 mb-0">Số lượng: '.$soLuong.'</h6><br>
                        </div>
                        <div class="col-1 align-items-end">
                            <h6 class="mt-5 pt-5 mb-0" style="color: #1E656D">'.number_format($gia, 0, ',', '.').'</h6><br>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                            <h6 class="pe-3 mt-2 pt-2 pb-2" style="text-align: right;color: #1E656D; font-size: 24px;">
                                <p style="color: #000;display:inline-block;">Tổng tiền: </p>
                                66.000.000 
                            </h6>
                            <h6 class="pe-3 mt-2 pt-2 pb-2" style="text-align: right;color: #1E656D; font-size: 24px;">
                                <button class="border-0 ps-5 pe-5 pt-2 pb-2 btn-giohang-dathang" style="border-radius: 10px;">Thanh Toán Đơn Hàng</button>
                            </h6>
                    </div>
                ';
            }
        }
    }

?>