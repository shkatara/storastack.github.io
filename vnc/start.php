<?php

include 'connect.php';
if (!$_SESSION['id']) {
	header('location:index.php');
}

echo $os=$_REQUEST['name'];
echo $os_port=$_REQUEST['os_port'];
echo $sockify_port=$_REQUEST['sockify_port'];
                            

echo system("nohup vnc/utils/websockify/run 192.168.43.196:".$sockify_port." 192.168.43.196:".$os_port." >/dev/null &");

system("sudo virsh start ".$os);

header('location:osview.php');

?>
