<?php
include 'connect.php';
if (!isset($_SESSION[id])) {
	header('location:index.php');
}
echo $_SESSION['id'];
echo $name=$_SESSION['name'];
echo $med=$name."-FIREFOX";
echo $random=$med.(mt_rand(1,1000));
$result =explode(' ',shell_exec("hostname -I"));
$ip=$result[2];
$ip;
system("sudo echo -e 'ssh -X ".$name."@".$ip." firefox' >> soft/".$random.".sh");
system("sudo chmod o+x soft/".$random.".sh");
chdir("soft");
system("sudo tar -cvf ".$random.".tar ".$random.".sh");
chdir("..");
header('location:soft/'.$random.".tar");
?>