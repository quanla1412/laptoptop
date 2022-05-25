<?php
    $tenDangNhap = $_COOKIE["tenuser"];
    $diaChi = $_POST['diachi'];

    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT khachhang.MaKH, giohang.TenDangNhap, giohang.MaSP, giohang.SoLuong  
            FROM giohang, khachhang
            WHERE giohang.TenDangNhap = khachhang.TenDangNhap AND giohang.TenDangNhap = '$tenDangNhap'";
    $result = $conn->query($sql) or die($conn->error);

    if($result->num_rows >0){
        $row = $result->fetch_assoc();
        $thGian = date("Y/m/d");
        $maKH = $row['MaKH'];
        

        $sql = "INSERT INTO  hoadon (MaKH, Ngay, TinhTrang,DiaChi)
                VALUES ($maKH, '$thGian' , 1,'$diaChi')";
        $result = $conn->query($sql);

        $sql = "SELECT MAX(MaHD) FROM hoadon";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $maHD = $row['MAX(MaHD)'];

        $sql = "SELECT *
                FROM giohang
                WHERE TenDangNhap = '$tenDangNhap'";
        $result = $conn->query($sql) ;
        // var_dump($result->num_rows);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $maSP =$row['MaSP'];
                $soLuong = $row['SoLuong'];
                $sql1 = "INSERT INTO  cthd (MaHD, MaSP, SoLuong)
                        VALUES ($maHD, '$maSP', $soLuong)";
                $result1 = $conn->query($sql1);
            }
        }

        $sql = "DELETE FROM giohang WHERE giohang.TenDangNhap = '$tenDangNhap'";
        $result = $conn->query($sql);
        $conn->close();
        header("Location: ./giohang.php");
        exit();
    }
    else{
        header("Location: ./giohang.php");
    }
?>