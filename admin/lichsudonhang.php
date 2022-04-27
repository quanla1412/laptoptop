<?php include "./header.php" ?>

<div class="container-fluid px-4">
    <div class="row mb-2">
        <div class="col-4">
            <span class="h6 me-2">Bộ lọc:</span>
            <input type="text" name="" id="" class="form-control w-75 d-inline-block" placeholder="Nhập mã hóa đơn">
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-3 d-flex align-items-center"><p class="h6">Khoảng thời gian: </p></div>
                <div class="col-9">
                    <input type="date" class="form-control d-inline-block" placeholder="Từ" style="width: 136px; ">
                    <p class="d-none d-lg-inline-block fw-bold mx-2" >~</p>
                    <input type="date" class="form-control d-inline-block" placeholder="Đến" style="width: 136px; " >
                </div>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center">
                <div class="btn-qldh-timkiem w-100">Tìm kiếm</div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Thời gian</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" rowspan="3" class="align-middle">22451225</th>
                <td>AN520212022</td>
                <td>Acer Nitro 3</td>
                <td>22.000.000 VN</td>
                <td>1</td>
                <td rowspan="3" class="align-middle">22.000.000 VND</td>
                <td rowspan="3" class="align-middle">26 / 4 / 2022</td>
            </tr>
            <tr>
                <td>AA520212022</td>
                <td>Acer Nitro 4</td>
                <td>23.000.000 VN</td>
                <td>2</td>
            </tr>
            <tr>
                <td>AQ520212022</td>
                <td>Acer Nitro 5</td>
                <td>24.000.000 VN</td>
                <td>3</td>
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