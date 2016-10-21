<?php
include 'connect.php';

if (!isset($_SESSION['id'])) {
	header('location:index.php');
}

$name=$_SESSION['name'];
$id=$_SESSION['id'];
echo $size=$_POST['osize'];
echo $type=$_POST['otype'];
echo $name_of_buck=$_POST['oname'];
echo $random=$name.(mt_rand(10,10000));


if ($type=="Distributed") {
	
	echo $sql="INSERT INTO object  SET user_id='$id',type='$type', object_size='$size', object_name='$random',bucket_name='$name_of_buck'";

	$res=mysqli_query($conn,$sql);
	
	echo system("sudo sshpass -p redhat ssh 192.168.1.107 '
	lvcreate -n ".$random." -L ".$size."M vg
	mkfs.xfs -i size=512 /dev/vg/".$random."
	mkdir -p /Storastack/users/".$random."
	mount /dev/vg/".$random." /Storastack/users/".$random."
	'");
	
	echo system("sudo sshpass -p redhat ssh 192.168.1.112 '
	lvcreate -n ".$random." -L ".$size."M vg
	mkfs.xfs -i size=512 /dev/vg/".$random."
	mkdir -p /Storastack/users/".$random."
	mount /dev/vg/".$random." /Storastack/users/".$random."
	gluster volume create ".$random." 192.168.1.107:/Storastack/users/".$random." 192.168.1.112:/Storastack/users/".$random." force

	gluster volume start ".$random."
	mkdir -p gluster/".$random."
	mount 192.168.1.107:/".$random." /gluster/".$random."
	'");

	system("sudo echo -e mkdir /media/".$name_of_buck." > gluster_sh/".$random.".sh");
	
	system("sudo echo -e 'sudo mount 192.168.1.107:/".$random." /media/".$name_of_buck."' >> gluster_sh/".$random.".sh");
	
	system("sudo chmod +x gluster_sh/".$random.".sh");
	
	chdir("gluster_sh");
	
	system("sudo tar -cvf ".$random.".tar ".$random.".sh");
	
	chdir("..");
	header('location:gluster_sh/'.$random.".tar");	
}

elseif ($type=="Replicated") {
	
	echo $sql="INSERT INTO object  SET user_id='$id',type='$type', object_size='$size', object_name='$random',bucket_name='$name_of_buck'";

	$res=mysqli_query($conn,$sql);
	
	echo system("sudo sshpass -p redhat ssh 192.168.1.107 '
	lvcreate -n ".$random." -L ".$size."M vg
	mkfs.xfs -i size=512 /dev/vg/".$random."
	mkdir -p /Storastack/users/".$random."
	mount /dev/vg/".$random." /Storastack/users/".$random."
	'");
	
	echo system("sudo sshpass -p redhat ssh 192.168.1.112 '
	lvcreate -n ".$random." -L ".$size."M vg
	mkfs.xfs -i size=512 /dev/vg/".$random."
	mkdir -p /Storastack/users/".$random."
	mount /dev/vg/".$random." /Storastack/users/".$random."
	gluster volume create ".$random." replica 2 192.168.1.107:/Storastack/users/".$random." 192.168.1.112:/Storastack/users/".$random." force

	gluster volume start ".$random."
	mkdir -p gluster/".$random."
	mount 192.168.1.107:/".$random." /gluster/".$random."
	'");
	
	system("sudo echo -e mkdir /media/".$name_of_buck." > gluster_sh/".$random.".sh");
	
	system("sudo echo -e 'sudo mount 192.168.1.107:/".$random." /media/".$name_of_buck."' >> gluster_sh/".$random.".sh");
	
	system("sudo chmod +x gluster_sh/".$random.".sh");
	
	chdir("gluster_sh");
	
	system("sudo tar -cvf ".$random.".tar ".$random.".sh");
	
	chdir("..");
	header('location:gluster_sh/'.$random.".tar");	
}

else{

	 echo $sql="INSERT INTO object  SET user_id='$id',type='$type', object_size='$size', object_name='$random',bucket_name='$name_of_buck'";

	$res=mysqli_query($conn,$sql);
	
	echo system("sudo sshpass -p redhat ssh 192.168.1.107 '
	lvcreate -n ".$random." -L ".$size."M vg
	lvcreate -n ".$random."1 -L ".$size."M vg
	mkfs.xfs -i size=512 /dev/vg/".$random."
	mkfs.xfs -i size=512 /dev/vg/".$random."1
	mkdir -p /Storastack/users/".$random."
	mkdir -p /Storastack/users/".$random."1
	mount /dev/vg/".$random." /Storastack/users/".$random."
	mount /dev/vg/".$random."1 /Storastack/users/".$random."1
	
	'");
	
	echo system("sudo sshpass -p redhat ssh 192.168.1.112 '
	lvcreate -n ".$random." -L ".$size."M vg
	lvcreate -n ".$random."1 -L ".$size."M vg
	mkfs.xfs -i size=512 /dev/vg/".$random."
	mkfs.xfs -i size=512 /dev/vg/".$random."1
	mkdir -p /Storastack/users/".$random."
	mkdir -p /Storastack/users/".$random."1
	mount /dev/vg/".$random." /Storastack/users/".$random."
	mount /dev/vg/".$random." /Storastack/users/".$random."1

	echo -e y| gluster volume create ".$random." replica 2 192.168.1.107:/Storastack/users/".$random."   192.168.1.112:/Storastack/users/".$random." 192.168.1.107:/Storastack/users/".$random."1  192.168.1.112:/Storastack/users/".$random."1 force
	
	gluster volume start ".$random."
	
	mkdir -p gluster/".$random."
	
	'");
	
	system("sudo echo -e mkdir /media/".$name_of_buck." > gluster_sh/".$random.".sh");
	
	system("sudo echo -e 'sudo mount 192.168.1.107:/".$random." /media/".$name_of_buck."' >> gluster_sh/".$random.".sh");
	
	system("sudo chmod +x gluster_sh/".$random.".sh");
	
	chdir("gluster_sh");
	
	system("sudo tar -cvf ".$random.".tar ".$random.".sh");
	
	chdir("..");
	header('location:gluster_sh/'.$random.".tar");   	
}
?>