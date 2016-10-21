<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
		header('location:index.php');
}


echo $size=($_POST['osize']/2);

echo $bucket_name=$_POST['object'];
$sql="select object_name from object where bucket_name='$bucket_name'";

$result=mysqli_query($conn,$sql);
echo "<br><h1> object_name </h1> <br><br>";
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) { 
		$object_name=$row['object_name'];
	}
}

echo $object_name;

if (isset($_POST['extend'])) {
    
	echo system("sudo sshpass -p redhat ssh 192.168.43.193 '
	lvextend -L +".$size."M /dev/vg/".$object_name."
	xfs_growfs /dev/vg/".$object_name."
	'");
	
	echo system("sudo sshpass -p redhat ssh 192.168.43.60 '
	lvextend -L +".$size."M /dev/vg/".$object_name."
	xfs_growfs /dev/vg/".$object_name."
	'");

	header('location:object.php');

}

elseif (isset($_POST['delete'])) {
	
	echo system("sudo sshpass -p redhat ssh 192.168.43.193 '
	echo y | gluster volume stop ".$object_name."
	echo y | gluster volume delete ".$object_name."
	umount /dev/vg/".$object_name."
	lvremove /dev/vg/".$object_name."
	'");
	
	echo system("sudo sshpass -p redhat ssh 192.168.43.60 '
	echo y | gluster volume stop ".$object_name."
	echo y | gluster volume delete ".$object_name."
	umount /dev/vg/".$object_name."
	lvremove /dev/vg/".$object_name."
	'");

	$sql="delete from object where object_name='$object_name'";
	mysqli_query($conn,$sql);

	header('location:object.php');



}

else
	echo "Detach";


?>