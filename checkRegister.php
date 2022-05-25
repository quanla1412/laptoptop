<?php 
    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";        
        
    $conn = new mysqli($servername, $username, $password, $dbname);

    if(isset($_REQUEST['username'])) {
        $username = $_REQUEST['username'];
        $sql= "SELECT * FROM taikhoan WHERE TenDangNhap = '$username' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo 'Tên đăng nhập đã được sử dụng';
        } else {
            echo "";
        }
    }

    if(isset($_REQUEST['sdt'])) {
        $sdt = $_REQUEST['sdt'];
        $sql= "SELECT * FROM khachhang WHERE SoDienThoai='$sdt' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo 'Số điện thoại đã được sử dụng';
        } else {
            echo "";
        }
    }

    if(isset($_REQUEST['email'])) {
        $email = $_REQUEST['email'];
        $sql= "SELECT * FROM khachhang WHERE Email='$email' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo 'Số điện thoại đã được sử dụng';
        } else {
            echo "";
        }
    }


?>