<?php
$con=mysql_connect("127.0.0.1","root");
if(!$con)
{
die('could not connect:' . mysql_error());
}
session_start();
$bookid = mysql_escape_string($_POST['textfield']);

mysql_select_db("library", $con);


$date=(new\DateTime())->format('Y-m-d');
$iss_id=$_SESSION['login_user'];
$sql3=mysql_query("INSERT INTO issu1 VALUES('$iss_id','$bookid','$date','$date')");




$sql2=mysql_query("INSERT INTO record VALUES('$iss_id','$bookid','$date','$date')");
header("Location: login.php");

?>