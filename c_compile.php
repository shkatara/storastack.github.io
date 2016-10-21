<style>
*{
background:black;
color:white;
}
</style>
<?php
include 'connect.php';
	$code=$_REQUEST['code'];
	$name=mt_rand(10,100000);
	$filename="c/".$name.".cpp";
	$_SESSION['file']=$filename;
	$error="c/c_error.txt";
	if (!$code=="") {
		$handle = fopen($filename,"w");
		fwrite($handle, $code);
		echo $z=system("cc ".$filename." -o ".$filename.".out  &>".$error);
		echo $x=system("cc ".$filename.".out");
		if (file_exists($filename.".out")) {
			system("/var/www/html/".$filename.".out");	
		}
		else
			$lines_of_file = file($error);
			$num_lines=exec("cat ".$error." | wc -l");
			for ($i=0; $i <$num_lines ; $i++) {
			echo $lines_of_file[$i]."<br>";
		}	
	}	
?>