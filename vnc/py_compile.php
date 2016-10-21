<?php

$name=$_SESSION['name'];

$id=$_SESSION['id'];

$container_port=mt_rand(2000,60000);

$container_name=$name.mt_rand(2000,5000);

$result =explode(' ',shell_exec("hostname -I"));
echo$ip=$result[0];

$z1=system("sudo docker run -itd -p ".$container_port.":4200 --name ".$container_name." python_image");

$z2=system("sudo docker exec -itd ".$z1." python");

$container_url="http://".$ip.":".$container_port;


?>