<?php include "./header.php" ?>

<div class="container-fluid px-4">
    <div class="row mb-3">
        <div class="col-10">
            <span class="h6 me-2">Bộ lọc:</span>
            <input type="text" name="" id="" class="form-control w-75 d-inline-block" placeholder="Nhập tên sản phẩm hoặc mã sản phẩm">
        </div>
        <div class="col-2 d-flex align-items-center">
                <div class="btn-qldh-timkiem w-100">Tìm kiếm</div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Mã Admin</th>
            <th scope="col">Tên đăng nhập</th>
            <th scope="col">Mật khẩu</th>
            <th scope="col">Cơ sở</th>
            <th scope="col">Cấp bậc</th>
            <th scope="col">Chỉnh sửa</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">AD01</th>
                <td>adtanphan</td>
                <td>123123</td>
                <td>CSC</td>
                <td>QL</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">AD01</th>
                <td>adtanphan</td>
                <td>123123</td>
                <td>CSC</td>
                <td>QL</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">AD01</th>
                <td>adtanphan</td>
                <td>123123</td>
                <td>CSC</td>
                <td class="align-middle" rowspan="2">QL</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">AD01</th>
                <td>adtanphan</td>
                <td>123123</td>
                <td>CSC</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">AD01</th>
                <td>adtanphan</td>
                <td>123123</td>
                <td>CSC</td>
                <td>QL</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">AD01</th>
                <td>adtanphan</td>
                <td>123123</td>
                <td>CSC</td>
                <td>QL</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">AD01</th>
                <td>adtanphan</td>
                <td>123123</td>
                <td>CSC</td>
                <td>QL</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">AD01</th>
                <td>adtanphan</td>
                <td>123123</td>
                <td>CSC</td>
                <td>QL</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
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