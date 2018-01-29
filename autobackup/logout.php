<?php
$con=mysql_connect("127.0.0.1","root");
if(!$con)
{
die('could not connect:' . mysql_error());
}
session_start();
mysql_select_db("library", $con);
$username=$_SESSION['login_user'];

if(session_destroy())
{
header("Location: ind.html");
}
}

?>