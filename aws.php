<?php

$server="ss.cpmmtntvpfgm.ap-south-1.rds.amazonaws.com";
$user="root";
$pass="storastack";
$db="ss";

$conn=mysqli_connect($server,$user,$pass,$db);

if (!$conn) {
	echo mysqli_erroro($conn);
	echo "if";
} else{
	echo "Else";
}
?>