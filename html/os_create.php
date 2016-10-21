<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
	header('location:index.php');
}

echo $id=$_SESSION['id'];echo "<br><br>";
echo $os_name=$_POST['os_name'];echo "<br><br>";
echo $ram=$_POST['ram'];echo "<br><br>";
echo $type=$_POST['type'];echo "<br><br>";
echo $variant=$_POST['variant'];echo "<br><br>";
echo $cpu=$_POST['cpu'];echo "<br><br>";
echo $disk_size=$_POST['disk'];echo "<br><br>";
echo $disk_name=$os_name.".qcow2";echo "<br><br>";
echo "<br><br>";
echo $sockify_port=mt_rand(5900,7000);
echo "<br><br>";
echo $os_port=mt_rand(5900,7000);
echo system("sudo qemu-img create -f qcow2 /iaas/".$os_name.".qcow2 ".$disk_size."M");
echo $qr_name=$os_name.".png";
echo $qr_value="http://192.168.1.106/vnc/vnc_auto.html?ip=192.168.1.106&port=".$sockify_port;
if ($type=='linux') {

	system("sudo virt-install --name ".$os_name." --memory ".$ram." --cdrom /root/Project/rhel-server-7.2-x86_64-dvd.iso --vcpus ".$cpu." --disk /iaas/".$os_name.".qcow2 --os-type ".$type."  --graphics vnc,port=".$os_port.",listen=0.0.0.0 --noautoconsole");

	system("sudo qrencode -o qrcode/".$os_name.".png 'http://192.168.1.106/vnc/vnc_auto.html?ip=192.168.1.106&port=".$sockify_port."'");
	
	echo system("nohup vnc/utils/websockify/run 192.168.1.106:".$sockify_port." 192.168.1.106:".$os_port." >/dev/null &");
	
	$sql="INSERT INTO os SET user_id='$id', os_name='$os_name', os_ram='$ram', os_type='$type', os_variant='$variant', os_cpu='$cpu', os_disk_name='$disk_name',os_disk_size='$disk_size',sockify_port='$sockify_port',os_port='$os_port',qr_name='$qr_name',qr_value='$qr_value',is_on='1'";
	
	$res=mysqli_query($conn,$sql);
	header("location:qrcode/".$os_name.".png");
}
?>