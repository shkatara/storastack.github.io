<?php    
include 'connect.php';

if (!$_SESSION['id']) {
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
			<a href="logout.php">Sign Out </a>   <?php
			echo $_SESSION['name'];
			?>
			
		</div>
		<div class="over">
                        <a href="overview.php">OverView</a>

                </div>

	<div class="head">
		

		<div class="menu">

			<ul>
                                <div class="men1">
                                <a href="storage.php"><li class="storage"><span>Storage</span></li></a>
                                </div>
                                <div class="men3">
                                <a href="os.php"><li class="os"><span>OS Gallery</span></li></a>
                                </div>
                                <div class="men4">
                                <a href="containers.php"><li class="cont"><span>Containers</span></li></a>
                                </div>
                                <DIV class="men5">
                                <a href="software.php"><li class="soft"><span>Softwares</span></li></a>
                                </DIV>
                                <DIV class="men6">
                                <a href="hadoop.php"><li class="hadoop"><span>Hadoop</span></li></a>
                                </DIV>
                                <DIV class="men7">
                                <a href="platform.php"><li class="platform"><span>Platforms</span></li></a>
                                </DIV>
                                <DIV class="men8">
                                <?php  $result =explode(' ',shell_exec("hostname -I"));
								$ip=$result[0];
								$ip; ?>
                                <a href="https://<?php echo $ip;  ?>:8443/"><li class="openshift"><span>Openshift</span></li></a>
                                </DIV>
                        </ul>
		</div>
	</div>
<div class="footer">
		<h2>2016 &copy SToraSTack <span>2</span>.0</h2>
	</div>
</body>
</html>
