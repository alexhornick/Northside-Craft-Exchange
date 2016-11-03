<?php 
//$myfile = "";
$i = 0;
$myfile = fopen("passwords", "r");
//echo fread($myfile,filesize("passwords"));
while (!feof($myfile) && $i !== 30){
	echo $i++;
	echo password_hash(fgets($myfile), PASSWORD_DEFAULT)."\n";

}
fclose($myfile);
?>