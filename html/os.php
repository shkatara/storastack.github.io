<?php
   include 'connect.php';
   if (!isset($_SESSION['id'])) {
   		header('location:index.php');
   }
   ?>
<html>
   <head>
	
      <title>Object Storage - Create Infrastructure </title>
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
         <form method="post" action="os_create.php">
            <input type="text"  name="os_name"  placeholder="Enter OS Name" required="required" />
            <input type="number" max-value='0' name="ram" min="1" max="2048" placeholder="Enter RAM Size (in MB)" required="required" />
            <select name="type">
               <option value="linux">Linux</option>
               <option value="windows">Windows</option>
            </select>
            <select name="variant">
               <option value="rhel7">Redhat 7.2</option>
               <option value="rhel6">Redhat 6.4</option>
            </select>
            <select name="cpu">
               <option value="1">1</option>
               <option value="2">2</option>
            </select>
            <input type="number" max-value='0' name="disk" min="1" max="10240" placeholder="Enter Disk Size (in MB)" required="required" >
            <button type="submit" class="btn btn-primary btn-block btn-large">Create & Run my OS</button>
         </form>
      </div>
   </div>
<div class="osview">
<a href="osview.php">View Your Instances</a>
</div>
   <div class="footer1">
      <h2>2016 &copy SToraSTack <span>2</span>.0</h2>
   </div>
   </body>
</html>
