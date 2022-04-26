<?php include "./header.php" ?>

<div class="container-fluid px-4">
    <div class="row rounded mb-3">
        <div class="qldh-nav col-3 border border-1 p-2 d-flex justify-content-center fw-bold active">Chưa thanh toán</div>
        <div class="qldh-nav col-3 border border-1 p-2 d-flex justify-content-center fw-bold">Đang xử lý</div>
        <div class="qldh-nav col-3 border border-1 p-2 d-flex justify-content-center fw-bold">Đã hoàn thành</div>
        <div class="qldh-nav col-3 border border-1 p-2 d-flex justify-content-center fw-bold">Đã hủy</div>
    </div>
    <div class="row ">
        <div class="col-6">
            <span class="h6 me-2">Bộ lọc:</span>
            <input type="text" name="" id="" class="form-control w-75 d-inline-block" placeholder="Nhập mã đơn hàng">
        </div>
        <div class="col-2 d-flex align-items-center">
                <div class="btn-qldh-timkiem w-100">Tìm kiếm</div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Cơ sở</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
            </tr>
            <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
            </tr>
            <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
            </tr>
            <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
            </tr>
            <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
            </tr>
            <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
            </tr>
            <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
            </tr>
            <tr>
                <th scope="row">20042022</th>
                <td>AN520212022</td>
                <td>CSC</td>
                <td>1</td>
                <td>22.000.000 VND</td>
                <td>22.000.000 VND</td>
                <td class="text-danger">Chưa thanh toán</td>
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