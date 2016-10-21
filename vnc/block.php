<?php
include 'connect.php';
if (!$_SESSION['id']) {
	header('location:index.php');
}
?>
<html>
<head>
	
	<title>Block Storage - SToraSTack 2.0 </title>
	
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
    				<input type="number" max-value='0' name="bsize" min="1" max="2048" placeholder="Enter Storage Size (in MB)" required="required" />
        			<button type="submit" class="btn btn-primary btn-block btn-large">Attach Block Storage</button>
    			</form>
			<br />
		<div class="ava_block"><h2>Your Block Storages</h2></div> <br />
			<form action="block_extend.php" method="post">
				<select name="block">
						
				<?php  
					$id=$_SESSION['id'];	
					$sql="select * from block,login where login.user_id=block.user_id and login.user_id='$id'";
					$result=mysqli_query($conn,$sql);
					echo mysql_fetch_row($result);
					
					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) { ?>
				
						<option>
				<?php	
        					echo "<h1>".$row['block_name']."</h1>"; 	
    					}	?> </option>
				<?php
					}
				?>
				</select>

			<input type="submit" name="extend" value="Extend"></input>
			<input type="submit" name="delete" value="Delete"></input>
			<input type="submit" name="detach" value="Detach"></input>
				
			</form>
		</div>
	</div>
 <div class="footer1">
                <h2>2016 &copy SToraSTack <span>2</span>.0</h2>
        </div>

</body>

</html>
		
		
