<?php

include 'connect.php';
echo $name=$_SESSION['name'];
echo "<br>";
echo $id=$_SESSION['id'];
echo "<br>";
echo $container_port=mt_rand(2000,60000);
echo "<br>";
echo $container_name=$name.mt_rand(2000,5000);
echo "<br>";
$result =explode(' ',shell_exec("hostname -I"));
$ip=$result[0];
$ip; 

echo $container_url="http://".$ip.":".$container_port;

$z1=system("sudo docker run -itd -p ".$container_port.":4200 --name ".$container_name." caas_http");
echo $z1;
$z2=system("sudo docker exec -itd ".$z1." python");

#header('location:'.$container_url);

?>