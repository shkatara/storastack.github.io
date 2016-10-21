<?php

include 'connect.php';
if (!isset($_SESSION[id])) {
	header('location:index.php');
}
$result =explode(' ',shell_exec("hostname -I"));
$ip=$result[2];
$ip; 

header('location:http://'.$ip.':8080');

?>
