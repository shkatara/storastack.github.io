<?php

for ($i=0; $i<10 ; $i++) { 
		$z1=system("sudo docker run -itd  caas_http");
		system("sudo docker start ".$z1);
		system("sudo docker exec -itd ".$z1." bash");		
}


?>