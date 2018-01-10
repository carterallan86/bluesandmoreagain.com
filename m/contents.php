<!DOCTYPE html>
 <html lang="en">
	 
<?php 

include "utils/connect_db.php"; 


$sort = "";
        if(isset($_GET['sort'])) {
            switch ($_GET['sort'] ) {
            case 0: 
                        $sort = " ORDER BY artist"; 
                        break;
            case 1:
                        $sort = ' ORDER BY title';
                        break;
            case 2:
                        $sort = ' ORDER BY label DESC';
                        break;
            case 3:
                        $sort = ' ORDER BY date_added DESC';
                        break;            
            }
        }
// This block grabs the whole list for viewing
$review_list = "";
$sql = mysql_query("SELECT * FROM reviews". $sort);
$reviewCount = mysql_num_rows($sql); // count the output amount
if ($reviewCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $review_id = $row["review_id"];
			 $artist = $row["artist"];
			 $title = $row["title"];
			 $label = $row["label"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $review_list .= " 
				<tr>
                <td>$artist</td>
                <td>$title</td>
                <td>$label</td>
                <td>$date_added</td>
                <td><a href='review.php?rid=$review_id' >Go To Review</a></td>
				</tr>
			 ";
    }
} else {
	$review_list = "You have no recent reviews added";
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
	  
      <div id="content">
        <div class="content_item">
          <h1>Index of uploaded review.. sort however you like</h1> 
          <p />Sort by...
			<a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=0";?>">Artist</a>
			<a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=1";?>">Title</a>
			<a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=2";?>">Label</a>
			<a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=3";?>">Date</a>
          <table width="1000" align="center" border='1'>
            <tr>
                <th>Artist</th>
                <th>Title</th>
                <th>Label</th>
                <th>Date Added</th>
                <th>Quick Link</th>
             </tr>
             <?php echo $review_list; ?> 
            </table>   
	    </div><!--close content_item-->
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
