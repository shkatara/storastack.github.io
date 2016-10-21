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
    overflow: scroll;
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
                    <a href="storage.php">
                        <li class="storage">Storage</li>
                    </a>
                    <a href="os.php">
                        <li class="os">OS Gallery</li>
                    </a>
                    <a href="containers.php">
                        <li class="cont">Containers</li>
                    </a>
                    <a href="software.php">
                        <li class="soft">Softwares</li>
                    </a>
                    <a href="hadoop.php">
                        <li class="hadoop">Hadoop</li>
                    </a>
                    <a href="platform.php">
                        <li class="platform">Platforms</li>
                    </a>
                </ul>

            </div>

        </div>
        </div>
        <div class="head">
            <div class="login">
                <?php   
                    $id=$_SESSION['id'];
                    $sql="select os_name,qr_value from os where user_id='$id'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <iframe width="700" height="394" src="<?php  echo $row['qr_value']; ?>" allowfullscreen></iframe>
                                <form action=attach.php method="post">
                                    Disk Size: <input type="number" name="disk_size" placeholder="Enter Size in GB">
                                    Disk Name: <input type="text" name="disk_name" title="Example: vda" placeholder="Enter Disk Name">
                                    <input type="hidden" name="os_name" value="<?php  echo $row['os_name'];?>">
                                    <input type="submit" name="attach" value="Attach Disk">
                                </form>
                            <?php
                        }

                    }else{
                        echo "You have no instaces running yet";?> 

                        <a href="os.php"><h1>Launch an instance</h1></a>
                          <?php
                    }
                ?>    

        <div class="footer1">
            <h2>2016 &copy SToraSTack <span>2</span>.0</h2>
        </div>
            </div>
        </div>


    </body>

    </html>
