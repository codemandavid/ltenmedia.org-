<?php 
include('connection.php');

$id=1;
$password="ltenmedia";

 $hashedpassword = md5(md5($id).$password);

  $query= "UPDATE admin SET password ='".$hashedpassword."'  ";

 $runquery= mysqli_query($conn,$query);

 






?>