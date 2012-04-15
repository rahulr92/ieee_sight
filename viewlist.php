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
  $user = 'app3966440';
  $pass = 'admin';
  $host = 'int.instance11231.db.xeround.com:7638';
  $db_name = 'ieee_click';

  // set up for using DB - localhost
#  $user = 'root';
#  $pass = '';
#  $host = 'localhost';
#  $db_name = 'ieee_click';
  
  if(isset($_GET['num']))
	$num = 	$_GET['num'];
  else
	$num = 10;

	
  // set up universal connection string or DSN
  $con = new mysqli($host,$user,$pass,$db_name);
  if(isset($_GET['id']))
	{
		$id = $_GET['id'];
 		$stmt = $con->prepare("select * from concern_table where concern_id = $id") ;
	} 
else
 	$stmt = $con->prepare("select * from concern_table order by concern_id desc limit $num") ;

 if ( false===$stmt ) {
  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}

$rc = $stmt->bind_result($fb_id,$fb_name,$section,$sb,$uname,$concern_id,$concern_title,$concern_desc,$ready_volunteer,$concern_soln,$estimate_cost,$ready_team,$image_name,$votes);

if ( false===$rc ) {
  // again execute() is useless if you can't bind the parameters. Bail out somehow.
  die('bind_param() failed: ' . htmlspecialchars($stmt->error));
}

   $stmt->execute();
   while($stmt->fetch())
   {
	echo '<hr/>';
	echo "<h2 class='heading'>$concern_title</h2>";
	if($image_name != "")
	{
		echo "<img src='uploads/$image_name'></img>";
	}

	echo "<br /><h3 class='subheading'>Description</h3><p>$concern_desc</p>";
	echo "<h3 class='subheading'>Suggested Solution</h3><p>$concern_soln</p>";
	echo "<h3 class='subheading'>Estimated Cost</h3><p>$estimate_cost</p>";
	echo "<div><h3 class='subheading'>Votes</h3>$votes<br /><a href='#'>Vote for this concern</a></div>";
	echo "<div><a href='#'>Show comments</a><br /><a href='#'>Comment on this concern</a></div>";
   }

?>
    </body>
</html>

