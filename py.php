<?php
include 'platron/connect.php';

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
	
	<title>Python - Platron</title>
	
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
                        <a href="logout.php">Sign Out </a><?php
                        echo $_SESSION['name'];
                        ?>
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

	 <iframe class="iframe1" width="100%" src="python_compile.php" name="my_iframe"></iframe> 	</div>
<div class="footer1">
                <h2>2016 &copy Platron</h2>
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
