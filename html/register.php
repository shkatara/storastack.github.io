<?php
include 'connect.php';

$user=mysqli_real_escape_string($conn,$_POST['username']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$pass=mysqli_real_escape_string($conn,$_POST['pass']);
$r_pass=mysqli_real_escape_string($conn,$_POST['r_pass']);
$tel=mysqli_real_escape_string($conn,$_POST['number']);
$activation=md5(uniqid(''.true));
$activation_resend=md5(uniqid(''.true));
$active=0;
if($pass!=$r_pass) {
    header("location:index.php?msg=Passwords doesn't match");
}
echo $sql="INSERT INTO `storastack`.`signup`(`username`, `email`, `password`, `confirm_password`, `activation`, `active`, `activation_resend`,`tel`) VALUES ('$user','$email','$pass','$r_pass','$activation','$active','$activation_resend','$tel')";
$res=mysqli_query($conn,$sql);
if (!$res) {
    echo "Error in sql".mysqli_error($conn);
}else 
{
 header('location:index.php?id=Done');
}
