<?php require "./header.php"; 
    require "../database/SanPham.php";

    $masp = $_GET['masp'];
    $sanpham = laySanPham($masp);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $severname = "localhost";
        $username = "laptoptop";
        $password = "laptoptop";
        $dbname = "laptoptop";
        $conn = new mysqli($severname, $username, $password, $dbname);
        if($conn->connect_error) {
            die('Connection failed: '. $conn->connect_error);
        }
        
        $sl_csc = intval($_POST['themslcsc']);
        $sl_cs1 = intval($_POST['themslcs1']);
        $sl_cs2 = intval($_POST['themslcs2']);
       
        $sql = "SELECT * FROM soluongsp WHERE MaSP = '$masp'";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['MaCS']=='csc') $sl_csc += intval($row['SoLuong']);
                elseif ($row['MaCS']=='cs1') $sl_cs1 += intval($row['SoLuong']);
                else $sl_cs2 += intval($row['SoLuong']);
            }
        }

        $sql_suacsc = "UPDATE soluongsp SET SoLuong = '$sl_csc' WHERE MaSP = '$masp' AND MaCS = 'csc'";
        $resultcsc = $conn->query($sql_suacsc);

        $sql_suacs1 = "UPDATE soluongsp SET SoLuong = '$sl_cs1' WHERE MaSP = '$masp' AND MaCS = 'cs1'";
        $resultcs1 = $conn->query($sql_suacs1);

        $sql_suacs2 = "UPDATE soluongsp SET SoLuong = '$sl_cs2' WHERE MaSP = '$masp' AND MaCS = 'cs2'";
        $resultcs2 = $conn->query($sql_suacs2);

        echo'<script>alert("Nhập hàng thành công");</script>';
        
        $conn->close();
    }
?>
   
<form action="./nhaphang.php?masp=<?=$_GET['masp']?>" method="post">
    <div class="modal-body">
        <div class="row g-3">
            <div class="col-lg-12">
                <p class="h5">Thông tin sản phẩm</p>
            </div>
            <div class="col-lg-6">
                <span class="h6">Tên: </span><span><?= $sanpham->getTenSP() ?></span>
            </div>
            <div class="col-lg-6">
                <span class="h6">Mã: </span><span><?= $sanpham->getMaSP() ?></span>
            </div>
            <div class="col-lg-12">
                <p class="h5">Nhập thêm số lượng</p>
            </div>
            <?php
                $severname = "localhost";
                $username = "laptoptop";
                $password = "laptoptop";
                $dbname = "laptoptop";
                $tenuser=$_COOKIE['tenuser'];
                $conn = new mysqli($severname, $username, $password, $dbname);
                if($conn->connect_error) {
                    die('Connection failed: '. $conn->connect_error);
                }
                $sql="SELECT * FROM quantri WHERE TenDangNhap= '$tenuser'";
                $result = $conn->query($sql);
                while($row= mysqli_fetch_assoc($result)){
                    $capbac= $row['CapBac'];
                    $macs= $row['MaCS'];
                }
            ?>
            <div class="col-lg-11 offset-lg-1">
                <div class="row d-flex align-items-baseline">
                    <label for="themslcsc" class="form-label col-lg-2">CSC</label>
                    <div class="col-lg-4">
                        <input type="number" min="0" value="0" class="form-control" id="themslcsc" name="themslcsc"<?php 
                        if($capbac =='giamdoc' || $macs =='csc'){}else{echo'disabled';}
                        ?>>
                    </div>
                </div>
            </div>
            <div class="col-lg-11 offset-lg-1">
                <div class="row d-flex align-items-baseline">
                    <label for="themslcs1" class="form-label col-lg-2">CS1</label>
                    <div class="col-lg-4">
                        <input type="number" min="0" value="0" class="form-control" id="themslcs1" name="themslcs1"<?php 
                        if($capbac =='giamdoc' || $macs =='cs1'){}else{echo'disabled';}
                        ?>>
                    </div>
                </div>
            </div>
            <div class="col-lg-11 offset-lg-1">
                <div class="row d-flex align-items-baseline">
                    <label for="themslcs2" class="form-label col-lg-2">CS2</label>
                    <div class="col-lg-4">
                        <input type="number" min="0" value="0" class="form-control" id="themslcs2" name="themslcs2"<?php 
                        if($capbac =='giamdoc' || $macs =='cs2'){}else{echo'disabled';}
                        ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>                           
    <div class="float-end">
        <button type="button" class="btn btn-secondary"><a href="./nhaphang.php?masp=<?=$_GET['masp']?>">Reset</a></button>
        <button type="submit" class="btn btn-admin">Lưu</button>
    </div>     
</form>

<?php require "./footer.php" ?>
