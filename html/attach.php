<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
		header('location:index.php');
}
$id=$_SESSION['id'];
 $disk_size=$_POST['disk_size'];
 $disk_name=$_POST['disk_name'];
 $os_name=$_POST['os_name'];
 $qcow=$disk_name.mt_rand(5900,7000);
echo system("sudo qemu-img create -f raw /iaas/".$qcow.".img ".$disk_size."G");
echo system("sudo virsh attach-disk ".$os_name." --source /iaas/".$qcow.".img ".$disk_name);
echo $sql="INSERT INTO os_disks SET user_id='$id', os_name='$os_name',os_disk='$qcow'";
$res=mysqli_query($conn,$sql);
if (!$res) {
	echo mysqli_error($conn);
}
?>