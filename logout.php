<?php
setcookie("dangnhap","",time()-30*24*60*60);
setcookie("tenuser","",time()-30*24*60*60);
header('location: index.php');
?>