<style>
*{
background:black;
color:white;
}
</style>

<?php

include 'connect.php';


	$code=$_REQUEST['code'];
	$name=$_REQUEST['usrname'];

	$filename=$name.".py";
	
	$_SESSION['file']=$filename;
	
	$output="py_output.txt";
	
	$handle = fopen($filename,"w");
	
	fwrite($handle, $code);

	system("python ".$filename." &>".$output);
	
	$lines_of_file = file($output);
	
	$num_lines=exec("cat ".$output." | wc -l");
	
	
	for ($i=0; $i <$num_lines ; $i++) {
	
		echo $lines_of_file[$i]."<br>";
	
	}

?>
