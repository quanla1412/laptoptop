<?php
    $severname = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    if(isset($_COOKIE['tenuser'])){
        $tenuser=$_COOKIE['tenuser'];
        $conn = new mysqli($severname, $username, $password, $dbname);
        if($conn->connect_error) {
            die('Connection failed: '. $conn->connect_error);
        }
        $sql="SELECT * FROM quantri WHERE TenDangNhap= '$tenuser'";
        $result = $conn->query($sql);
        while($row= mysqli_fetch_assoc($result)){
            $capbac=$row['CapBac'];
        }
        if($capbac!='giamdoc'){
            ?>
                <script>alert('lỗi')</script>
        <?php
            header( "refresh:0 ; url=http://localhost:8080/laptoptop/index.php" );
        }
    }else{
        ?>
            <script>alert('lỗi1')</script>
    <?php
        header( "refresh:0 ; url=http://localhost:8080/laptoptop/index.php" );
    }
?>
<?php include "./header.php" ?>
<?php

    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_GET['search']))
    {
        $key=$_GET['search'];
        $sql="SELECT COUNT(MaKH) AS total FROM khachhang WHERE MaKH LIKE '%$key%' OR TenDangNhap LIKE '%$key%' ";
    }
    else{
    $sql = "SELECT COUNT(MaKH) AS total FROM khachhang";
    }
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit =8;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
     
    $start = ($current_page - 1) * $limit;
    if(isset($_GET['search']))
    {
        $result = $conn->query("SELECT * FROM khachhang WHERE MaKH LIKE '%$key%' OR TenDangNhap LIKE '%$key%' LIMIT $start, $limit");
    }
    else{
        $result = $conn->query("SELECT * FROM khachhang LIMIT $start, $limit");
    }
      
?>

<div class="container-fluid px-4">
    <div class="row mb-3">
            <form action=""method=GET class="row">
            <div class="col-10">
            <span class="h6 me-2">Bộ lọc:</span>
            <input type="text" name="search" id="" class="form-control w-75 d-inline-block" placeholder="Nhập mã KH hoặc tên đăng nhập">
            </div>
            <input class="col-2 d-flex align-items-center btn-qldh-timkiem" type="submit" value="Tìm Kiếm">
            </form>
        
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Mã KH</th>
            <th scope="col">Tên đăng nhập</th>
            <th scope="col">Mật Khẩu</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Ngày Sinh</th>
            <th scope="col">Email</th>
            <th scope="col">Chỉnh sửa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row= mysqli_fetch_assoc($result)){
                    $makh= $row['MaKH'];
                    $tendangnhap= $row['TenDangNhap'];
                    $hoten= $row['HoTen'];
                    $sdt= $row['SoDienThoai'];
                    $ngaysinh= $row['NgaySinh'];
                    $email= $row['Email'];
                    
                    $resul = $conn->query("SELECT MatKhau FROM taikhoan WHERE TenDangNhap = '$tendangnhap'");
                    while($tow= mysqli_fetch_assoc($resul)){
                        $matkhau= $tow['MatKhau'];
                    }
            ?>
        <tr>
                <th scope="row"><?= $makh ?></th>
                <td><?= $tendangnhap ?></td>
                <td><?= $matkhau ?></td>
                <td><?= $hoten ?></td>
                <td><?= $sdt ?></td>
                <td><?= $ngaysinh ?></td>
                <td><?= $email ?></td>
                <td class="edit-admin-acc"><a class="text-dark" href="suauser.php?makh=<?=$makh?>&tenuser=<?=$tendangnhap?>">Chỉnh sửa</a></td>
                
            </tr>
            <?php } 
            $conn->close();
            ?>
            
            <!-- <tr>
                <th scope="row">KH01</th>
                <td>phgnhatan</td>
                <td>0912639068</td>
                <td>0912639068</td>
                <td>tanphan250102@gmail.com</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">KH01</th>
                <td>phgnhatan</td>
                <td>0912639068</td>
                <td>0912639068</td>
                <td class="align-middle" rowspan="2">tanphan250102@gmail.com</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">KH01</th>
                <td>phgnhatan</td>
                <td>0912639068</td>
                <td>0912639068</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">KH01</th>
                <td>phgnhatan</td>
                <td>0912639068</td>
                <td>0912639068</td>
                <td>tanphan250102@gmail.com</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">KH01</th>
                <td>phgnhatan</td>
                <td>0912639068</td>
                <td>0912639068</td>
                <td>tanphan250102@gmail.com</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">KH01</th>
                <td>phgnhatan</td>
                <td>0912639068</td>
                <td>0912639068</td>
                <td>tanphan250102@gmail.com</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr>
            <tr>
                <th scope="row">KH01</th>
                <td>phgnhatan</td>
                <td>0912639068</td>
                <td>0912639068</td>
                <td>tanphan250102@gmail.com</td>
                <td class="edit-admin-acc">Chỉnh sửa</td>
            </tr> -->
        </tbody>
    </table>
    <div class="pagination d-flex justify-content-center mt-4">
           <?php
            if($total_page == 1){}
                else{
                    if($total_page!=0) {
                        echo '<li class="page-item ';
                        if($current_page<=1) echo 'disabled';
                        echo'">
                            <a class="page-link" href="taikhoanuser.php?page='.($current_page-1).'&search='.$key.'">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>';
                    }
                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++){
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page){
                            echo '<li class="page-item active"><a class="page-link" href="taikhoanuser.php?page='.$i.'&search='.$key.'">'.$i.'</a></li>';
                        }
                        else{
                            echo '<li class="page-item "><a class="page-link" href="taikhoanuser.php?page='.$i.'&search='.$key.'">'.$i.'</a></li>';
                        }
                    }
        
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if($total_page!=0) {
                        echo '<li class="page-item ';
                        if($current_page >= $total_page) echo 'disabled';
                        echo'">
                            <a class="page-link" href="taikhoanuser.php?page='.($current_page+1).'&search='.$key.'">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>';
                    }
                }
           ?>
        </div>    
    <!-- <div class="d-flex justify-content-center mt-4">
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
    </div> -->
</div>

<?php include "./footer.php" ?>