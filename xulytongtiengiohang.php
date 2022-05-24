<?php
    $tenDangNhap = $_COOKIE["tenuser"];
    $id = $_GET['id'];
    $bien = $_GET['bien'];


    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT giohang.TenDangNhap, giohang.MaSP, giohang.SoLuong, sanpham.GiaKhuyenMai 
            FROM giohang, sanpham
            WHERE giohang.MaSP = sanpham.MaSP";
    $result = $conn->query($sql) or die($conn->error);
    $tongGioHang = 0;


    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['TenDangNhap'] == $tenDangNhap){
                if($row['MaSP'] == $id && $bien == 1 ){
                    $tongGioHang += ($row['SoLuong']+1)*$row['GiaKhuyenMai'];
                }
                elseif ($row['MaSP'] == $id && $bien == 0) {
                    $tongGioHang += ($row['SoLuong']-1)*$row['GiaKhuyenMai'];
                }
                elseif ($row['MaSP'] == $id && $bien == 2) {
                    $tongGioHang += 0;
                }
                else{
                    $tongGioHang += $row['SoLuong']*$row['GiaKhuyenMai'];
                }
            }
        }
    }


    echo number_format($tongGioHang, 0, ',', '.');
    $conn->close();
    exit();

    
?>