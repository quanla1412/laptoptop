<?php
setcookie("dangnhap","",time()-3600);
setcookie("user","",time()-3600);
header('location: index.php');
?>