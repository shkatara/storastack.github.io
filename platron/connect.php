<?php  

$server="localhost";
$user="root";
$pass="redhat";
$db="platron";
session_start();
$conn=mysqli_connect($server,$user,$pass,$db);

//echo $sql="UPDATE `user` SET Name='".$name."',username='".$username."',password='".$password."',
  // user_type='".$type."'' where id="."17";    
if (!$conn) {
	echo "Error connecting database";
	exit();
}
?>