<?php
$con=mysql_connect("127.0.0.1","root");
if(!$con)
{
die('could not connect:' . mysql_error());
}
session_start();
mysql_select_db("library", $con);
$username=$_SESSION['login_user'];
$result=mysql_query("UPDATE `fine` SET `amt` = '0' WHERE `fine`.`usn` = '$username'"); 
 header("Location: login.php");


?>