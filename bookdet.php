<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {	color: #660066;
	font-size: 36px;
	font-weight: bold;
}
.style2 {color: #0000FF}
.style3 {font-weight: bold}
-->
</style>
</head>

<body>
<div align="center"><span class="style1">WELCOME TO THE LIBRARY, NMIT. </span>
</div>
<p align="center" class="style3"> <span class="style2">DETAILS OF ALL THE BOOKS ARE PRINTED BELOW</span>:  </p>

<p align="center" class="style3">&nbsp;</p>
<p align="center" class="style3">&nbsp;</p>
<p align="center" class="style3">
<?php
$con = mysql_connect("127.0.0.1","root");
if (!$con){
die('Could not connect: ' . mysql_error());
}
mysql_select_db("library", $con);
$pri=mysql_query("SELECT * FROM books");
$a=array();
echo'
<table width="100%" border="0"><tr><td>BOOK_ID </td><td>BOOK_NAME</td><td>AUTHOR_NAME </td><td>PUBLISHED_YEAR </td><td>PUBLISHER_NAME</td><td>Cost</td></tr>';


while($row=mysql_fetch_row($pri))
{
$a[]=$row;


}
foreach($a as $post)
{
echo"
<tr>
    <td>".$post[0]." </td>
    <td>".$post[1]."</td>
    <td>".$post[2]."</td>
    <td>".$post[3]." </td>
    <td>".$post[4]."</td>
    <td> Rs.".$post[5]."</td>
  </tr>";
}
echo"</table>";
?>
</p>
<p align="center" class="style3">&nbsp;</p>
<p align="center" class="style3"><a href="login.php">GO-BACK</a></p>
</body>
</html>
