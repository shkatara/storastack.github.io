<?php
include 'connect.php';
$user=mysqli_real_escape_string($conn,$_POST['user_name']);

$pass=mysqli_real_escape_string($conn,$_POST['pass_word']);

if (!$conn) {
	echo "Not Connected";
}

$sql="select * from signup where username='$user' and password='$pass'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) 
    {
    	echo "Login Successful";
        while ($row = mysqli_fetch_assoc($result)) 
        {   
            $_SESSION['id']=$row['user_id'];
            $_SESSION['name']=$row['username'];
        	header('location:home.php');
        }
    }else{
    	header('location:index.php');
    }