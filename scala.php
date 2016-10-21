<?php

include 'connect.php';

$name=$_SESSION['name'];

chdir("scala");

system("sudo echo -e 'ssh ".$name."@192.168.0.6 scala' > ".$name.".sh");

system("chmod +x ".$name.".sh");

system("sudo tar -cvf ".$name.".tar ".$name.".sh");

chdir("..");

header('location:scala/'.$name.".tar");	


?>