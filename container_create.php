<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
	header('location:index.php');
}

$purpose=$_REQUEST['purpose'];
echo $batch=$_REQUEST['batch'];
echo "<br><br>";
echo $number=$_REQUEST['number'];
echo "<br><br>";		
$name=$_SESSION['name'];
$id=$_SESSION['id'];
$container="Container ";
$result =explode(' ',shell_exec("hostname -I"));
$ip=$result[2];

$container_port=mt_rand(2000,60000);
$http_port=mt_rand(2000,60000);
$container_name=$name.mt_rand(2000,5000);
$container_url="http://".$ip.":".$container_port; 

if ($purpose=="http")
{
	for ($i=1; $i <=$number ; $i++) {
		echo $z1=system("sudo docker run -itd -p ".$container_port.":4200 -p ".$http_port.":80 --name ".$container_name." caas_http");
		echo "<br><br>";
		$start=system("sudo docker start ".$z1);
		echo "<br><br>";
		$z2=system("sudo docker exec -itd ".$z1." bash");
		echo "<br><br>";		
	$container_number=$container.$i;		
		echo "<br><br>";
		echo $res=mysqli_query($conn,$sql);
	}
header("location:containerview.php");

}


else {
$container_number=$container.$i;
$z1=system("sudo docker run -itd -p ".$container_port.":4200 --name ".$container_name." caas");
echo $z1;
$start=system("sudo docker start ".$z1);
$z2=system("sudo docker exec -itd ".$z1." bash");		
$sql="INSERT INTO container SET user_id='$id',http_port='$http_port', user_name='$name',batch='$batch',number='$number',container_name='$container_name',container_port='$container_port',container_url='$container_url',container_number='$container_number'";
		
$res=mysqli_query($conn,$sql);
header("location:containerview.php");	
}
?>