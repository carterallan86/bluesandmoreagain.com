<?php
  
include "utils/connect_db.php";

$ip_result=mysql_query("SELECT MAX(id) FROM info");
while ($row = mysql_fetch_array($ip_result, MYSQL_NUM)) 
{
$totalips = $row[0] ;  
}


// Convert number to word.  like 1 to 1st
function ordinal_suffix($totalips){
    $totalips = $totalips % 100; // protect against large numbers
    if($totalips < 11 || $totalips > 13){
         switch($totalips % 10){
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
        }
    }
    return 'th';
}
?>


 <html><div id="footer">
	  <br><h3>BLUESANDMOREAGAIN by David Innes - You are the <?php echo $totalips, ordinal_suffix($totalips) ?> visitor to bluesandmoreagain.com.</h3>
  </div><!--close footer-->  
 </html>
  
