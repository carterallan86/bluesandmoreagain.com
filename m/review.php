<!DOCTYPE html>
 <html lang="en">
	 
<?php

include('utils/connect_db.php');

	
	if (isset($_GET['rid'])) {
	$targetID = $_GET['rid'];		
    $sql = mysqli_query($link,"SELECT * FROM reviews WHERE review_id='$targetID' LIMIT 1");
    $productCount = mysql_num_rows($sql); // count the output amount
    if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
             $review_id = $row["review_id"];
			 $artist = $row["artist"];
			 $title = $row["title"];
			 $label = $row["label"];
			 $summary = $row["summary"];
			 $web1 = $row["web1"];
			 $web2 = $row["web2"];
			 $web3 = $row["web3"];
			 $review = $row["review"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 }
    } else {
	    echo "You have no products listed in your store yet";
		exit();
    }
}
	
?>

<?php

// Hitcounter
		$page = "review.php?rid=$targetID";
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
        
	  <div id="content">
        <div class="content_item">
          <h2><?php echo "<i>".$title."</i><br>";?></h2>
		</div><!--close content_item-->
	  
	  <?php echo "<img ALIGN='left' style='padding-right:30px' src='http://bluesandmoreagain.com/artwork_images/".$review_id.".jpg',' width='300' height='300' alt='content image' />";?>
	  
	  
	  <p style="position:relative; left:0px;">
		  
			  <?php echo "<b>".$artist."</b><br>";?>
			  <?php echo "<i>".$title."</i><br>";?>
			  <?php echo "".$label."<br>";?>
			  <?php echo "".$review."";?>
			  <br><br><a href="http://<?php echo "".$web1."";?>"><?php echo "".$web1."";?></a><br>
			  <a href="http://<?php echo "".$web2."";?>"><?php echo "".$web2."";?></a><br>
			  <a href="http://<?php echo "".$web3."";?>"><?php echo "".$web3."";?></a><br>
			  <?php echo "Date added:  ".$date_added."";?>
			  </p>
			  <br><br><br><a href="#" onclick="history.back();return false">Go Back To The Previous Page</a>
	  
	  
      </div><!--close content-->
	  
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
