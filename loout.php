<?php
setcookie("dangnhap","",time()-3600);
setcookie("tenuser","",time()-3600);
header('location: index.php');
?>