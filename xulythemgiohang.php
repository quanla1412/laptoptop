<?php 
    $id = $_GET['id'];
    $qtys = $_POST["quantity"];
    $tenDangNhap = $_COOKIE["tenuser"];


    $servername = "localhost";
    $username = "laptoptop";
    $password = "laptoptop";
    $dbname = "laptoptop";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $sql = "SELECT * FROM giohang";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['TenDangNhap'] == $tenDangNhap && $row['MaSP'] == $id){
                $qtys += $row['SoLuong'];
                $sql = "UPDATE giohang
                SET SoLuong = '$qtys'
                WHERE TenDangNhap = '$tenDangNhap' AND MaSP = '$id'";
                $result = $conn->query($sql);
                $conn->close();
                header("Location: ./collections.php");
                exit();
            }
        }
        $sql = "INSERT INTO  giohang (TenDangNhap, MaSP, SoLuong)
        VALUES ('$tenDangNhap', '$id', '$qtys')";
        $result = $conn->query($sql);
        $conn->close();
        header("Location: ./collections.php");
        exit();

    }
    else{
        $sql = "INSERT INTO  giohang (TenDangNhap, MaSP, SoLuong)
        VALUES ('$tenDangNhap', '$id', '$qtys')";
        $result = $conn->query($sql);
        $conn->close();
        header("Location: ./collections.php");
        exit();
    }
?>
