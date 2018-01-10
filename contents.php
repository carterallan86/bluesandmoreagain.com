<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">


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
                        $sort = ' ORDER BY category';
                        break; 
            case 4:
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
			 $category = $row["category"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $review_list .= " 
				<tr>
                <td>$artist</td>
                <td>$title</td>
                <td>$label</td>
                <td>$category</td>
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
	  
      <div id="content">
        <div class="content_item">
          <h1>Index of uploaded review.. sort however you like</h1> 
          <p />Sort by...
			<a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=0";?>">Artist</a>
			<a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=1";?>">Title</a>
			<a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=2";?>">Label</a>
			<a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=3";?>">Category</a>
			<a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=4";?>">Date</a>
          <table width="1000" align="center" border='1'>
            <tr>
                <th>Artist</th>
                <th>Title</th>
                <th>Label</th>
                <th>Category</th>
                <th>Date Added</th>
                <th>Quick Link</th>
             </tr>
             <?php echo $review_list; ?> 
            </table>   
	    </div><!--close content_item-->
      </div><!--close content-->
	  
	</div><!--close site_content--> 	
 
  </div><!--close main-->
  
     <?php include ("includes/footer.php"); ?> 
  
</body>
</html>
