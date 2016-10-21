<?php if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  echo  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    echo $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
     echo $_SERVER['REMOTE_ADDR'];
}
 
?>