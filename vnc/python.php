<?php
include 'connect.php';
if (!isset($_SESSION['id'])) {
	header('location:index.php');
}
?>
<html>
<head>
<script>
$(".textarea1").keydown(function(e) {
    if(e.keyCode === 9) { // tab was pressed
        // get caret position/selection
        var start = this.selectionStart;
        var end = this.selectionEnd;

        var $this = $(this);
        var value = $this.val();

        // set textarea value to: text before caret + tab + text after caret
        $this.val(value.substring(0, start)
                    + "\t"
                    + value.substring(end));

        // put caret at right position again (add one for the tab)
        this.selectionStart = this.selectionEnd = start + 1;

        // prevent the focus lose
        e.preventDefault();
    }
});
</script>
	
	<title>Python - SToraSTack 2.0 </title>
	
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
                        <a href="logout.php">Sign Out </a><?php
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
<textarea rows="15"  name="code" form="usrform" placeholder=" Enter your python code here" class="textarea1"></textarea>

<form action="python_compile.php" id="usrform" method="post" target="my_iframe">
   
    <input type="submit" name="submitpy" value="Compile">
</form>
</div>
	</div>
	<div class="out">

	 <iframe class="iframe1" width="100%" src="python_compile.php" name="my_iframe"></iframe> <a href="py_online.php">Try our homemade online python compiler</a>
	</div>
<div class="footer1">
                <h2>2016 &copy SToraSTack <span>2</span>.0</h2>
        </div> 
</body>

<script>
$("textarea").keydown(function(e) {
    if(e.keyCode === 9) { // tab was pressed
        // get caret position/selection
        var start = this.selectionStart;
        var end = this.selectionEnd;

        var $this = $(this);
        var value = $this.val();

        // set textarea value to: text before caret + tab + text after caret
        $this.val(value.substring(0, start)
                    + "\t"
                    + value.substring(end));

        // put caret at right position again (add one for the tab)
        this.selectionStart = this.selectionEnd = start + 1;

        // prevent the focus lose
        e.preventDefault();
    }
});
</script>

</html>
