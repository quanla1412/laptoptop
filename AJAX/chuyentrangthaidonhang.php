<?php 
    $id = $_GET['IdHoaDon'];
    $tenDangNhap = $_COOKIE["tenuser"];

    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    
            
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT *
            FROM hoadon";
    $result = $conn->query($sql);
    
    $sql = "UPDATE hoadon
            SET TinhTrang = 2
            WHERE MaHD = $id";
    $result = $conn->query($sql);
    $conn->close();
    exit();
?>