<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
	header('location:index.php');
}

$id=$_SESSION['id'];echo "<br><br>";
$os_name=$_POST['os_name'];echo "<br><br>";
$ram=$_POST['ram'];echo "<br><br>";
$type=$_POST['type'];echo "<br><br>";
$variant=$_POST['variant'];echo "<br><br>";
$cpu=$_POST['cpu'];echo "<br><br>";
$disk_size=$_POST['disk'];echo "<br><br>";
$disk_name=$os_name.".qcow2";echo "<br><br>";
$sockify_port=mt_rand(5900,7000);
$os_port=mt_rand(5900,7000);
$qr_name=$os_name.".png";
$result =explode(' ',shell_exec("hostname -I"));
echo $ip=$result[0];

if ($type=='linux') {
system("sudo ln /var/lib/libvirt/images/rhel7.1.qcow2  /var/lib/libvirt/images/".$disk_name);
echo $qr_value="http://".$ip."/vnc/vnc_auto.html?ip=".$ip."&port=".$sockify_port;
system("sudo virt-install --name ".$os_name." --import  --memory ".$ram." --vcpus ".$cpu." --disk path=/var/lib/libvirt/images/".$disk_name." --os-type ".$type."  --graphics vnc,port=".$os_port.",listen=0.0.0.0 --noautoconsole");
system("sudo qrencode -o qrcode/".$os_name.".png ".$qr_value);
	
	echo system("nohup vnc/utils/websockify/run ".$ip.":".$sockify_port." ".$ip.":".$os_port." >/dev/null &");
	
	$sql="INSERT INTO os SET user_id='$id', os_name='$os_name', os_ram='$ram', os_type='$type', os_variant='$variant', os_cpu='$cpu', os_disk_name='$disk_name',os_disk_size='$disk_size',sockify_port='$sockify_port',os_port='$os_port',qr_name='$qr_name',qr_value='$qr_value',is_on='1'";
	
	$res=mysqli_query($conn,$sql);
	
	header("location:osview.php");	
}

elseif ($type="ubuntu") {
system("sudo ln /var/lib/libvirt/images/ubuntu11.04.qcow2  /var/lib/libvirt/images/".$disk_name);


	system("sudo virt-install --name ".$os_name." --import  --memory ".$ram." --vcpus ".$cpu." --disk path=/var/lib/libvirt/images/".$disk_name." --os-type linux  --graphics vnc,port=".$os_port.",listen=0.0.0.0 --noautoconsole");

echo $qr="asd sudo qrencode -o qrcode/".$os_name.".png 'http://".$ip."/vnc/vnc_auto.html?ip=".$ip."&port=".$sockify_port."'";
system($qr);
	
echo $qr_value="http://".$ip."/vnc/vnc_auto.html?ip=".$ip."&port=".$sockify_port;
	echo system("nohup vnc/utils/websockify/run ".$ip.":".$sockify_port." ".$ip.":".$os_port." >/dev/null &");
	
echo $sql="INSERT INTO os SET user_id='$id', os_name='$os_name', os_ram='$ram', os_type='$type', os_variant='$variant', os_cpu='$cpu', os_disk_name='$disk_name',os_disk_size='$disk_size',sockify_port='$sockify_port',os_port='$os_port',qr_name='$qr_name',qr_value='$qr_value',is_on='1'";
	
	$res=mysqli_query($conn,$sql);
	
	header("location:osview.php");
}

?>