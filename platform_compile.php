<?php

include 'connect.php';

if ($_POST['submitpy']==='Compile') 
{
	$code=$_POST['code'];
	$name=$_POST['usrname'];
	$filename=$name.".py";
	$_SESSION['file']=$filename;
	$output="py_output.txt";
	$handle = fopen($filename,"w");
	fwrite($handle, $code);
	system("python ".$filename." &>".$output);
	$lines_of_file = file($output);
	$num_lines=exec("cat ".$output." | wc -l");
	echo "<br>";
	for ($i=0; $i <$num_lines ; $i++) {
		echo $lines_of_file[$i]."<br>";
	}
}

else 
{
	$code=$_POST['code'];
	$name=$_POST['usrnamego'];
	$filename=$name.".go";
	$_SESSION['file']=$filename;
	$output="go.txt";
	$handle = fopen($filename,"w");
	fwrite($handle, $code);
	system("go run ".$filename." &>".$output);
	$lines_of_file = file($output);
	$num_lines=exec("cat ".$output." | wc -l");
	echo "<br>";
	for ($i=0; $i <$num_lines ; $i++) {
		echo $lines_of_file[$i]."<br>";
	}
}
?>