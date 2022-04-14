<?php include "./header.php" ?>

<div class="d-flex justify-content-center">
    <div class="border border-dark p-3" style="width: 800px; background-color: var(--third-color)">
        <p class="h5 mb-3 text-white">Đăng nhập</p>
        <input type="text" class="form-control mb-3" placeholder="Nhập tên đăng nhập">
        <input type="text" class="form-control mb-3" placeholder="Nhập mật khẩu">
        <button type="button" class="btn mb-3" style="border:none; background-color: var(--second-color); color: var(--dark-color)">Đăng nhập</button>
        <p class="text-white ">Bạn chưa có tài khoản? <a href="./register.php" class="link-primary">Đăng ký</a></p>
    </div>
</div>

<?php include "./footer.php" ?>