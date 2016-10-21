
<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
	header('location:index.php');
}
?>
<html>
<head>
	<title>Go-Lang - Platron </title>
	
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


<div class="plat">

<br>
<textarea class="textarea2" rows="15" cols="148" name="code" form="usrform1" required="" placeholder=" Enter your GoLang Code here and press Compile ">
</textarea>
<form action="go_compile.php" id="usrform1" method="post" target="my_iframe">
   File Name:
    <input type="text" name="usrnamego" required="">
    <input type="submit" name="submitgos" value="go">
</form>


</div>


	</div>
	<div class="out">
	<h3>Output</h3>
	<br><br><br>
	 <iframe  src="go_compile.php" name="my_iframe"></iframe> 
	</div>
<div class="footer1">
                <h2>2016 &copy Platron</h2>
        </div> 
</body>

</html>
