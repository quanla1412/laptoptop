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
                <script>alert('Vui lòng Đăng Nhập bằng Tài Khoản Admin')</script>
        <?php
            header( "refresh:0 ; url=../logout.php" );
        }
    }else{
        ?>
            <script>alert('Vui lòng Đăng Nhập bằng Tài Khoản Admin')</script>
    <?php
        header( "refresh:0 ; url=../login.php" );
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
            $sql="SELECT COUNT(MaAdmin) AS total FROM quantri WHERE MaAdmin LIKE '%$key%' OR TenDangNhap LIKE '%$key%' ";
        }
        else{
        $sql = "SELECT COUNT(MaAdmin) AS total FROM quantri";
        }
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];//tổng số lượng trên database
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;//trang hiện tại 
        $limit =10;//giời hạn số lượng trên trang
        $total_page = ceil($total_records / $limit);//tổng số trang
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        
        $start = ($current_page - 1) * $limit;
        if(isset($_GET['search']))
        {
            $result = $conn->query("SELECT * FROM quantri WHERE MaAdmin LIKE '%$key%' OR TenDangNhap LIKE '%$key%' LIMIT $start, $limit");
        }
        else{
            $result = $conn->query("SELECT * FROM quantri LIMIT $start, $limit");
    }
        
?>

<div class="container-fluid px-4">
    <div class="row mb-3">
            <form action=""method=GET class="row">
                <div class="col-10">
                <span class="h6 me-2">Bộ lọc:</span>
                <input type="text" name="search" id="" class="form-control w-75 d-inline-block" placeholder="Nhập mã Admin hoặc tên đăng nhập">
                </div>
                <input class="col-2 d-flex align-items-center btn-qldh-timkiem" type="submit" value="Tìm Kiếm">
            </form>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Mã Admin</th>
            <th scope="col">Tên đăng nhập</th>
            <th scope="col">Mật Khẩu</th>
            <th scope="col">Cơ sở</th>
            <th scope="col">Cấp bậc</th>
            <th scope="col">Chỉnh sửa</th>
            </tr>
        </thead>
        <tbody>
        <?php
                while($row= mysqli_fetch_assoc($result)){
                    $MaAdmin= $row['MaAdmin'];
                    $tendangnhap= $row['TenDangNhap'];
                    $CapBac= $row['CapBac'];
                    $macs= $row['MaCS'];
                    
                    $resul = $conn->query("SELECT MatKhau FROM taikhoan WHERE TenDangNhap = '$tendangnhap'");
                    while($tow= mysqli_fetch_assoc($resul)){
                        $matkhau= $tow['MatKhau'];
                    }
            ?>
        <tr>
                <th scope="row"><?= $MaAdmin ?></th>
                <td><?= $tendangnhap ?></td>
                <td><?= $matkhau ?></td>
                <td><?= $macs ?></td>
                <td><?= $CapBac ?></td>
                <td class="edit-admin-acc"><a class="text-dark" href="suaAdmin.php?maad=<?=$MaAdmin?>&tenadmin=<?=$tendangnhap?>">Chỉnh sửa</a></td>
            </tr>
            <?php } 
            $conn->close();
            ?>
            
            <!-- <tr>
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
            </tr> -->
        </tbody>
    </table> 
    <div class="pagination d-flex justify-content-center mt-4">
           <?php
           if($total_page == 0){
            echo '<div class="p-5 mt-5">
            <div class="d-flex justify-content-center">
                <img class="" alt="" src="https://firebasestorage.googleapis.com/v0/b/mongcaifood.appspot.com/o/no-products-found.png?alt=media&amp;token=2f22ae28-6d48-49a7-a36b-e1a696618f9c" loading="lazy" decoding="async">
            </div> <br>
            <div class="d-flex justify-content-center">Không tìm thấy sản phẩm nào</div>
        </div> ';}
           if($total_page != 1){
                if($total_page!=0) {
                    echo '<li class="page-item ';
                    if($current_page<=1) echo 'disabled';
                    echo'">
                        <a class="page-link" href="taikhoanadmin.php?page='.($current_page-1).'&search='.$key.'">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>';
                }
        
                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++){
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page){
                        echo '<li class="page-item active"><a class="page-link text-dark" href="taikhoanadmin.php?page='.$i.'&search='.$key.'">'.$i.'</a></li>';
                    }
                    else{
                        echo '<li class="page-item "><a class="page-link text-dark" href="taikhoanadmin.php?page='.$i.'&search='.$key.'">'.$i.'</a></li>';
                    }
                }
    
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if($total_page!=0) {
                    echo '<li class="page-item ';
                    if($current_page >= $total_page) echo 'disabled';
                    echo'">
                        <a class="page-link" href="taikhoanadmin.php?page='.($current_page+1).'&search='.$key.'">
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