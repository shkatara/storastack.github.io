<?php
include 'connect.php';
$user=mysqli_real_escape_string($conn,$_POST['user_name']);
$pass=mysqli_real_escape_string($conn,$_POST['pass_word']);

if (!$conn) {
	echo "Not Connected";
}

$sql="select * from login where username='$user' and pass='$pass'";
$result = mysqli_query($conn,$sql);

echo mysqli_num_rows($result);

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
    	header('location:index1.html');
    }
echo "<br>";
echo "Session variable= ".$_SESSION['name'];
