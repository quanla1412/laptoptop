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
                    <p class="d-inline-block fw-bold mx-2" >~</p>
                    <input type="text" class="form-control d-inline-block" placeholder="Đến" style="width: 80px; " >
                </div>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center">
                <div class="btn-qldh-timkiem w-100">Tìm kiếm</div>
        </div>
    </div>
    <div class="d-flex mb-3">
        <div class="btn-suasp me-2">Nhập hàng</div>
        <div class="btn-themsp">Thêm sản phẩm</div>
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
                <td class="text-sucess">Còn hàng</td>
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
                <td class="text-sucess">Còn hàng</td>
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
                <td class="text-sucess">Còn hàng</td>
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
                <td class="text-sucess">Còn hàng</td>
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