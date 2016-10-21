<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
	header('location:index.php');
}
?>
<html>
<head>
	
	<title>Softwares - SToraSTack 2.0 </title>
	<link href="favicon.ico" type="image/x-icon" rel="shortcut icon" />
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
                               <a href="storage.php"><li class="storage"></li></a>
                                <a href="os.php"><li class="os"></li></a>
                                <a href="containers.php"><li class="cont"></li></a>
                                <a href="software.php"><li class="soft"></li></a>
                                <a href="hadoop.php"><li class="hadoop"></li></a>
                                <a href="platform.php"><li class="platform"></li></a>
                        	</ul>

			</div>
		
	</div>
		<div class="head">
		

		<div class="menu">

			<ul>	
			<div class="men2">
				<a href="firefox.php"><li class="firefox"><span>Firefox</span></li></a></div>
			<div class="men2">	<a href="vlc.php"><li class="vlc"><span>VLC player</span></li></a></div>
		<div class="men2">		<a href="chrome.php"><li class="chrome"><span>Chrome</span></li></a></div>
		<div class="men2">		<a href="terminal.php"><li class="terminal"><span>Terminal</span></li></a></div>
		<div class="men2">		<a href="gedit.php"><li class="gedit"><span>Gedit</span></li></a></div>
			<div class="men2">	<a href="emacs.php"><li class="emacs"><span>Emacs</span></li></a></div>
		
			</ul>
			
		</div>
	</div>
	
<div class="footer1">
                <h2>2016 &copy SToraSTack <span>2</span>.0</h2>
        </div> 
</body>

</html>
