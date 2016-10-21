<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
		header('location:index.php');
}
$id=$_SESSION['id'];
$disk_size=$_POST['disk_size'];

function generateRandomString($length = 1) {
    $characters = 'defghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$disk_name="vd".generateRandomString();

$os_name=$_REQUEST['os_name'];
$qcow=$disk_name.mt_rand(5900,7000);
echo system("sudo qemu-img create -f qcow2 /var/lib/libvirt/images/".$qcow.".qcow2 ".$disk_size."G");

echo system("sudo virsh attach-disk ".$os_name." --source /var/lib/libvirt/images/".$qcow.".qcow2 ".$disk_name);

echo $sql="INSERT INTO os_disks SET user_id='$id', os_name='$os_name',os_disk='$qcow'";

$res=mysqli_query($conn,$sql);
if (!$res) {
	echo mysqli_error($conn);
}

echo $_SESSION['attach']="Disk Attached Successfully";
#header('location:osview.php');
?>