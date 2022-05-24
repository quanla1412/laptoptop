<?php
    $severname = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    if(!isset($_COOKIE['tenuser'])){
        ?>
            <script>alert('Vui lòng Đăng Nhập')</script>
    <?php
        header( "refresh:0 ; url=./login.php" );
    }
?>
<?php include "./header.php"?>

<script>
    function cong(x,y){
        var t = document.getElementById("quantity"+x).value;
        document.getElementById("quantity"+x).value = parseInt(t)+1;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("giaTongSoLuongSP"+x).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "xulytangspgh.php?id="+x+"&gia="+y, true);
        xmlhttp.send();
        a = 1;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tongTienGioHang1").innerHTML = this.responseText;
                document.getElementById("tongTienGioHang2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "xulytongtiengiohang.php?id="+x+"&bien="+a, true);
        xmlhttp.send();
    }

    function tru(x,y){
        var t = document.getElementById("quantity"+x).value;
        if(parseInt(t)>1){
            document.getElementById("quantity"+x).value = parseInt(t)-1;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("giaTongSoLuongSP"+x).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "xulygiamspgh.php?id="+x+"&gia="+y, true);
        xmlhttp.send();
        a = 0;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tongTienGioHang1").innerHTML = this.responseText;
                document.getElementById("tongTienGioHang2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "xulytongtiengiohang.php?id="+x+"&bien="+a, true);
        xmlhttp.send();
    }

    function xoa(x){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("giohangtrong"+x).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "xulyxoaspgiohang.php?id="+x, true);
        xmlhttp.send();
        a = 2;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tongTienGioHang1").innerHTML = this.responseText;
                document.getElementById("tongTienGioHang2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "xulytongtiengiohang.php?id="+x+"&bien="+a, true);
        xmlhttp.send();
    }

    function datHang(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            }
        };
        xmlhttp.open("GET", "dathang.php", true);
        xmlhttp.send();
    }
</script>

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
                $tenDangNhap = $_COOKIE["tenuser"];
            
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
                            $tongGioHang += $sanPham->getGiaKhuyenMai() * $soLuong;

                            echo'
                                <div id="giohangtrong'.$id.'">
                                <div class="row  mt-1 rounded" style="background-color: #E5E5E5;">
                                    <div class="d-none d-lg-block col-3 d-flex justify-content-center align-items-center"><img src="'.$sanPham->getAnh().'" alt="itemsale1" class="w-100 m-2"></div>
                                    <div class="col-4 col-lg-3 mt-2">
                                        <h4 class="mb-0">'.$sanPham->getTenSP().'</h4><br>
                                        <h6 class="mb-0">'.$sanPham->getMaSP().'</h6><br>
                                    </div>
                                    <div class="col-3 col-lg-2 d-flex justify-content-center align-items-center">
                                        <input type="button" class="border-1" style="border-radius: 8px 0px 0px 8px;" value="-" onclick="tru(\''.$id.'\','.$sanPham->getGiaKhuyenMai().')">
                                        <input id="quantity'.$id.'" class="w-25 border-1 text-align:center" style="text-align:center;" value="'.$soLuong.'">
                                        <input type="button" class="border-1" style="border-radius: 0px 8px 8px 0px;" value="+" onclick="cong(\''.$id.'\','.$sanPham->getGiaKhuyenMai().')">
                                    </div>
                                    <div class="col-3 col-lg-2 d-flex justify-content-center align-items-center">
                                        <h6 id="giaTongSoLuongSP'.$id.'" class="" style="color: #1E656D">'.number_format($soLuong*$sanPham->getGiaKhuyenMai(), 0, ',', '.').'</h6><br>
                                    </div>
                                    <div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
                                        <button onclick="xoa(\''.$id.'\')" class=" border-0 ps-3 pe-3 pt-0 pb-0 btn-giohang-xoa "style="font-weight: bold ;border-radius: 10px;">Xoá</button>
                                    </div>
                                    
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
                    <h6 id="tongTienGioHang1" class="pe-3" style="text-align: right;"> <?php echo number_format($tongGioHang, 0, ',', '.'); ?> </h6>
                    <h6 class="ps-3" style="float: left;">Thành tiền</h6>
                    <h6 id="tongTienGioHang2" class="pe-3" style="text-align: right;color: #1E656D; font-size: 24px;"><?php echo number_format($tongGioHang, 0, ',', '.'); ?> </h6>
                </h6>
                <a href="./dathang.php" class="d-grid gap-2 mt-2">
                    <button  class="border-0 ms-3 me-3 pt-2 pb-2 btn-giohang-dathang" style="border-radius: 20px;">Đặt Hàng</button>
                </a>
                
            </div>
        </div>
  </div>
</div>
<?php include "./footer.php" ?>
