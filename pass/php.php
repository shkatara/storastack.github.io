<?php
     $start_word = $_POST['start'];
     $end_word = $_POST['end'];
     echo "Start word: ". $start_word . "<br />";
     echo "End word: ". $end_word . "<br />";
     echo "Results from wordgame.py...";
     echo "</br>";
     $output = passthru("python wordgame.py ".$start_word." ".$end_word);     
echo $output;
?>
