<?php
$db_host = "localhost"; 
// Place the username for the MySQL database here 
$db_username = "blueenzd_admin";  
// Place the password for the MySQL database here 
$db_pass = "[bf*WUk+kFHf";  
// Place the name for the MySQL database here 
$db_name = "blueenzd_bama"; 

$dbtablehits= 'hits';
$dbtableinfo= 'info';
$maxrows = 50; // Restrics how many entry´s are allowed in $dbtableinfo. if more then $maxrows , new entry´s will replace the oldest to keep your database small. 
// Run the actual connection here  
$link = mysqli_connect($db_host, $db_username, $db_pass, $db_name);


?>
