
<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #660066;
	font-size: 36px;
	font-weight: bold;
}
.style2 {
	color: #00CC00;
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</head>

<body bgcolor="#333333">
<div align="center"><span class="style1">WELCOME TO THE LIBRARY, NMIT. </span></div>
<p align="right" class="style3"><a href="logout.php">LOGOUT</a></p>
<table width="100%" height="369" border="0">
  <tr>
    <td width="24%" height="365" align="center" valign="top"><p align="left" class="style2">NAME : Ravi:</p>
      <p align="left" class="style2">USN : NITTE-123:</p>
      <table width="58%" height="161" border="0">
      <tr>
        <td bgcolor="#00FF00" height="157"><img src="Resource id #6" /></td>
      </tr>
    </table></td>
    <td width="46%" align="center" valign="top" class="style2"><p>BOOK ISSUE DETAILS </p>
    <p>&nbsp;</p>
    <form id="form1" name="form1" method="post" action="issue.php">
      <label>BOOK ID: 
        <input type="text" name="textfield" />
        </label>
      <p>
        <label>
        <input type="submit" name="Submit" value="Submit" />
        </label>
        <label>
        <input type="submit" name="Submit2" value="Reset" />
        </label>
      </p>
    </form>    <p>&nbsp;</p></td>
    <td width="30%" align="center" valign="top" class="style2"><p>BOOK RETURN DETAILS </p>
      <table width="100%" height="212" border="0">
        <tr>
          <td width="57%" valign="top"><p align="right"></p>
            <p align="right">&nbsp;</p>
          <p align="right"></p></td>
          <td width="43%" valign="top" class="style2"><p>
		   <?php
		  $con=mysql_connect("127.0.0.1","root");
if(!$con)
{
die('could not connect:' . mysql_error());
}


$username=$_SESSION['login_user'];
$k=0;

$a=array();
mysql_select_db("library", $con);
$arr=mysql_query("SELECT BOOK_NAME FROM books WHERE BOOK_ID IN(SELECT bkid FROM issu1 WHERE usn='$username')"); 
while($row=mysql_fetch_array($arr))
{
$a[]=$row;
}
foreach($a as $post)
{
echo "<p>".$post[0]."</p>";
}

?>
</p>



          <p>&nbsp;</p>
                   <p>&nbsp;</p></td>
        </tr>
      </table>      
      <table width="100%" height="52" border="0">
        <tr>
          <td width="68%" height="48" valign="top"><div align="right">FINE AMOUNT= Rs.</div></td>
          <td width="32%" valign="top"><div align="left"></div></td>
        </tr>
      </table>      <p>&nbsp;</p>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>