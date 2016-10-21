<?php
   include 'connect.php';
   if (!isset($_SESSION['id'])) {
   		header('location:index.php');
   }
   ?>
<html>
   <head>
	
      <title>Containers - SToraSTack 2.0</title>
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
         <form method="post" action="container_create.php">
           
           <p class="label"> Select Container to Create </p>
            <input type="text" name="batch" placeholder="Name of Docker fleet">
            <input type="number" name="number" placeholder="Number of containers">
            <select name="purpose">

               <option value="http">HTTP SERVER</option>
               <option value="shell">CENTOS SHELL</option>
            </select>
            <button type="submit" class="btn btn-primary btn-block btn-large">Create my container</button>
         </form>
      </div>
   </div>
<div class="osview">
<a href="containerview.php">View Your Containers</a>
</div>
   <div class="footer1">
      <h2>2016 &copy SToraSTack <span>2</span>.0</h2>
   </div>
   </body>
</html>
