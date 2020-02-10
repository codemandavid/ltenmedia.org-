<?php
include("admin/connection.php");
$id=547893;
$password="mylten@admin#167";
$hashedpassword = md5(md5($id).$password);
echo $hashedpassword;



?>