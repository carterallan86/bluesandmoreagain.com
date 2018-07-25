<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<?php 

include "utils/connect_db.php"; 

// This block grabs the whole list for viewing
$sidebar_list = "";
// $sql = mysqli_query("SELECT * FROM reviews ORDER BY review_id DESC LIMIT 5");
$sql = mysqli_query( $link,"SELECT * FROM reviews ORDER BY review_id DESC LIMIT 5");
$reviewCount = mysqli_num_rows($sql); // count the output amount
if ($reviewCount > 0) {
	while($row = mysqli_fetch_array($sql)){ 
             $review_id = $row["review_id"];
			 $artist = $row["artist"];
			 $title = $row["title"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $sidebar_list .= "$date_added - $title - $artist <br><a href='review.php?rid=$review_id' >View Full Review</a><br><br>";
    }
} else {
	$sidebar_list = "You have no recent reviews added";
}

// This block grabs Home Page Text
$home_text = "";
$sql_home = mysqli_query($link, "SELECT * FROM manage_style WHERE style_id='1'");
$count = mysqli_num_rows($sql_home); // count the output amount
if ($count > 0) {
	while($row = mysqli_fetch_array($sql_home)){ 
             $home_text = $row["home_text"];
    }
} else {
	$home_text = "You have nothing written";
}

?>

<?php

$page = $_SERVER['PHP_SELF'] ;

include ( 'hitcounter/counter.php');
addinfo($page);

?>

<head>
  <title>Bluesandmoreagain.com</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">

	<?php include ("includes/header.html"); ?>	
	
	<div id="site_content">		

	  <div class="sidebar_container">       
		
		<div class="sidebar">
          <div class="sidebar_item">
            <h2>Website updates test push</h2>
            <p>Please find below my most recently added reviews.</p>
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->     		
		
		<div class="sidebar">
          <div class="sidebar_item">
           <?php echo $sidebar_list; ?>        
		  </div><!--close sidebar_item--> 
        </div><!--close sidebar-->
		
 
		
      </div><!--close sidebar_container-->		  
	 
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Bluesandmoreagain.com By David Innes</h1> 
	      <br>
	      <?php echo $home_text; ?> 
		  
		 
      
	  </div><!--close content--> 
	  
	</div><!--close site_content--> 
  
  </div><!--close main-->
  
     <?php include ("includes/footer.php"); ?> 
  
</body>
</html>
