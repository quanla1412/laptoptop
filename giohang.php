<?php include "./header.php"?>



<div class="container">
  <div class="row align-items-start">
    <div class="col-12 mb-4 pt-1 pb-1 rounded" style="background-color: #E5E5E5;font-weight: bold; font-size: 24px;">
      Giỏ Hàng
    </div>
  </div>
  <div class="row mt-0 ">
        <div class="col-12 col-lg-8">
            <?php 
                $servername = "localhost";
                $username = "laptoptop";
                $password = "laptoptop";
                $dbname = "laptoptop";
                $tenDangNhap = $_COOKIE["user"];
            
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "SELECT * FROM giohang";
                $result = $conn->query($sql);
                $tongGioHang = 0;

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if($row['TenDangNhap'] == $tenDangNhap){
                            $id = $row['MaSP'];
                            $soLuong = $row['SoLuong'];
                            $sanPham = laySanPham($id);
                            $tongGioHang += $sanPham->getGia() * $soLuong;

                            echo'
                                <div class="row  mt-1 rounded" style="background-color: #E5E5E5;">
                                    <div class="d-none d-lg-block col-3 d-flex justify-content-center align-items-center"><img src="'.$sanPham->getAnh().'" alt="itemsale1" class="w-100 m-2"></div>
                                    <div class="col-4 col-lg-3 mt-2">
                                        <h4 class="mb-0">'.$sanPham->getTenSP().'</h4><br>
                                        <h6 class="mb-0">'.$sanPham->getMaSP().'</h6><br>
                                    </div>
                                    <div class="col-3 col-lg-2 d-flex justify-content-center align-items-center">
                                        <a href="xulygiamspgh.php?id='.$id.'">
                                            <input type="button" class="border-1" style="border-radius: 8px 0px 0px 8px;" value="-">
                                        </a>
                                        <input id="quantity" class="w-25 border-1 text-align:center" style="text-align:center;" value="'.$soLuong.'">
                                        <a href="xulytangspgh.php?id='.$id.'">
                                            <input type="button" class="border-1" style="border-radius: 0px 8px 8px 0px;" value="+">
                                        </a>
                                    </div>
                                    <div class="col-3 col-lg-2 d-flex justify-content-center align-items-center">
                                        <h6 class="" style="color: #1E656D">'.number_format($sanPham->getGiaKhuyenMai()*$soLuong, 0, ',', '.').'</h6><br>
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                    <a href="./xulyxoaspgiohang.php?id='.$id.'" class=" border-0 ps-3 pe-3 pt-0 pb-0 btn-giohang-xoa "style="font-weight: bold ;border-radius: 10px;">Xoá</a>
                                    </div>
                                    
                                </div>
                            ';
                        }
                    }
                }
                else{
                    echo "Giỏ hàng trống";
                }
            ?>
            <!-- <div class="row  mt-1 rounded" style="background-color: #E5E5E5;">
                <div class="d-none d-lg-block col-3 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 m-2"></div>
                <div class="col-4 col-lg-3 mt-2">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-3 col-lg-2 d-flex justify-content-center align-items-center">
                    <button class="border-1" style="border-radius: 8px 0px 0px 8px;">-</button>
                    <input class="w-25 border-1 text-align:center" style="text-align:center;" value="1">
                    <button class="border-1" style="border-radius: 0px 8px 8px 0px;">+</button>
                </div>
                <div class="col-3 col-lg-2 d-flex justify-content-center align-items-center">
                    <h6 class="" style="color: #1E656D">22.000.000</h6><br>
                </div>
                <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                <button type="button" class=" border-0 ps-3 pe-3 pt-0 pb-0 btn-giohang-xoa "style="font-weight: bold ;border-radius: 10px;" >Xóa</button>
                </div>
            </div>
            <div class="row mt-1 rounded" style="background-color: #E5E5E5;">
                <div class="d-none d-lg-block col-3 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 m-2"></div>
                <div class="col-4 col-lg-3 mt-2">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-3 col-lg-2 d-flex justify-content-center align-items-center">
                    <button class="border-1" style="border-radius: 8px 0px 0px 8px;">-</button>
                    <input class="w-25 border-1 text-align:center" style="text-align:center;" value="1">
                    <button class="border-1" style="border-radius: 0px 8px 8px 0px;">+</button>
                </div>
                <div class="col-3 col-lg-2 d-flex justify-content-center align-items-center">
                    <h6 class="" style="color: #1E656D">22.000.000</h6><br>
                </div>
                <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                <button type="button" class=" border-0 ps-3 pe-3 pt-0 pb-0 btn-giohang-xoa "style="font-weight: bold ;border-radius: 10px;" >Xóa</button>
                </div>
            </div>
            <div class="row  mt-1 rounded" style="background-color: #E5E5E5;">
                <div class="d-none d-lg-block col-3 d-flex justify-content-center align-items-center"><img src="./assets/image/square-sale/sale1.png" alt="itemsale1" class="w-100 m-2"></div>
                <div class="col-4 col-lg-3 mt-2">
                    <h4 class="mb-0">Acer Nitro 5</h4><br>
                    <h6 class="mb-0">Mã máy</h6><br>
                </div>
                <div class="col-3 col-lg-2 d-flex justify-content-center align-items-center">
                    <button class="border-1" style="border-radius: 8px 0px 0px 8px;">-</button>
                    <input class="w-25 border-1 text-align:center" style="text-align:center;" value="1">
                    <button class="border-1" style="border-radius: 0px 8px 8px 0px;">+</button>
                </div>
                <div class="col-3 col-lg-2 d-flex justify-content-center align-items-center">
                    <h6 class="" style="color: #1E656D">22.000.000</h6><br>
                </div>
                <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                <button type="button" class=" border-0 ps-3 pe-3 pt-0 pb-0 btn-giohang-xoa "style="font-weight: bold ;border-radius: 10px;" >Xóa</button>
                </div>
            </div> -->
        </div>
        <div class="col-12 col-lg-4 mt-4 mt-lg-0" >
            <div class="mt-0" style="background-color: #E5E5E5;height: 166px; border-radius: 20px;">
                <h5 class="pt-2 ps-3">Thông Tin Thanh Toán</h5>
                <h6 class="mt-4 mb-2 ps-3">
                    <h6 class="ps-3" style="float: left;">Tạm tính</h6>
                    <h6 class="pe-3" style="text-align: right;"> <?php echo number_format($tongGioHang, 0, ',', '.'); ?> </h6>
                    <h6 class="ps-3" style="float: left;">Thành tiền</h6>
                    <h6 class="pe-3" style="text-align: right;color: #1E656D; font-size: 24px;"><?php echo number_format($tongGioHang, 0, ',', '.'); ?> </h6>
                </h6>
                <div class="d-grid gap-2 mt-2">
                    <button class="border-0 ms-3 me-3 pt-2 pb-2 btn-giohang-dathang" style="border-radius: 20px;">Đặt Hàng</button>
                </div>
            </div>
        </div>
  </div>
</div>
<?php include "./footer.php" ?>
