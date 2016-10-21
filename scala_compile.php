n<?php

include 'connect.php';

if ($_POST['submitgos']==='go') 
{
	

	$code=$_POST['code'];
	$name=$_POST['usrnamego'];
	$filename=$name.".scala";
	$_SESSION['file']=$filename;
	$output="scala.txt";
	$handle = fopen($filename,"w");
	fwrite($handle, $code);
	system("sudo scala ".$filename." &>".$output);
	$lines_of_file = file($output);
	$num_lines=exec("cat ".$output." | wc -l");
	echo "<br>";
	for ($i=0; $i <$num_lines ; $i++) {
		echo $lines_of_file[$i]."<br>";
	}
}
?>