<?php
include 'connect.php';
if (!isset($_SESSION[id])) {
	header('location:index.php');
}
echo $_SESSION['id'];
echo $name=$_SESSION['name'];
echo $med=$name."-CHROME";
echo $random=$med.(mt_rand(1,1000));

system("sudo echo -e ssh -X ".$name."@192.168.0.6 'google-chrome --no-sandbox --user-data-dir' >> soft/".$random.".sh");
system("sudo chmod o+x soft/".$random.".sh");
chdir("soft");
system("sudo tar -cvf ".$random.".tar ".$random.".sh");
chdir("..");
header('location:soft/'.$random.".tar");
?>