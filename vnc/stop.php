<?php


include 'connect.php';
if (!$_SESSION['id']) {
	header('location:index.php');
}

$os=$_REQUEST['name'];

#

system("sudo virsh destroy ".$os);
header('location:osview.php');
?>
