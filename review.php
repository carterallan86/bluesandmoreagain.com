
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">


<?php

include('utils/connect_db.php');


	
	if (isset($_GET['rid'])) {
	$targetID = $_GET['rid'];		
    $sql = mysqli_query($link,"SELECT * FROM reviews WHERE review_id='$targetID' LIMIT 1");
    $productCount = mysqli_num_rows($sql); // count the output amount
    if ($productCount > 0) {
	    while($row = mysqli_fetch_array($sql)){ 
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

		
		// retrive comments with review_id
		$comment_query = mysqli_query($link,
			"SELECT *
			FROM comment
			WHERE review_id ='$targetID'
			ORDER BY id DESC
			LIMIT 15");
		
			
	
?>

<?php

// Hitcounter
		$page = "review.php?rid=$targetID";
		include ( 'hitcounter/counter.php');
		addinfo($page);

?>


<head>
	<title>Bluesandmoreagain Review Page</title>
	<meta charset="utf-8" />
	<meta name = "viewport" content = "width=device-width, maximum-scale = 1, minimum-scale=1" />
	<link rel="stylesheet" type="text/css" href="style/style.css" media="all" />
	<link rel="stylesheet" href="style/comment_style.css" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/comment_script.js"></script>



<body>
  <div id="main">
	
    <?php include ("includes/header.html"); ?>
   
     
		
	<div id="site_content">
        
	  <div id="content">
        <div class="content_item">
          <h2><?php echo "<i>".$title."</i><br>";?></h2>
		</div><!--close content_item-->
	  
	  <?php echo "<img ALIGN='left' style='padding-right:30px' src='artwork_images/".$review_id.".jpg',' width='300' height='300' alt='content image' />";?>
	  
	  
	  <p style="position:relative; left:0px;">
		  
			  <?php echo "<b>".$artist."</b><br>";?>
			  <?php echo "<i>".$title."</i><br>";?>
			  <?php echo "".$label."<br>";?>
			  <?php echo "".$review."";?>
			  <br><br><a href="http://<?php echo "".$web1."";?>"><?php echo "".$web1."";?></a><br>
			  <a href="http://<?php echo "".$web2."";?>"><?php echo "".$web2."";?></a><br>
			  <a href="http://<?php echo "".$web3."";?>"><?php echo "".$web3."";?></a><br>
			  <?php echo "Date added:  ".$date_added."";?>
			  </p><br>
			  <?php echo "<a href='https://www.facebook.com/sharer/sharer.php?u=http://www.bluesandmoreagain.com/review.php?rid=".$targetID."' target='_blank'>Share on Facebook</a>";?>
			  		  
			  <br><br><br><a href="#" onclick="history.back();return false">Go Back To The Previous Page</a>
			</div> 
			  
			 
			 
			<?php /* <div class="content_item"> 
		<div class="center">
				<h2>Comments.....</h2>
					<div class="comment-block">
					<?php while($comment = mysqli_fetch_array($comment_query)): ?>
						<div class="comment-item">
							<div class="comment-avatar">
								<img src="style/comment_thumb.jpg" alt="avatar">
							</div>
							<div class="comment-post">
								<h3><?php echo $comment['name'] ?> <span>said....</span></h3>
								<p><?php echo $comment['comment']?></p>
							</div>
						</div>
					<?php endwhile?>
					</div>
				
				
				<h2>Submit new comment</h2>
				<!--comment form -->
					<form id="form" method="post" onsubmit="setTimeout(function () { window.location.reload(true); }, 10)">
						<!-- need to supply post id with hidden fild -->
						<input type="hidden" name="reviewid" value="<?php echo $targetID?>">
						<label>
							<span>Name *</span>
							<input type="text" name="name" id="comment-name" placeholder="Your name here...." required>
						</label>
						<label>
							<span>Your comment *</span>
							<textarea name="comment" id="comment" cols="30" rows="10" placeholder="Type your comment here...." required></textarea>
						</label>
						<input type="submit" id="submit" value="Submit Comment">
					</form>
				</div>	
			*/
			?>
				
	  
	  
      </div><!--close content-->

	  
	</div><!--close site_content--> 
 
  </div><!--close main-->
  
     <?php include ("includes/footer.php"); ?> 
  
</body>
</html>
