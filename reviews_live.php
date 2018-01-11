<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<?php

include('utils/connect_db.php');

	
	$reviews_q="SELECT * FROM reviews WHERE category = 'Live' ORDER BY review_id DESC;";
	$reviews_r=mysqli_query($link,$reviews_q) or die ("Query to get data from reviews failed: ".mysqli_error());
	$reviews = array();
	$y = 0;
	while ($row = mysqli_fetch_assoc($reviews_r)) {
		foreach ($row as $k => $v) {
			$reviews[$y][$k] = $v;
		}
		$y++;
	}
	
?>

<?php

$page = $_SERVER['PHP_SELF'] ;

include ( 'hitcounter/counter.php');
addinfo($page);

?>

<head>
  <title>Bluesandmoreagain.com</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
	
    <?php include ("includes/header.html"); ?>
    
	<div id="site_content">
	
	<div id="welcome">
	      <h2><a href="#">Live Reviews</a></h2>
	    </div><!--close welcome-->
		
        <?php include ("includes/sub_header.html"); ?>
        
	  <div id="content">
        <div class="content_item">
          <p>“There ain't nothing in the world like a big eyed girl” (The Big Bopper)
          <br>
			“In my opinion, there's nothing in this world beats a 52 Vincent and a red headed girl” (Richard Thompson)
		  <br>
			But they didn’t see The Who in Glasgow in 1975 or Dexys at Shepherds Bush in 2012.
		  <br>
			Live performance is the testing ground for musicians. Fact.
		  <br><br> 
			Live reviews here.
          </p>
			
		</div><!--close content_item-->
		</div><!--close content-->
		  
	<div id="reviews">
		 	<div class="review_list">
		      
			  <?php
			  foreach ($reviews as $member) { 
			  foreach ($member as $k => $v) {
			  echo "<div class='review_list'>";
			  echo "<img ALIGN='Left' style='padding-right:30px' src='artwork_images/".$member['review_id'].".jpg',' width='300' height='300' alt='content image' />";
			  echo "<p style='position:relative; left:0px;'><b>".$member['artist']."</b>";
			  echo "<span style='float:right;'><b>".$member['date_added']."</b></span><br>";
			  echo "<i>".$member['title']."</i><br>";
			  echo $member['label'];
			  echo "<br><br>".$member['summary']."<br>";
			 echo "<br><a href='review.php?rid=".$member['review_id']."' class='readmore'>Read more</a>";
			  echo "</p>";
			 
			  echo "</div>";
			  break;
			  
		      }
			  }
				?>
			 </div>
			  
			  
			  
			  </div>
			  
		
      
	  
	</div><!--close site_content--> 
 
  </div><!--close main-->
  
     <?php include ("includes/footer.php"); ?> 
  
</body>
</html>
