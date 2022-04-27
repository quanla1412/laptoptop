<?php include "./header.php";
    $id = $_GET['id'];
    $sanPham = laySanPham($id);
?>

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
                <p>Còn lại: 5 sản phẩm</p>
                <div class="row">
                    <div class="col-4 d-flex align-items-center">
                        Số lượng: 
                    </div>
                    <div class="col d-flex mb-3">
                        <div class="btn-quantity d-flex align-items-center m-0 py-1 px-2 mt-3" style="background-color: white; height:25px; border-radius: 30px 0 0 30px; border-right: 1px solid var(--gray-color)">-</div>
                        <div class="d-flex justify-content-center align-items-center m-0 p-1 mt-3" style="background-color: white; width:36px; height:25px; justify-content: center"><?php $quantity = 1; echo $quantity?></div>
                        <div class="btn-quantity d-flex align-items-center m-0 py-1 px-2 mt-3" style="background-color: white; height:25px; border-radius:  0 50px 50px 0; border-left: 1px solid var(--gray-color)">+</div>
                    </div>
                </div>
                <p class="h5 text-decoration-line-through"><?php echo $sanPham->xuLyGia();?> đ</p>
                <p class="h3 mb-3" style="color: var(--third-color)"><?php echo $sanPham->xuLyGiaKhuyenMai();?> đ</p>
                <button class="pt-2 pb-2 ps-5 pe-5 btn btn-giohang-dathang rounded"><a href="./collections.php">Thêm vào giỏ hàng</a></button>
            </div>
        </div>
    </div>
</div>

<?php include "./footer.php" ?>