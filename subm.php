<?php
$con=mysql_connect("127.0.0.1","root");
if(!$con)
{
die('could not connect:' . mysql_error());
}
session_start();
mysql_select_db("library", $con);
$username=$_SESSION['login_user'];
$bkname = mysql_escape_string($_POST['textfield2']);
$ret=mysql_query("DELETE FROM issu1 WHERE bkid IN(SELECT BOOK_ID FROM BOOKS WHERE BOOK_NAME='$bkname')");
$date=(new\DateTime())->format('Y-m-d');
if (!$ret)
{
die('Error: ' . mysql_error());
}
else{
$up=mysql_query("UPDATE record SET returndate='$date' WHERE book_id IN(SELECT BOOK_ID FROM books WHERE BOOK_NAME='$bkname')");
 header("Location: login.php");

}
?>