<?php 


include 'connect.php';
if (!$_SESSION['id']) {
	header('location:index.php');
}

echo $os=$_REQUEST['name'];
echo $os_port=$_REQUEST['os_port'];
echo $sockify_port=$_REQUEST['sockify_port'];
                            
system("sudo virsh resume ".$os);

header('location:osview.php');

?>