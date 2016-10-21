<?php

include 'connect.php';
if (!isset($_SESSION['id'])) {
	header('location:index.php');
}

$os=$_REQUEST['name'];
system("sudo virsh destroy ".$os);
system("sudo virsh undefine ".$os);

$sql="delete from os where os_name='$os'";
mysqli_query($conn,$sql);
header('location:osview.php');

?>