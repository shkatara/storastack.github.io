<?php

include 'connect.php';

if ($_POST['submitgos']==='go') 
{
	

	$code=$_POST['code'];
	$name=$_POST['usrnamego'];
	$filename=$name.".perl";
	$_SESSION['file']=$filename;
	$output="perl.txt";
	$handle = fopen($filename,"w");
	fwrite($handle, $code);
	system("perl ".$filename." &>".$output);
	$lines_of_file = file($output);
	$num_lines=exec("cat ".$output." | wc -l");
	echo "<br>";
	for ($i=0; $i <$num_lines ; $i++) {
		echo $lines_of_file[$i]."<br>";
	}
}
?>