<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
		header('location:index.php');
}



echo $sockify_port=$_REQUEST['port'];
echo $os_name=$_REQUEST['name'];

$result =explode(' ',shell_exec("hostname -I"));
$ip=$result[0]; 
system("sudo qrencode -o qrcode/".$os_name.".png 'http://$ip/vnc/vnc_auto.html?ip=$ip&port=".$sockify_port."'");

header("location:qrcode/".$os_name.".png");

?>