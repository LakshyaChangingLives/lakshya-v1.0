<?php
$text = $_POST['textarea'];
trim($text,"\r\n");
trim($text,"\n");

$arr=explode(",",$text);
$newText;
for($i=0;$i<=sizeof($arr)-1;$i++)
{
$newText=$newText.$arr[$i]." * ";
}
$n=sizeof($arr);
$newText=$newText.$arr[$n];
$comfile=fopen("doners.txt","w");

fwrite($comfile,$newText);

fclose($comfile);
($comfile);

   header( 'Location: http://lakshyachanginglives.org/admin_home.php' ) ;


?>