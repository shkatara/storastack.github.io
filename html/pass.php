<?php
echo $user="arpit";
echo $pass="agarwal";
system("sudo chpasswd ".$user.": EOF".$pass);

?>