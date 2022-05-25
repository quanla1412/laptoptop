<?php 
    $id = $_GET['id'];
    $gia = $_GET['gia'];    
    $tenDangNhap = $_COOKIE["tenuser"];


    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM giohang";
    $result = $conn->query($sql) or die($conn->error);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['TenDangNhap'] == $tenDangNhap && $row['MaSP'] == $id){
                $qtys = $row['SoLuong'] + 1;
                $sql = "UPDATE giohang
                SET SoLuong = '$qtys'
                WHERE TenDangNhap = '$tenDangNhap' AND MaSP = '$id'";
                $result = $conn->query($sql);
                echo number_format($gia*$qtys, 0, ',', '.');
                $conn->close();
                exit();
            }
        }
    }
?>