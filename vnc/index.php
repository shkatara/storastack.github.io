<?php

include 'connect.php';
if (isset($_SESSION['id'])) {
	header('location:home.php');
}

?>
<html>
<head>
	<title>SToraSTack 2.0</title>
	<link rel="stylesheet" href="css/style.css"/>
</head>

<body>
	<div class="outer">
		<div class="logo">
			SToraSTack <span>2</span>.0</h2>

		</div>
		
	</div>
	

	<div class="head">
		

		<div class="login">


    <form method="post" action="login.php">
    	<input type="text" name="user_name" placeholder="Username" required="required" />
        <input type="password" name="pass_word" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="submit">Login</button>
    </form>
    		<div class="newuser">
    			<h6>new user? <a href="register.php">Create an account</a></h6>
    		</div>
		</div>


	</div>
	

	<div class="footer">
		<h2>2016 &copy SToraSTack <span>2</span>.0</h2>
	</div>
	
</body>

</html>
