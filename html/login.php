<?php
include 'connect.php';
echo $user=mysqli_real_escape_string($conn,$_POST['user_name']);
echo $pass=mysqli_real_escape_string($conn,$_POST['pass_word']);

if (!$conn) {
	echo "Not Connected";
}

echo $sql="select * from signup where username='$user' and password='$pass'";
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
    	header('location:index.php');
    }