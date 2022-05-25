<?php
    $id = $_GET['IdDoaDon'];
    $tenDangNhap = $_COOKIE["tenuser"];

    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    
            
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "UPDATE hoadon
            SET TinhTrang = 2
            WHERE MaHD = $id";
    $result = $conn->query($sql);

    $conn->close();
    // header("Location: ./lsdonhang.php");
    exit();
?>