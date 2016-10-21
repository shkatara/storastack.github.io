<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
	header('location:index.php');
}
?>
<html>
<head>
	
	<title>SToraSTack 2.0 - Storage</title>
	
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

<style>

.contentContainer {
  background: #efefef;
  padding: 20px;
  max-width: 350px;
  min-width: 150px;
  margin: 15vh auto;
  border-radius: 10px;
  border: solid 5px #dbdbdb;
}

/*///////////////////////////////////////////////////////
    // Progress Bars \\ 
///////////////////////////////////////////////////////*/

.progressBar {
  margin-bottom: 26px;
  margin-bottom: 1.66em;
}

.progressBar h4 {
  font-size: 21px;
  font-size: 1.33em;
  text-transform: none;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
  margin-bottom: 7px;
  margin-bottom: .33em;
}

.progressBarContainer {
  width: 100%;
  max-width: 350px;
  height: 26px;
  height: 1.66em;
  background: #e6eae3;
  background: rgba(8,102,220,.2);
  overflow: hidden;
  border-radius: 5px;
}

.progressBarValue {
  height: 1.66em;
  float: left;
  background: #0866dc;
  background: rgba(8,102,220,.75);
}

.value-00 { width: 0; }

.value-10 { width: 10%; }

.value-20 { width: 20%; }

.value-30 { width: 30%; }

.value-40 { width: 40%; }

.value-50 { width: 50%; }

.value-60 { width: 60%; }

.value-70 { width: 70%; }

.value-80 { width: 80%; }

.value-90 { width: 90%; }

.value-100 { width: 100%; }
</style>

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
	

		<div class="contentContainer">
  <div class="progressBar">
  <?php  
  $id=$_SESSION['id'];
  $sql="select * from os where user_id='$id'";
  $result = mysqli_query($conn, $sql);
  $no_of_os=mysqli_num_rows($result);
  ?>
    <h4>No. of Instances: <?php echo $no_of_os   ?> </h4>
    <div class="progressBarContainer">
      <div class="progressBarValue value-90"></div>
    </div>
  </div>
  <div class="progressBar">
    <?php  
  $id=$_SESSION['id'];
  $sql="select sum(os_cpu) as os from os where user_id='$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
  ?>
    <h4>CPU's: <?php  echo $row['os']; } }?></h4>
    <div class="progressBarContainer">
      <div class="progressBarValue value-80"></div>
    </div>
  </div>
  <div class="progressBar">
     <?php  
  $id=$_SESSION['id'];
  $sql="select sum(os_ram) as ram from os where user_id='$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
  ?>
    <h4>RAM: <?php   echo $row['ram']."  MB"; }} ?> </h4>
    <div class="progressBarContainer">
      <div class="progressBarValue value-30"></div>
    </div>
  </div>
  <div class="progressBar">
     <?php  
  $id=$_SESSION['id'];
  $sql="select sum(os_disk_size) as size from os where user_id='$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
  ?>
    <h4>Volume Storage: <?php  echo $row['size']." MB"; }} ?></h4>
    <div class="progressBarContainer">
      <div class="progressBarValue value-70"></div>
    </div>
  </div>
</div>
		
			
<div class="footer1">
                <h2>2016 &copy SToraSTack <span>2</span>.0</h2>
        </div> 
</body>

</html>
