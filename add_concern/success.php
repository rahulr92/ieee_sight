
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Concern registered successfully</title>
<!--<link href="file:///C|/wamp/www/rahul/style.css" rel="stylesheet" type="text/css" />
--></head>

<body>
<?php

if(is_uploaded_file($_FILES["upload"]["tmp_name"]))
{
copy($_FILES["upload"]["tmp_name"],"../uploads/". $_FILES["upload"]["name"]);
}

$con = new mysqli("instance11231.db.xeround.com:7638","app3966440","admin","ieee_click");
$stmt= $con->prepare("insert into concern_table(fb_id,fb_name,section,sb,sight_uname,concern_title,concern_desc,ready_volunteer,solution_idea,estimate_cost,ready_team,image_name) values(?,?,?,?,?,?,?,?,?,?,?,?)");


if ( false===$stmt ) {
  // and since all the following operations need a valid/ready statement object
  // it doesn't make sense to go on
  // you might want to use a more sophisticated mechanism than die()
  // but's it's only an example
  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}

$rc = $stmt->bind_param('ssssssssssss',$_POST['fb_id'],$_POST['fb_name'],$_POST['section'],$_POST['sb'],$_POST['uname'],$_POST['concern_title'],$_POST['concern_desc'],$_POST['ready_volunteer'],$_POST['concern_soln'],$_POST['estimate_cost'],$_POST['ready_team'],$_FILES['upload']['name']);

if ( false===$rc ) {
  // again execute() is useless if you can't bind the parameters. Bail out somehow.
  die('bind_param() failed: ' . htmlspecialchars($stmt->error));
}

$rc = $stmt->execute();

if ( false===$rc ) {
  die('execute() failed: ' . htmlspecialchars($stmt->error));
}

$stmt->close();

echo "Your concern has been successfully registered.";
?>
<br />
<a href="#">
Share your concern.
</a>
<br />
<a href="../index.php">
Home
</a>
</body>
</html>
