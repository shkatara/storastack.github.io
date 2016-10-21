<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
		header('location:index.php');
}
?>
    <html>
    <head>
	<style>
	*{
    overflow: auto;
}
</style>
        <title>Running OS's -SToraSTack 2.0 </title>

        <link rel="stylesheet" href="css/style.css" />

        <script type="text/javascript" id="myscript">
            function showHide(divID, imgID) {
                if (document.getElementById(divID).style.display == "none") {
                    document.getElementById(divID).style.display = "block";
                    document.getElementById(imgID).src = "Images/upArrow.gif";
                } else {
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
                <img "dirImg" src="css/chevron.png" onclick="showHide('hideDiv',this.id)" />
            </div>
        </div>
        <div class="user">
            <a href="logout.php">Sign Out</a>
            <?php
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
            <div class="login" style="display:inline;">
                <?php   
                    $id=$_SESSION['id'];
                    $sql="select sockify_port,os_port,os_name,qr_value from os where user_id='$id'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="img">
                                <iframe width="300" height="300" scrolling="yes" src="<?php  echo $row['qr_value']; ?>">
				</iframe>
                                <div class="control">
                                <a href="<?php  echo $row['qr_value']; ?>" target="_blank" title="Go FullScreen"><img src="full.png"></a>
                                <a href="start.php?name=<?php  echo $row['os_name'];?>&sockify_port=<?php echo $row['sockify_port'];?>&os_port=<?php  echo $row['os_port'];  ?>"  title="Start Instance"><img src="play.png"></a> 
                                <a href="stop.php?name=<?php  echo $row['os_name']; ?>"  title="Stop Instance"><img src="stop.png"></a>
                                <a href="delete.php?name=<?php echo $row['os_name'];  ?>"  title="Terminate Instance" onclick="return confirm ('Are you sure want to delete. This will terminate your instance?')"><img src="del.png"></a>
 <a href="qr.php?name=<?php echo $row['os_name'];?>&port=<?php echo $row['sockify_port']; ?>" target="_blank" onclick="window.open('qr.php?name=<?php echo $row['os_name'];?>&port=<?php echo $row['sockify_port']; ?>', 'popup', 'height=200, width=200'); return false;" title="Generate QR"><img src="qr.png"></a>

                                <a href="pause.php?name=<?php  echo $row['os_name']; ?>" target="_blank" title="Pause"><img src="pause1.png"></a>
                                <a href="resume.php?name=<?php  echo $row['os_name']; ?>" target="_blank" title="Pause"><img src="resume.png"></a>
                                
                                </div>
				<button class="label1" onclick="showDiv()">Attach Disk</button>
                                <form id="Div" action=attach.php method="post" style="display:none">
                                    <input type="number" name="disk_size" placeholder="Enter Size in GB"> 
                                    <input type="hidden" name="os_name" value="<?php  echo $row['os_name'];?>">
                                    <input type="submit" name="attach" value="Attach Disk">
                                </form>
<script>
function showDiv() {
   document.getElementById('Div').style.display = "block";
}
</script>
                          </div>
                            <?php
                        }?>
  				

                            	</div>
		<?php

                    }else{
                       ?> <h3 class="norun"> <?php echo "You have not created an instance yet.";?> </h3>
                        <div class="osview">
                        <a href="os.php">Launch an instance</a>
                        </div>
                          <?php
                    }
                ?>    


            		
        </div>
<div class="osview2">
                        <a href="os.php">Launch an instance</a>
                        </div>

        <div class="footer1">
            <h2>2016 &copy SToraSTack <span>2</span>.0</h2>
        </div>


    </body>

    </html>
