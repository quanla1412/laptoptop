<?php include "./header.php" ?>

<div class="d-flex justify-content-center">
    <div class="border border-dark p-3" style="width: 800px; background-color: var(--third-color)">
        <p class="h5 mb-3 text-white">Đăng ký</p>
        <input type="text" class="form-control mb-3" placeholder="Họ và tên">
        <input type="text" class="form-control mb-3" placeholder="Số điện thoại">
        <input type="date" class="form-control mb-3">
        <input type="email" class="form-control mb-3" placeholder="Email">
        <input type="text" class="form-control mb-3" placeholder="Tên đăng nhập">
        <input type="password" class="form-control mb-3" placeholder="Nhập mật khẩu">
        <input type="password" class="form-control mb-3" placeholder="Nhập lại mật khẩu">
        <button type="button" class="btn mb-3" style="border:none; background-color: var(--second-color); color: var(--dark-color)">Đăng ký</button>
        <p class="text-white ">Bạn đã có tài khoản? <a href="./login.php" class="link-primary">Đăng nhập</a></p>
    </div>
</div>

<?php include "./footer.php" ?>