<?php include "./header.php"?>
    <!-- Slider -->
    <div class="slider container-xl" >
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="max-height:400px">
                <div class="carousel-item active">
                    <img src="./assets/image/slider/slider1.png" class="d-block w-100" alt="Slider1">
                </div>
                <div class="carousel-item">
                    <img src="./assets/image/slider/slider2.png" class="d-block w-100" alt="Slider2">
                </div>
                <div class="carousel-item">
                    <img src="./assets/image/slider/slider3.png" class="d-block w-100" alt="Slider3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>  
    </div>

    <!-- Content 1 -->
    <div class="content1 container-xl mt-5">
        <div class="card text-center">
            <div class="card-header fw-bold fs-4 text-white" style="background-color: var(--third-color);">Máy tính DELL</div>
            <div class="card-body">
                <div class="row">
                    <div class="d-none col-lg-3 d-lg-block">
                        <img src="./assets/image/logo/logo-dell.jpg" alt="itemsale1" class="w-100">
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <?php
                                $danhSachSanPham = randomSanPham(filter(tenHang: array('DELL')), 4);

                                for($i=0; $i<4; $i++){
                                    echo '
                                    <div class="';
                                    if($i >= 2) echo'd-none d-md-block ';
                                    echo'col-6 col-md-3 d-flex align-items-stretch">
                                        <div class="card" style="width: 100%;">
                                            <img src="'.$danhSachSanPham[$i]->getAnh().'" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title" style="height: 72px;">'.$danhSachSanPham[$i]->getTenSP().'</h5>
                                                <p class="card-text">'.$danhSachSanPham[$i]->xuLyGia().' đ</p>
                                                <a href="./product.php?id='.$danhSachSanPham[$i]->getMaSP().'" class="btn btn-primary" style="background-color: var(--third-color)">Mua ngay</a>
                                            </div>    
                                        </div>
                                    </div>';
                                }
                            ?>                            
                        </div>
                        <div class="row mt-3 mx-1">
                            <div class="nav-more col pe-0">
                                <button type="button" class="btn btn-outline-secondary float-end" ><a href="./collections.php?tenHang[]=DELL" class="text-dark">Xem thêm</a></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted" style="background-color: var(--third-color);"></div>
        </div>
    </div>

    
    <!-- Content 2 -->
    <div class="content1 container-xl mt-5">
        <div class="card text-center">
            <div class="card-header fw-bold fs-4 text-white" style="background-color: var(--third-color);">Máy tính ASUS</div>
            <div class="card-body">
                <div class="row">
                    <div class="d-none col-lg-3 d-lg-block">
                        <img src="./assets/image/logo/logo-asus.jpg" alt="itemsale1" class="w-100">
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <?php
                                $danhSachSanPham = randomSanPham(filter(tenHang: array('ASUS')), 4);

                                for($i=0; $i<4; $i++){
                                    echo '
                                    <div class="';
                                    if($i >= 2) echo'd-none d-md-block ';
                                    echo'col-6 col-md-3 d-flex align-items-stretch">
                                        <div class="card" style="width: 100%;">
                                            <img src="'.$danhSachSanPham[$i]->getAnh().'" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title" style="height: 72px;">'.$danhSachSanPham[$i]->getTenSP().'</h5>
                                                <p class="card-text">'.$danhSachSanPham[$i]->xuLyGia().' đ</p>
                                                <a href="./product.php?id='.$danhSachSanPham[$i]->getMaSP().'" class="btn btn-primary" style="background-color: var(--third-color)">Mua ngay</a>
                                            </div>    
                                        </div>
                                    </div>';
                                }
                            ?>
                            
                        </div>
                        <div class="row mt-3 mx-1">
                            <div class="nav-more col pe-0">
                                <button type="button" class="btn btn-outline-secondary float-end" ><a href="./collections.php?tenHang[]=ASUS" class="text-dark">Xem thêm</a></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted" style="background-color: var(--third-color);"></div>
        </div>
    </div>
<?php include "./footer.php" ?>