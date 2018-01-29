<?php
$con = mysql_connect("127.0.0.1","root");
if (!$con){
die('Could not connect: ' . mysql_error());
}
 
$name = mysql_escape_string($_POST['name']);
$usn = mysql_escape_string($_POST['usn']);
$course = mysql_escape_string($_POST['course']);
$branch = mysql_escape_string($_POST['branch']);
$sem = mysql_escape_string($_POST['sem']);
$img = mysql_escape_string($_POST['img']);
$phone = mysql_escape_string($_POST['phone']);
$email = mysql_escape_string($_POST['email']);

 
 
mysql_select_db("library", $con);
$sql="INSERT INTO Students VALUES('$name','$usn','$course','$branch','$sem','$img','$phone','$email')";
 
if (!mysql_query($sql,$con))
{
die('Error: ' . mysql_error());
}
else{
header("Location:ind.html");
}
mysql_close($con);
?>