<!doctype html>
<html>
    <head>
    <title>List of Humanitarian Concerns</title>
    <link rel="stylesheet" href="stylesheets/screen.css" media="Screen" type="text/css" />
    <link rel="stylesheet" href="stylesheets/mobile.css" media="handheld, only screen and (max-width: 480px), only screen and (max-device-width: 480px)" type="text/css" />
    </head>
    <body>
<section id="get-started">
<p>Top Humanitarian Concerns</p>
<a href="index.php" class="button">Home</a>
</section>
<?php

  // set up for using DB - production
include('classes/clsDataBase_Connection.php');
$connObj = new dbConnect();
  
  if(isset($_GET['num']))
	$num = 	$_GET['num'];
  else
	$num = 10;

	
  // set up universal connection string or DSN
  if(isset($_GET['id']))
	{
		$id = $_GET['id'];
 		$query = "select * from concern_table where concern_id = $id" ;
		$result = new dbQuery($query, $connObj->connId);
	} 
else
	{
 		$query = "select * from concern_table order by concern_id desc limit $num" ;
		//$result = new dbQuery($query, $connObj->connId);
 		 if (!($result = @ mysql_query ($query, $connObj->connId)))
      		showerror();
	}

    while($row =  mysql_fetch_array($result,  MYSQL_ASSOC))
   {

	echo '<hr/>';

	echo "<h2 class='heading'>".$row['concern_title']."</h2><br />";
	if($row['image_name'] != "")
	{
		echo "<img src='uploads/".$row['image_name']."></img>";
	}

	echo "<br /><h3 class='subheading'>Description</h3><p>".$row['concern_desc']."</p>";
	echo "<h3 class='subheading'>Suggested Solution</h3><p>".$row['solution_idea']."</p>";
	echo "<h3 class='subheading'>Estimated Cost</h3><p>".$row['estimate_cost']."</p>";
	echo "<div><h3 class='subheading'>Votes</h3>".$row['votes']."<br /><a href='#'>Vote for this concern</a></div>";
	echo "<div><a href='#'>Show comments</a><br /><a href='#'>Comment on this concern</a></div>";
   }

?>
    </body>
</html>

