<?php    
include 'connect.php';

if (!$_SESSION['name']) {
	header('location:index.php');
}
?><html>
<head>
	<title>Home - SToraSTack 2.0 </title>
	<link rel="stylesheet" href="css/style.css"/>
</head>

<body>
	<div class="outer">
		<div class="logo">
			SToraSTack <span>2</span>.0</h2>

		</div>
		
		<div class="user">
			<a href="logout.php">Sign Out</a>   <?php
			echo $_SESSION['name'];
			?>
			
		</div>
	</div>
	

	<div class="head">
		

		<div class="menu">

			<ul>
                                <a href="storage.php"><li class="storage">Storage</li></a>
                                <a href="os.php"><li class="os">OS Gallery</li></a>
                                <a href="containers.php"><li class="cont">Containers</li></a>
                                <a href="software.php"><li class="soft">Softwares</li></a>
                                <a href="hadoop.php"><li class="hadoop">Hadoop</li></a>
                                <a href="platform.php"><li class="platform">Platforms</li></a>
                        </ul>

		
		</div>

	</div>
	

	<div class="footer">
		<h2>2016 &copy SToraSTack <span>2</span>.0</h2>
	</div>
	
</body>

</html>
