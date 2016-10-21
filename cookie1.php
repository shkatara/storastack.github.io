<?php
$connection = ssh2_connect('', 22);

if (ssh2_auth_password($connection, 'username', 'secret')) {
  echo "Authentication Successful!\n";
} else {
  die('Authentication Failed...');
}


$ip=$_SERVER['REMOTE_ADDR'];
echo "IP address= $ip";

?>