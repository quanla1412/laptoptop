<?php include "./header.php"?>

<div class="container-xl">
    <div class="row mb-3">
        <a class="btn btn-primary ms-2" data-bs-toggle="offcanvas" href="#boloc" role="button" aria-controls="boloc" style="width: 120px; background-color: var(--third-color);">
            Bộ lọc
        </a>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="boloc" aria-labelledby="offcanvasExampleLabel" style="width: 320px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Bộ lọc</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="">
                    <div class="row g-3 mb-3">
                        <div class="col-12 d-flex align-items-end"><p class="h6">Thương hiệu: </p></div>
                        <div class="col-6"><div class="btn btn-filter w-100 active">ACER</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">ASUS</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">DELL</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">GIGABYTE</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">HP</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">LG</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">LENOVO</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">MICROSOFT</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">MSI</div></div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-12 d-flex align-items-end"><p class="h6">Màu sắc: </p></div>
                        <div class="col-6"><div class="btn btn-filter w-100 active">Bạc</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">Trắng</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">Đen</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">Xám</div></div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-12 d-flex align-items-end"><p class="h6">CPU: </p></div>
                        <div class="col-6"><div class="btn btn-filter w-100 active">Core i3</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">Core i5</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">Core i7</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">Core i9</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">Ryzen 3</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">Ryzen 5</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">Ryzen 7</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">Ryzen 9</div></div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-12 d-flex align-items-end"><p class="h6">Dung lượng RAM: </p></div>
                        <div class="col-6"><div class="btn btn-filter w-100 active">4 GB</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">8 GB</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">16 GB</div></div>
                        <div class="col-6"><div class="btn btn-filter w-100">32 GB</div></div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-12 d-flex align-items-center"><p class="h6">Khoảng giá: </p></div>
                        <div class="col-12 d-flex overflow-scroll ps-0 align-items-center">
                            <input type="text" class="form-control d-inline-block" placeholder="Từ" style="width: 100px; ">
                            <p class="d-inline-block fw-bold mx-2" >~</p>
                            <input type="text" class="form-control d-inline-block" placeholder="Đến" style="width: 100px; " >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-filter">Tìm kiếm</button>
                </form>
            </div>
        </div>
        <div class="d-none d-md-block container-fluid rounded p-3" style="background-color: var(--gray-color)">
            <div class="row"><p class="h5">Bộ lọc: </p></div>
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-end"><p class="h6">Thương hiệu: </p></div>
                <div class="col-10 d-flex overflow-scroll ps-0 align-items-center">
                    <div class="me-1 btn btn-filter active">ACER</div>
                    <div class="me-1 btn btn-filter">ASUS</div>
                    <div class="me-1 btn btn-filter">DELL</div>
                    <div class="me-1 btn btn-filter">GIGABYTE</div>
                    <div class="me-1 btn btn-filter">HP</div>
                    <div class="me-1 btn btn-filter">LG</div>
                    <div class="me-1 btn btn-filter">LENOVO</div>
                    <div class="me-1 btn btn-filter">MICROSOFT</div>
                    <div class="me-1 btn btn-filter">MSI</div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-end"><p class="h6">Màu sắc: </p></div>
                <div class="col-10 d-flex overflow-scroll ps-0 align-items-center">
                    <div class="me-1 btn btn-filter active">Bạc</div>
                    <div class="me-1 btn btn-filter">Trắng</div>
                    <div class="me-1 btn btn-filter">Đen</div>
                    <div class="me-1 btn btn-filter">Xám</div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-end"><p class="h6">CPU:</p></div>
                <div class="col-10 d-flex overflow-scroll ps-0 align-items-center">
                    <div class="me-1 btn btn-filter active">Core i3</div>
                    <div class="me-1 btn btn-filter">Core i5</div>
                    <div class="me-1 btn btn-filter">Core i7</div>
                    <div class="me-1 btn btn-filter">Core i9</div>
                    <div class="me-1 btn btn-filter">Ryzen 3</div>
                    <div class="me-1 btn btn-filter">Ryzen 5</div>
                    <div class="me-1 btn btn-filter">Ryzen 7</div>
                    <div class="me-1 btn btn-filter">Ryzen 9</div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-end"><p class="h6">Dung lượng RAM: </p></div>
                <div class="col-10 d-flex overflow-scroll ps-0 align-items-center">
                    <div class="me-1 btn btn-filter active">4 GB</div>
                    <div class="me-1 btn btn-filter">8 GB</div>
                    <div class="me-1 btn btn-filter">16 GB</div>
                    <div class="me-1 btn btn-filter">32 GB</div>
                    <div class="me-1 btn btn-filter">64 GB</div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2 d-flex align-items-center"><p class="h6">Khoảng giá: </p></div>
                <div class="col-10 d-flex overflow-scroll ps-0 align-items-center">
                    <input type="text" class="form-control d-inline-block" placeholder="Từ" style="width: 100px; ">
                    <p class="d-inline-block fw-bold mx-2" >~</p>
                    <input type="text" class="form-control d-inline-block" placeholder="Đến" style="width: 100px; " >
                </div>
            </div>
            <div class="col offset-md-2">
                    <div class="me-1 btn btn-filter">Tìm kiếm</div>
            </div>
        </div>
    </div>
    <div class="row mb-3 gy-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" style="width: 100%;">
                <img src="./assets/image/product/item1.png" class="card-img-top" alt="item1">
                <div class="card-body">
                    <h5 class="card-title">Laptop Gaming Acer Aspire 7</h5>
                    <p class="card-text mb-0 text-decoration-line-through">19,990,000₫</p>
                    <p class="card-text fs-5">16,990,000₫</p>
                    <a href="#" class="btn btn-primary rounded-pill" style="background-color: var(--third-color)">Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" style="width: 100%;">
                <img src="./assets/image/product/item1.png" class="card-img-top" alt="item1">
                <div class="card-body">
                    <h5 class="card-title">Laptop Gaming Acer Aspire 7</h5>
                    <p class="card-text mb-0 text-decoration-line-through">19,990,000₫</p>
                    <p class="card-text fs-5">16,990,000₫</p>
                    <a href="#" class="btn btn-primary rounded-pill" style="background-color: var(--third-color)">Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" style="width: 100%;">
                <img src="./assets/image/product/item1.png" class="card-img-top" alt="item1">
                <div class="card-body">
                    <h5 class="card-title">Laptop Gaming Acer Aspire 7</h5>
                    <p class="card-text mb-0 text-decoration-line-through">19,990,000₫</p>
                    <p class="card-text fs-5">16,990,000₫</p>
                    <a href="#" class="btn btn-primary rounded-pill" style="background-color: var(--third-color)">Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" style="width: 100%;">
                <img src="./assets/image/product/item1.png" class="card-img-top" alt="item1">
                <div class="card-body">
                    <h5 class="card-title">Laptop Gaming Acer Aspire 7</h5>
                    <p class="card-text mb-0 text-decoration-line-through">19,990,000₫</p>
                    <p class="card-text fs-5">16,990,000₫</p>
                    <a href="#" class="btn btn-primary rounded-pill" style="background-color: var(--third-color)">Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" style="width: 100%;">
                <img src="./assets/image/product/item1.png" class="card-img-top" alt="item1">
                <div class="card-body">
                    <h5 class="card-title">Laptop Gaming Acer Aspire 7</h5>
                    <p class="card-text mb-0 text-decoration-line-through">19,990,000₫</p>
                    <p class="card-text fs-5">16,990,000₫</p>
                    <a href="#" class="btn btn-primary rounded-pill" style="background-color: var(--third-color)">Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" style="width: 100%;">
                <img src="./assets/image/product/item1.png" class="card-img-top" alt="item1">
                <div class="card-body">
                    <h5 class="card-title">Laptop Gaming Acer Aspire 7</h5>
                    <p class="card-text mb-0 text-decoration-line-through">19,990,000₫</p>
                    <p class="card-text fs-5">16,990,000₫</p>
                    <a href="#" class="btn btn-primary rounded-pill" style="background-color: var(--third-color)">Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" style="width: 100%;">
                <img src="./assets/image/product/item1.png" class="card-img-top" alt="item1">
                <div class="card-body">
                    <h5 class="card-title">Laptop Gaming Acer Aspire 7</h5>
                    <p class="card-text mb-0 text-decoration-line-through">19,990,000₫</p>
                    <p class="card-text fs-5">16,990,000₫</p>
                    <a href="#" class="btn btn-primary rounded-pill" style="background-color: var(--third-color)">Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" style="width: 100%;">
                <img src="./assets/image/product/item1.png" class="card-img-top" alt="item1">
                <div class="card-body">
                    <h5 class="card-title">Laptop Gaming Acer Aspire 7</h5>
                    <p class="card-text mb-0 text-decoration-line-through">19,990,000₫</p>
                    <p class="card-text fs-5">16,990,000₫</p>
                    <a href="#" class="btn btn-primary rounded-pill" style="background-color: var(--third-color)">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<?php include "./footer.php"?>