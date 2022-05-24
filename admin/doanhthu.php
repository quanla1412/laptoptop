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
        if($capbac!='quanli'&&$capbac!='giamdoc'){
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

<div class="container-xl">
    <div class="row g-5">
        <div class="col-4">
            <div class="w-100 shadow p-3 text-center">
                <h5>Máy tính bán chạy nhất tháng</h5>
                <h6>Acer Nitro 5</h6>
                <p class="text-success">12 máy</p>
            </div>
        </div>
        
        <div class="col-4">
            <div class="w-100 shadow p-3 text-center">
                <h5>Máy tính nhập nhiều nhất tháng</h5>
                <h6>Acer Nitro 5</h6>
                <p class="text-success">20 máy</p>
            </div>
        </div>
        
        <div class="col-4">
            <div class="w-100 shadow p-3 text-center">
                <h5>Doanh thu của tuần</h5>
                <h6>So với cùng kỳ năm trước</h6>
                <p class="text-danger"> - 10.000.000 VND</p>
            </div>
        </div>
        
        <div class="col-4">
            <div class="w-100 shadow p-3 text-center">
                <h5>Doanh thu của tháng</h5>
                <h6>So với cùng kỳ năm trước</h6>
                <p class="text-success"> + 200.000.000 VND</p>
            </div>
        </div>
        
        <div class="col-4">
            <div class="w-100 shadow p-3 text-center">
                <h5>Doanh thu của quý</h5>
                <h6>So với cùng kỳ năm trước</h6>
                <p class="text-success"> + 50.000.000 VND</p>
            </div>
        </div>
        
        <div class="col-4">
            <div class="w-100 shadow p-3 text-center">
                <h5>Doanh thu của năm</h5>
                <h6>So với năm trước</h6>
                <p class="text-danger"> - 300.000.000 VND</p>
            </div>
        </div>
    </div>

    
</div>

<?php include "./footer.php" ?>