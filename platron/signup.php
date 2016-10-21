<?php
include 'connect.php';
echo $name=$_REQUEST['name'];
echo $email=$_REQUEST['email'];
echo $password=$_REQUEST['password'];

echo $sql="INSERT INTO `platron`.`signup`(`name`, `email`, `password` ) VALUES ('$name','$email','$password')";


$res=mysqli_query($conn,$sql);


if (!$res) {
    echo "Error in sql".mysqli_error($conn);
}else 
{
 echo "Done";
}
?>