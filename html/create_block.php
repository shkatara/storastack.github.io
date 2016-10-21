<?php

include 'connect.php';
echo $name=$_SESSION['name'];
echo "<br><br>";
echo $id=$_SESSION['id'];
echo "<br><br>";
echo $size=$_POST['bsize'];
echo "<br><br>";
echo $random=$name.(mt_rand(10,10000));
echo $sql="INSERT INTO block SET user_id='$id', block_name='$random', block_size='$size'";
$res=mysqli_query($conn,$sql);

system("sudo lvcreate -n ".$random." -L ".$size."M vg");
system("sudo echo -e '<target ".$random.">\n\tbacking-store /dev/vg/".$random."\n</target>' > /etc/tgt/conf.d/".$random.".conf");
system("sudo echo -e iscsiadm --mode discoverydb --type sendtargets --portal 192.168.1.106 --discover > block_sh/".$random.".sh");
system("sudo echo -e iscsiadm --mode node --targetname ".$random."  --portal  192.168.1.106:3260 --login >> block_sh/".$random.".sh");
system("sudo chmod +x block_sh/".$random.".sh");
system("sudo systemctl restart tgtd &");
chdir("block_sh");
system("sudo tar -cvf ".$random.".tar ".$random.".sh");
chdir("..");
header('location:block_sh/'.$random.".tar");
?>