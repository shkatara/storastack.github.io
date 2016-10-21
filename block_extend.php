<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
	header('location:index.php');
}

echo $action=$_POST['block'];
echo $extend=$_POST['extend'];
echo $delete=$_POST['delete'];
echo $detach=$_POST['detach'];
$extend_size='100';

if ($extend=="Extend") {
	system()
}
elseif ($delete=="Delete") {
	print "hata do";
}
else {
	print("Detach");
}


?>