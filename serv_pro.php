<?php
include 'connect.php';
if (!$_SESSION['id']) {
	header('location:index.php');
}
?>
<html>
<head>
	
	<title>Provide Storage - SToraSTack 2.0 </title>
	
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

<body
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
	</div>	
	<div class="head">
			<div class="login">
				<form method="post" action="create_block.php">
    				<input type="number" max-value='0' name="bsize" min="1" max="10000" placeholder="Enter Storage Size (in MB)" required="required" />
    				<input type="text" max-value='0' name="bsize" min="1" max="2048" placeholder="Enter Client name" required="required" />
    				<input type="email" max-value='0' name="bsize" min="1" max="2048" placeholder="Enter Client's email" required="required" />
        			<button type="submit" class="btn btn-primary btn-block btn-large">Send Storage</button>
    			</form>
			<br />
		
	</div>
 <div class="footer1">
                <h2>2016 &copy SToraSTack <span>2</span>.0</h2>
        </div>

</body>

</html>
		
		
