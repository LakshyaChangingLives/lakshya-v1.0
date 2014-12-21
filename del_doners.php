<?php

$comfile=fopen("doners.txt","w");



fclose($comfile);

header( 'Location: http://lakshyachanginglives.org/admin_home.php' ) ;


?>