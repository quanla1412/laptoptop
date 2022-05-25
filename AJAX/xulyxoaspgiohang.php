<?php 
    $id = $_GET['id'];
    $tenDangNhap = $_COOKIE["tenuser"];


    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM giohang";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['TenDangNhap'] == $tenDangNhap && $row['MaSP'] == $id){
                
                $sql = "DELETE FROM giohang
                WHERE TenDangNhap = '$tenDangNhap' AND MaSP = '$id'";
                $result = $conn->query($sql);
                
                $sql = "SELECT * FROM giohang";
                $result = $conn->query($sql);
                if($result->num_rows < 1) echo 'Giỏ hàng trống';
                $conn->close();
                exit();
            }
        }
    }
?>
