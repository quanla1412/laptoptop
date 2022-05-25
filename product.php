<?php include "./header.php";
    $id = $_GET['id'];
    $sanPham = laySanPham($id);
?>

<script>
    function cong(){
        var t = document.getElementById("quantity").value;
        document.getElementById("quantity").value = parseInt(t)+1;
    }

    function tru(){
        var t = document.getElementById("quantity").value;
        if(parseInt(t)>1){
            document.getElementById("quantity").value = parseInt(t)-1;
        }
    }
    function formSubmit(){
        if (confirm("Bạn muốn Thêm vào Giỏ Hàng") == true) {
            document.forms["myForm"].submit();
        } else {
            // window.location="./collections.php";
        }    
    }
</script>

<div class="container-xl">
    <div class="row">
        <div class="col-8">
            <div class="row mb-3">
                <div class="container-fluid p-3 d-flex justify-content-center" style="background-color: var(--gray-color)">
                    <img src="<?php echo $sanPham->getAnh();?>" alt="item1" class="w-50">
                </div>
            </div>
            <div class="row">
                <div class="container-fluid p-3" style="background-color: var(--gray-color)">
                    <div class="row mb-3">
                        <p class="h5">Cấu hình chi tiết</p>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="row">
                                <p class="h6">Vi xử lý(CPU)</p>
                            </div>
                            <div class="row">
                                <p><?php echo $sanPham->getCPU();?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <p class="h6">RAM</p>
                            </div>
                            <div class="row">
                                <p><?php echo $sanPham->getRAM();?> GB</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="row">
                                <p class="h6">Ổ cứng</p>
                            </div>
                            <div class="row">
                                <p><?php echo $sanPham->getOCung();?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <p class="h6">Cấu hình khác</p>
                            </div>
                            <div class="row">
                                <p><?php echo $sanPham->getCauHinhKhac();?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="h5">Bảo hành</p>
                        <p>Bảo hành 24 tháng tại của hàng mua tính từ ngày mua</p>
                    </div>
                    <div class="row">
                        <p class="h5">Mô tả sản phẩm</p>
                        <iframe width="600" height="500" src="<?php echo $sanPham->getYoutube();?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">            
            <div class="container-fluid p-3 sticky-top ps-5" style="background-color: var(--gray-color)">
                <h4><?php echo $sanPham->getTenSP();?></h4>
                <p>Mã: <?php echo $sanPham->getMaSP();?></p>
                <p class="h5">Thông tin máy</p>
                <ul>
                    <li>Hãng: <?php echo $sanPham->getTenHang();?></li>
                    <li>Tình trạng máy: Mới</li>
                    <li>Màu sắc: <?php echo $sanPham->getMauSac();?></li>
                    <li>Bảo hành: 24 tháng</li>
                </ul>
                <p>Còn lại: <?= $sanPham->getTongSoLuong() ?> sản phẩm</p>
                <div class="row">
                    <div class="col-4 d-flex align-items-center">
                        Số lượng: 
                    </div>
                    <div class="col d-flex mb-3">
                        <input type="button" class="btn-quantity d-flex justify-content-center align-items-center mt-3" style="background-color: white; border-radius: 30px 0 0 30px; border-right: 1px solid var(--gray-color)" onclick="tru()" value="-"/>
                        <form action="./xulythemgiohang.php?id=<?= $_GET['id'] ?>" method="POST" name="myForm">
                            <input type="text" name="quantity" id="quantity" class="d-flex justify-content-center align-items-center m-0 p-1 mt-3" style="background-color: white; width:36px; justify-content: center" value="1" readonly/>
                        </form>
                        <input type="button" class="btn-quantity d-flex justify-content-center align-items-center mt-3" style="background-color: white; border-radius:  0 30px 30px 0; border-left: 1px solid var(--gray-color)" onclick="cong()" value="+"/>
                    </div>
                </div>
                <p class="h5 text-decoration-line-through"><?php echo $sanPham->xuLyGia();?> đ</p>
                <p class="h3 mb-3" style="color: var(--third-color)"><?php echo $sanPham->xuLyGiaKhuyenMai();?> đ</p>
                <input type="submit" class="pt-2 pb-2 ps-5 pe-5 btn btn-giohang-dathang rounded" value="Thêm vào giỏ hàng" onclick="formSubmit()"/>
            </div>
        </div>
    </div>
</div>

<?php include "./footer.php" ?>