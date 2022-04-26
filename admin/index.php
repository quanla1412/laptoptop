<?php include "./header.php" ?>

<div class="container-fluid px-4">
    <div class="row mb-2">
        <div class="col-6">
            <span class="h6 me-2">Bộ lọc:</span>
            <input type="text" name="" id="" class="form-control w-75 d-inline-block" placeholder="Nhập tên sản phẩm hoặc mã sản phẩm">
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-4 d-flex align-items-center"><p class="h6">Khoảng giá: </p></div>
                <div class="col-8">
                    <input type="text" class="form-control d-inline-block" placeholder="Từ" style="width: 80px; ">
                    <p class="d-none d-lg-inline-block fw-bold mx-2" >~</p>
                    <input type="text" class="form-control d-inline-block" placeholder="Đến" style="width: 80px; " >
                </div>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center">
                <div class="btn-qldh-timkiem w-100">Tìm kiếm</div>
        </div>
    </div>
    <div class="d-flex mb-3">
        <button type="button" class="btn btn-themsp me-2" data-bs-toggle="modal" data-bs-target="#themsanpham">
            Thêm sản phẩm
        </button>
        <!-- Modal -->
        <div class="modal fade" id="themsanpham" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label for="masp" class="form-label">Mã SP</label>
                                    <input type="text" class="form-control" id="masp">
                                </div>
                                <div class="col-lg-6">
                                    <label for="tensp" class="form-label">Tên SP</label>
                                    <input type="text" class="form-control" id="tensp">
                                </div>
                                <div class="col-lg-12">
                                    <label for="tenhang" class="form-label">Tên hãng</label>
                                    <select id="tenhang" class="form-select">
                                    <option selected>ACER</option>
                                    <option>ASUS</option>
                                    <option>DELL</option>
                                    <option>GIGABYTE</option>
                                    <option>HP</option>
                                    <option>LG</option>
                                    <option>LENOVO</option>
                                    <option>MICROSOFT</option>
                                    <option>MSI</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label for="anhsp" class="form-label">Thêm ảnh</label>
                                    <input class="form-control" type="file" id="anhsp">
                                </div>
                                <div class="col-lg-4">
                                    <label for="cpu" class="form-label">CPU</label>
                                    <select id="cpu" class="form-select">
                                    <option selected>Core i3</option>
                                    <option>>Core i5</option>
                                    <option>Core i7</option>
                                    <option>Core i9</option>
                                    <option>Ryzen 3</option>
                                    <option>Ryzen 5</option>
                                    <option>Ryzen 7</option>
                                    <option>Ryzen 9</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="ram" class="form-label">Dung lượng Ram</label>
                                    <select id="ram" class="form-select">
                                    <option selected>4GB</option>
                                    <option>8GB</option>
                                    <option>16GB</option>
                                    <option>32GB</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="mausac" class="form-label">Màu sắc</label>
                                    <select id="mausac" class="form-select">
                                    <option selected>Trắng</option>
                                    <option>Đen</option>
                                    <option>Xám</option>
                                    <option>Bạc</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="ocung" class="form-label">Ổ cứng</label>
                                    <input type="text" class="form-control" id="ocung">
                                </div>
                                <div class="col-lg-6">
                                    <label for="youtube" class="form-label">Link youtube</label>
                                    <input type="text" class="form-control" id="youtube">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cauhinhkhac" class="form-label">Cấu hình khác</label>
                                    <textarea class="form-control" id="cauhinhkhac" rows="3"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label for="giagoc" class="form-label">Giá gốc</label>
                                    <input type="number" class="form-control" id="giagoc">
                                </div>
                                <div class="col-lg-6">
                                    <label for="giakm" class="form-label">Giá khuyến mãi</label>
                                    <input type="number" class="form-control" id="giakm">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-themsp me-2" data-bs-toggle="modal" data-bs-target="#suasanpham">
            Sửa sản phẩm
        </button>
        <!-- Modal -->
        <div class="modal fade" id="suasanpham" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label for="masp" class="form-label">Mã SP</label>
                                    <input type="text" class="form-control" id="masp">
                                </div>
                                <div class="col-lg-6">
                                    <label for="tensp" class="form-label">Tên SP</label>
                                    <input type="text" class="form-control" id="tensp">
                                </div>
                                <div class="col-lg-12">
                                    <label for="tenhang" class="form-label">Tên hãng</label>
                                    <select id="tenhang" class="form-select">
                                    <option selected>ACER</option>
                                    <option>ASUS</option>
                                    <option>DELL</option>
                                    <option>GIGABYTE</option>
                                    <option>HP</option>
                                    <option>LG</option>
                                    <option>LENOVO</option>
                                    <option>MICROSOFT</option>
                                    <option>MSI</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label for="anhsp" class="form-label">Thêm ảnh</label>
                                    <input class="form-control" type="file" id="anhsp">
                                </div>
                                <div class="col-lg-4">
                                    <label for="cpu" class="form-label">CPU</label>
                                    <select id="cpu" class="form-select">
                                    <option selected>Core i3</option>
                                    <option>>Core i5</option>
                                    <option>Core i7</option>
                                    <option>Core i9</option>
                                    <option>Ryzen 3</option>
                                    <option>Ryzen 5</option>
                                    <option>Ryzen 7</option>
                                    <option>Ryzen 9</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="ram" class="form-label">Dung lượng Ram</label>
                                    <select id="ram" class="form-select">
                                    <option selected>4GB</option>
                                    <option>8GB</option>
                                    <option>16GB</option>
                                    <option>32GB</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="mausac" class="form-label">Màu sắc</label>
                                    <select id="mausac" class="form-select">
                                    <option selected>Trắng</option>
                                    <option>Đen</option>
                                    <option>Xám</option>
                                    <option>Bạc</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="ocung" class="form-label">Ổ cứng</label>
                                    <input type="text" class="form-control" id="ocung">
                                </div>
                                <div class="col-lg-6">
                                    <label for="youtube" class="form-label">Link youtube</label>
                                    <input type="text" class="form-control" id="youtube">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cauhinhkhac" class="form-label">Cấu hình khác</label>
                                    <textarea class="form-control" id="cauhinhkhac" rows="3"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label for="giagoc" class="form-label">Giá gốc</label>
                                    <input type="number" class="form-control" id="giagoc">
                                </div>
                                <div class="col-lg-6">
                                    <label for="giakm" class="form-label">Giá khuyến mãi</label>
                                    <input type="number" class="form-control" id="giakm">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <button type="button" class="btn btn-suasp" data-bs-toggle="modal" data-bs-target="#nhaphang">
            Nhập hàng
        </button>
        <!-- Modal -->
        <div class="modal fade" id="nhaphang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nhập hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="masp" placeholder="Nhập mã sp">
                                </div>
                                <div class="col-lg-3">
                                    <div class="btn btn-admin">Tìm kiếm</div>
                                </div>
                                <div class="col-lg-12">
                                    <p class="h5">Thông tin sản phẩm</p>
                                </div>
                                <div class="col-lg-6">
                                    <span class="h6">Tên: </span><span>Acer Nitro 5</span>
                                </div>
                                <div class="col-lg-6">
                                    <span class="h6">Mã: </span><span>AN20212022</span>
                                </div>
                                <div class="col-lg-12">
                                    <p class="h5">Nhập thêm số lượng</p>
                                </div>
                                <div class="col-lg-11 offset-lg-1">
                                    <div class="row d-flex align-items-baseline">
                                        <label for="themslcsc" class="form-label col-lg-2">CSC</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="themslcsc">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-11 offset-lg-1">
                                    <div class="row d-flex align-items-baseline">
                                        <label for="themslcs1" class="form-label col-lg-2">CS1</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="themslcs1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-11 offset-lg-1">
                                    <div class="row d-flex align-items-baseline">
                                        <label for="themslcs2" class="form-label col-lg-2">CS2</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="themslcs2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>     
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Cơ sở</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng số lượng</th>
            <th scope="col">Tình trạng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" rowspan="3" class="align-middle">Acer Nitro 5</th>
                <td rowspan="3" class="align-middle">AN520212022</td>
                <td rowspan="3" class="align-middle">22.000.000 VND</td>
                <td>CSC</td>
                <td>1</td>
                <td rowspan="3" class="align-middle text-center">11</td>
                <td class="text-success">Còn hàng</td>
            </tr>
            <tr>
                <td>CS1</td>
                <td>1</td>
                <td class="text-danger">Hết hàng</td>
            </tr>
            <tr>
                <td>CS2</td>
                <td>1</td>
                <td class="text-success">Còn hàng</td>
            </tr>
            
            <tr>
                <th scope="row" rowspan="3" class="align-middle">Acer Nitro 5</th>
                <td rowspan="3" class="align-middle">AN520212022</td>
                <td rowspan="3" class="align-middle">22.000.000 VND</td>
                <td>CSC</td>
                <td>1</td>
                <td rowspan="3" class="align-middle text-center">11</td>
                <td class="text-success">Còn hàng</td>
            </tr>
            <tr>
                <td>CS1</td>
                <td>1</td>
                <td class="text-danger">Hết hàng</td>
            </tr>
            <tr>
                <td>CS2</td>
                <td>1</td>
                <td class="text-success">Còn hàng</td>
            </tr>
            <tr>
                <th scope="row" rowspan="3" class="align-middle">Acer Nitro 5</th>
                <td rowspan="3" class="align-middle">AN520212022</td>
                <td rowspan="3" class="align-middle">22.000.000 VND</td>
                <td>CSC</td>
                <td>1</td>
                <td rowspan="3" class="align-middle text-center">11</td>
                <td class="text-success">Còn hàng</td>
            </tr>
            <tr>
                <td>CS1</td>
                <td>1</td>
                <td class="text-danger">Hết hàng</td>
            </tr>
            <tr>
                <td>CS2</td>
                <td>1</td>
                <td class="text-success">Còn hàng</td>
            </tr>
            <tr>
                <th scope="row" rowspan="3" class="align-middle">Acer Nitro 5</th>
                <td rowspan="3" class="align-middle">AN520212022</td>
                <td rowspan="3" class="align-middle">22.000.000 VND</td>
                <td>CSC</td>
                <td>1</td>
                <td rowspan="3" class="align-middle text-center">11</td>
                <td class="text-success">Còn hàng</td>
            </tr>
            <tr>
                <td>CS1</td>
                <td>1</td>
                <td class="text-danger">Hết hàng</td>
            </tr>
            <tr>
                <td>CS2</td>
                <td>1</td>
                <td class="text-success">Còn hàng</td>
            </tr>
        </tbody>
    </table>    
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link text-dark" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link text-dark" href="#">1</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link text-dark" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>


<?php include "./footer.php" ?>