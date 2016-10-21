<?php
include 'connect.php';
echo $user=$_REQUEST['user'];


echo $password=$_REQUEST['password'];

echo $sql="select * from signup where name='$user' and password='$password'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) 
    {
    	echo "Login Successful";
        while ($row = mysqli_fetch_assoc($result)) 
        {   
            $_SESSION['id']=$row['user_id'];
            $_SESSION['name']=$row['name'];
        	header('location:../paas.php');
        }
    }else{
    	echo "Not Done";
    	header("location:index.php");
    }


?>
