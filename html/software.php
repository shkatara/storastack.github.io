<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
	header('location:index.php');
}
?>
<html>
<head>
	
	<title>Softwares - SToraSTack 2.0 </title>
	
	<link rel="stylesheet" href="css/style.css"/>
	
	<script type="text/javascript" id="myscript" >

		function showHide(divID, imgID)
		{
			if (document.getElementById(divID).style.display == "none") 
			{
			document.getElementById(divID).style.display = "block";
			document.getElementById(imgID).src = "Images/upArrow.gif";
			}else
			{
		document.getElementById(divID).style.display = "none";
		document.getElementById(imgID).src = "Images/dnArrow.gif";
			}
		}

	</script>

</head>

<body>
	
	<div class="outer">
		
		<div class="logo">
			
			<a href="home.php">SToraSTack <span>2</span>.0</h2></a>

			

			<div id="image">
				<img "dirImg" src="css/chevron.png" onclick="showHide('hideDiv',this.id)"/>
			</div>
		</div>
		
		 <div class="user">
                        <a href="logout.php">Sign Out</a>   <?php
                        echo $_SESSION['name'];
                        ?>

                </div>

			
			<div id="hideDiv" style="display:none">
				
				<div class="menu1">

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
		<div class="head">
		

		<div class="menu">

			<ul>	
				<a href="firefox.php"><li class="firefox">Firefox</li></a>
				<a href="vlc.php"><li class="vlc">VLC player</li></a>
				<a href="chrome.php"><li class="chrome">Chrome</li></a>
				<a href="terminal.php"><li class="terminal">Terminal</li></a>
				<a href="gedit.php"><li class="gedit">Gedit</li></a>
				<a href="emacs.php"><li class="emacs">Emacs</li></a>
		
			</ul>
			
		</div>
	</div>
	
<div class="footer1">
                <h2>2016 &copy SToraSTack <span>2</span>.0</h2>
        </div> 
</body>

</html>
