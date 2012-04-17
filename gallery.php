<!doctype html>
<html>
    <head>
<style type="text/css">
	#galleria{height:467px}
</style>
        <script src="javascript/jquery-1.7.1.min.js"></script>
		<script src="galleria/galleria-1.2.7.min.js"></script>
		<link type="text/css" rel="stylesheet" href="galleria/themes/classic/galleria.classic.css">
		<script type="text/javascript" src="galleria/themes/classic/galleria.classic.min.js"></script>
    </head>
    <body>
<div id="galleria">
<?
  $user = 'app3966440';
  $pass = 'admin';
  $host = 'instance11231.db.xeround.com';
  $db_name = 'app3966440';
  $port = 7638;

  $num = 10;
  
  // set up universal connection string or DSN
  $con = new mysqli($host,$user,$pass,$db_name,$port);
  $stmt = $con->prepare("select concern_id, concern_title, concern_desc, image_name from concern_table order by concern_id desc limit $num") ;

 if ( false===$stmt ) {
  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}

$rc = $stmt->bind_result($concern_id,$concern_title,$concern_desc,$image_name);

if ( false===$rc ) {
  // again execute() is useless if you can't bind the parameters. Bail out somehow.
  die('bind_param() failed: ' . htmlspecialchars($stmt->error));
}

   $stmt->execute();
   while($stmt->fetch())
   {
	if(strlen($concern_desc)>80)
	{
		$desc = substr($concern_desc,0,80) . '&#133;';
	}	
	else
	{
		$desc = $concern_desc;
	}
	if($image_name != "")
	{
		echo "<img src='uploads/$image_name' data-title='$concern_title' data-description='$desc' longdesc='viewlist.php?id=$concern_id'/>";
	}
   }

?>
</div>

 <script>
	$('#galleria').galleria({
	width: 700,
	height: 467
	});

    Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('#galleria');

 </script>
    </body>
</html>

