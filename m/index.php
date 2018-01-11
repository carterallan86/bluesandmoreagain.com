<!DOCTYPE html>
 <html lang="en">
	 
<?php 

include "utils/connect_db.php"; 

// This block grabs the whole list for viewing
$sidebar_list = "";
$sql = mysqli_query($link,"SELECT * FROM reviews ORDER BY review_id DESC LIMIT 5");
$reviewCount = mysql_num_rows($sql); // count the output amount
if ($reviewCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
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
$sql_home = mysqli_query($link,"SELECT * FROM manage_style WHERE style_id='1'");
$count = mysql_num_rows($sql_home); // count the output amount
if ($count > 0) {
	while($row = mysql_fetch_array($sql_home)){ 
             $home_text = $row["home_text"];
    }
} else {
	$home_text = "You have nothing written";
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

	  <div class="sidebar_container">       
		
	  <div id="content">
        
		<div class="content_item">
		  
		  <h1>Introduction</h1> 
	      <br>
	      <?php echo $home_text; ?> 
		  
	  </div><!--close content--> 
	  
	  		<div class="sidebar">
          <div class="sidebar_item">
            <h2>Website updates</h2>
            <p>Please find below my most recently added reviews.</p>
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->     		
		
		<div class="sidebar">
          <div class="sidebar_item">
           <?php echo $sidebar_list; ?>        
		  </div><!--close sidebar_item--> 
        </div><!--close sidebar-->
	
      </div><!--close sidebar_container-->	
	  
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
