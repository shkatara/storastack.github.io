<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
		header('location:index.php');
}
?>
<html>
<head>
<style>
body{
overflow:inherit;
}
</style>
	<title>Object Storage -SToraSTack 2.0 </title>
	
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
	</div>
			
	<div class="head">
			<div class="login">


    			<form method="post" action="create_object.php">

    			<select name="otype">
				  <option Title="It will distribute files to multiple servers" value="Distributed">Distributed</option>
				  <option value="Replicated">Replicated</option>
				  <option value="Distributed-Replicated">Distributed-Replicated</option>
				</select>
    			
    				<input type="text"  name="oname" min="1" max="2048" placeholder="Enter Storage Name" required="required" />
    				<input type="number" max-value='0' name="osize" min="1" max="2048" placeholder="Enter Storage Size (in MB)" required="required" />
        			<button type="submit" class="btn btn-primary btn-block btn-large">Attach Object Storage</button>
    			
        		
        		</form>
			<div class="ava_block"><h2>Your Object Storages</h2></div> <br />
				<form action="block_extend.php" method="post">
					<select name="block">
        			<?php  
					$id=$_SESSION['id'];	
					$sql="select bucket_name from object where user_id='$id'";
					$result=mysqli_query($conn,$sql);
					echo mysql_fetch_row($result);
					echo "<br><h1> Your object Storages: </h1> <br><br>";
					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {?>
				<option> <?php
        					echo "<h1>".$row['bucket_name']."</h1>"; ?> </option>
        					
    				<?php	}
					}?>
			</select>
			
			<input type="number" max-value='0' name="osize" min="1" max="2048" placeholder="Enter Size to extend (in MB)" />
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
		
		
