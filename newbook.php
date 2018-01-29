<?php
$con = mysql_connect("127.0.0.1","root");
if (!$con){
die('Could not connect: ' . mysql_error());
}
session_start();
$username=$_SESSION['LOGIN_USER'];
 
$bookid = mysql_escape_string($_POST['bid']);
$bname = mysql_escape_string($_POST['bnme']);
$aname = mysql_escape_string($_POST['aname']);
$pyear = mysql_escape_string($_POST['pyear']);
$pname = mysql_escape_string($_POST['pname']);
$cost = mysql_escape_string($_POST['cost']);

 
 
mysql_select_db("library", $con);
$sql="INSERT INTO books VALUES('$bookid','$bname','$aname','$pyear','$pname','$cost')";
 
if (!mysql_query($sql,$con))
{
die('Error: ' . mysql_error());
}
else{
header("Location:ind.html");
}
mysql_close($con);
?>