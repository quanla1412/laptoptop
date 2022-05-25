<?php include "./header.php"?>

<div class="container">
  <div class="row">
        <div class="row pt-2 pb-2 d-flex justify-content-center align-items-center" style="background-color: #E5E5E5;border-radius: 20px;font-weight: bold; font-size: 24px;">
            Lịch Sử Đơn Hàng
        </div>  
        <div id="ttdh" class="row mt-4 pt-2 pb-2">
            <h6 onclick="trangThai(1)"  class="col pt-3 pb-3 border border-dark border-2 d-flex justify-content-center align-items-center btn-lsdonhang active ">Chưa Thanh Toán</h6>
            <h6 onclick="trangThai(2)"  class="col pt-3 pb-3 border border-dark border-2 d-flex justify-content-center align-items-center btn-lsdonhang  ">Đang Xử Lí</h6>
            <h6 onclick="trangThai(3)"  class="col pt-3 pb-3 border border-dark border-2 d-flex justify-content-center align-items-center btn-lsdonhang ">Đã Hoàn Thành</h6>
        </div>
        
        <div id="chuyenTrangThai" >
            <?php
                $trangThai = 1;
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
                    $checkMaHD = 0;

                    $sqli = "SELECT MAX(hoadon.MaHD)
                            FROM hoadon, khachhang
                            WHERE khachhang.TenDangNhap = '$tenDangNhap' AND hoadon.TinhTrang = $trangThai ";
                    $resulti = $conn->query($sqli);
                    $rowi = $resulti->fetch_assoc();
                    $maxMaHD = $rowi['MAX(hoadon.MaHD)'];


                    while($row = $result->fetch_assoc()){
                        if($row['MaHD'] > $checkMaHD){
                            $checkMaHD = $row['MaHD'];
                            $tongHoaDon = 0;
                            echo'
                            <div  class="row mt-2 mb-5" style="background-color: #E5E5E5; border-radius: 20px;">
                                <div class="row pt-3 mt-2">
                                    <h4 class="col-9">Đơn Hàng: '.$checkMaHD.'</h4>
                                    <h6 class="col-3 ps-5 text-danger">Chưa Thanh Toán</h6>
                                </div>
                            ';
                            $result1 = $conn->query($sql);
                            while($row1 = $result1->fetch_assoc()){
                                if($row1['MaHD'] == $checkMaHD){
                                    $anh = $row1['Anh'];
                                    $tenSP = $row1['TenSP'];
                                    $maSP = $row1['MaSP'];
                                    $soLuong = $row1['SoLuong'];
                                    $gia = $row1['GiaKhuyenMai'];
                                    $tongHoaDon += $soLuong*$gia;
                                    echo'
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
                                    ';
                                    continue;
                                }
                                elseif($row1['MaHD'] > $checkMaHD ){
                                    echo'
                                        <div class="row">
                                            <h6 class="pe-3 mt-2 pt-2 pb-2" style="text-align: right;color: #1E656D; font-size: 24px;">
                                                <p style="color: #000;display:inline-block;">Tổng tiền: </p>
                                                '.number_format($tongHoaDon, 0, ',', '.').'
                                            </h6>
                                            <h6 class="pe-3 mt-2 pt-2 pb-2" style="text-align: right;color: #1E656D; font-size: 24px;">
                                                <button onclick="xacNhanThanhToan('.$checkMaHD.')" class="border-0 ps-5 pe-5 pt-2 pb-2 btn-giohang-dathang" style="border-radius: 10px;">Thanh Toán Đơn Hàng</button>
                                            </h6>
                                        </div>
                                    </div>
                                    ';
                                    break;
                                }
                            }
                            if($row['MaHD'] == $maxMaHD){
                                echo'
                                    <div class="row">
                                        <h6 class="pe-3 mt-2 pt-2 pb-2" style="text-align: right;color: #1E656D; font-size: 24px;">
                                            <p style="color: #000;display:inline-block;">Tổng tiền: </p>
                                            '.number_format($tongHoaDon, 0, ',', '.').'
                                        </h6>
                                        <h6 class="pe-3 mt-2 pt-2 pb-2" style="text-align: right;color: #1E656D; font-size: 24px;">
                                            <button onclick="xacNhanThanhToan('.$maxMaHD.')" class="border-0 ps-5 pe-5 pt-2 pb-2 btn-giohang-dathang" style="border-radius: 10px;">Thanh Toán Đơn Hàng</button>
                                        </h6>
                                    </div>
                                </div>
                                ';
                            }
                        }
                    }   
                }
                $conn->close();
                // exit();

            ?>
        </div>
        <!-- <div id="chuyenTrangThai" class="row mt-2 mb-5" style="background-color: #E5E5E5; border-radius: 20px;">
             <div class="row pt-3 mt-2">
                <h4 class="col-9">Đơn Hàng: Mã Đơn</h4>
                <h6 class="col-3 ps-5 text-danger">Chưa Thanh Toán</h6>
            </div>
            <div class="row">
                <div class="col-2 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 mt-3 ms-2"></div>
                <div class="col-7 mt-4">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-2 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0">Số lượng: 1</h6><br>
                </div>
                <div class="col-1 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0" style="color: #1E656D">22.000.000</h6><br>
                </div>
            </div>
            <div class="row">
                <div class="col-2 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 mt-3 ms-2"></div>
                <div class="col-7 mt-4">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-2 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0">Số lượng: 1</h6><br>
                </div>
                <div class="col-1 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0" style="color: #1E656D">22.000.000</h6><br>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 mt-3 ms-2"></div>
                <div class="col-7 mt-4">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-2 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0">Số lượng: 1</h6><br>
                </div>
                <div class="col-1 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0" style="color: #1E656D">22.000.000</h6><br>
                </div>
            </div>
            <div class="row">
                    <h6 class="pe-3 mt-2 pt-2 pb-2" style="text-align: right;color: #1E656D; font-size: 24px;">
                        <p style="color: #000;display:inline-block;">Tổng tiền: </p>
                        66.000.000 
                    </h6>
                    <h6 class="pe-3 mt-2 pt-2 pb-2" style="text-align: right;color: #1E656D; font-size: 24px;">
                        <button onclick="xacNhanThanhToan(121)" class="border-0 ps-5 pe-5 pt-2 pb-2 btn-giohang-dathang" style="border-radius: 10px;">Thanh Toán Đơn Hàng</button>
                    </h6>
            </div>
        </div> -->
        <!-- </div>
        <div class="row mt-2 mb-5 " style="background-color: #E5E5E5; border-radius: 20px;">
            <div class="row pt-3 mt-2">
                <h4 class="col-10">Đơn Hàng: Mã Đơn</h4>
                <h5 class="col-2 ps-5" style="color: #1E656D" >Đang Giao Hàng</h5>
            </div>
            <div class="row">
                <div class="col-2 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 mt-3 ms-2"></div>
                <div class="col-7 mt-4">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-2 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0">Số lượng: 1</h6><br>
                </div>
                <div class="col-1 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0" style="color: #1E656D">22.000.000</h6><br>
                </div>
            </div>
            <div class="row">
                <div class="col-2 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 mt-3 ms-2"></div>
                <div class="col-7 mt-4">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-2 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0">Số lượng: 1</h6><br>
                </div>
                <div class="col-1 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0" style="color: #1E656D">22.000.000</h6><br>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 mt-3 ms-2"></div>
                <div class="col-7 mt-4">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-2 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0">Số lượng: 1</h6><br>
                </div>
                <div class="col-1 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0" style="color: #1E656D">22.000.000</h6><br>
                </div>
            </div>
            <div class="row">
                <div>
                    <button class="border-0 ps-5 pe-5 mt-3 pt-2 pb-2 btn-giohang-dathang" style="border-radius: 10px;float:left;">Xác Nhận Đơn Hàng</button>
                    <h6 class="pe-3 mt-2 pt-2 pb-2" style="text-align: right;color: #1E656D; font-size: 24px;">
                        <p style="color: #000;display:inline-block;">Tổng tiền: </p>
                        66.000.000 
                    </h6>
                </div>
            </div>
        </div>
        <div class="row mt-2 mb-5 " style="background-color: #E5E5E5; border-radius: 20px;">
            <div class="row pt-3 mt-2">
                <h4 class="col-10">Đơn Hàng: Mã Đơn</h4>
                <h5 class="col-2 ps-5" style="color: #1E656D" >Đã Giao Hàng</h5>
            </div>
            <div class="row">
                <div class="col-2 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 mt-3 ms-2"></div>
                <div class="col-7 mt-4">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-2 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0">Số lượng: 1</h6><br>
                </div>
                <div class="col-1 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0" style="color: #1E656D">22.000.000</h6><br>
                </div>
            </div>
            <div class="row">
                <div class="col-2 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 mt-3 ms-2"></div>
                <div class="col-7 mt-4">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-2 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0">Số lượng: 1</h6><br>
                </div>
                <div class="col-1 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0" style="color: #1E656D">22.000.000</h6><br>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 mt-3 ms-2"></div>
                <div class="col-7 mt-4">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-2 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0">Số lượng: 1</h6><br>
                </div>
                <div class="col-1 align-items-end">
                    <h6 class="mt-5 pt-5 mb-0" style="color: #1E656D">22.000.000</h6><br>
                </div>
            </div>
            <div class="row">
                <h6 class="pe-3" style="text-align: right;color: #1E656D; font-size: 24px;">
                    <p style="color: #000;display:inline-block;">Tổng tiền: </p>
                    66.000.000 
                </h6>
            </div>
        </div> -->
  </div>
</div>
<script>
    function active(){
        var header = document.getElementById("ttdh");
        var btns = header.getElementsByClassName("btn-lsdonhang");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
            });
        }
    }

    function trangThai(x){
        
        active();
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("chuyenTrangThai").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "./AJAX/trangThaiDonHang.php?trangthai="+x, true);
        xmlhttp.send();
    }

    function xacNhanThanhToan(x){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("chuyenTrangThai").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "./AJAX/chuyentrangthaidonhang.php?IdHoaDon="+x, true);
        xmlhttp.send();
    }
</script>
<?php include "./footer.php" ?>
