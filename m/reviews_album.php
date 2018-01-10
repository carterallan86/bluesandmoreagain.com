<!DOCTYPE html>
 <html lang="en">
	 
<?php

include('utils/connect_db.php');

	
	$reviews_q="SELECT * FROM reviews WHERE category = 'Album' ORDER BY review_id DESC;";
	$reviews_r=mysql_query($reviews_q) or die ("Query to get data from reviews failed: ".mysql_error());
	$reviews = array();
	$y = 0;
	while ($row = mysql_fetch_assoc($reviews_r)) {
		foreach ($row as $k => $v) {
			$reviews[$y][$k] = $v;
		}
		$y++;
	} 
	
?>

<?php

$page = $_SERVER['PHP_SELF'] ;

include ( '../hitcounter/counter.php');
addinfo($page);

?>

<head>
  <meta charset="utf-8" />
  <title>Bluesandmoreagain</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 
  <link rel="stylesheet" media="all" href="style/style.css" type="text/css">
</head>

<body>
  <div class="wrap">
    <header>
      <div class="logo"><a href="index.php"><h1>Bluesandmoreagain.com</h1></a></div>
      <div class="options">
      	<ul>
      		<li>Menu</li>
      	</ul>
      </div>
      <div class="clear"></div>
	    
	    </div>
	    <nav class="vertical menu">
	    	<ul>
	            <li><a href="index.php">Home</a></li>
				<li><a href="reviews_album.php">Reviews</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="contents.php?sort=0">Review Index</a></li>
        	</ul>
	    </nav>
    </header>
    
        
    	<div id="site_content">
	
	<div id="welcome">
	      <h2><a href="#">Album Reviews</a></h2>
	    </div><!--close welcome-->
		
        <div id="menu_items">
		<ul id="menu">
            <li class="current"><a href="reviews_album.php">Album</a></li>
            <li><a href="reviews_live.php">Live</a></li>
            <li><a href="reviews_book.php">Book</a></li>
            <li><a href="reviews_other.php">Other</a></li>
			</div><!--close menu-->
          </ul>
	  <div id="content">
        <div class="content_item">
          <p>The reason this site exists. We built this city on rock n roll and all that.<br>
			<br>This is the place for reviews of CDs mainly, but books about rock n roll and, of course, live gigs may feature here too.<br></p>
			
		</div><!--close content_item-->
		</div><!--close content-->
		  
	<div id="reviews">
		 	<div class="review_list">
		      
			  <?php
			  foreach ($reviews as $member) { 
			  foreach ($member as $k => $v) {
			  echo "<div class='review_list'>";
			  echo "<img ALIGN='Left' style='padding-right:30px' src='http://bluesandmoreagain.com/artwork_images/".$member['review_id'].".jpg',' width='300' height='300' alt='content image' />";
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
 
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
   window.addEventListener("load",function() {
	  // Set a timeout...
	  setTimeout(function(){
	    // Hide the address bar!
	    window.scrollTo(0, 1);
	  }, 0);
	});
   $('.search-box,.menu' ).hide();   
   $('.options li:first-child').click(function(){	
   		$(this).toggleClass('active'); 	
   		$('.search-box').toggle();        			
   		$('.menu').hide();  		
   		$('.options li:last-child').removeClass('active'); 
   });
   $('.options li:last-child').click(function(){
   		$(this).toggleClass('active');      			
   		$('.menu').toggle();  		
   		$('.search-box').hide(); 
   		$('.options li:first-child').removeClass('active'); 		
   });
   $('.content').click(function(){
   		$('.search-box,.menu' ).hide();   
   		$('.options li:last-child, .options li:first-child').removeClass('active');
   });
</script>
 <?php include ("includes/footer.php"); ?> 
</body>
</html>
