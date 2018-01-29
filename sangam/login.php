<?php
$con=mysql_connect("127.0.0.1","root");
if(!$con)
{
die('could not connect:' . mysql_error());
}
session_start();

$username = mysql_escape_string($_POST['usn']);
$_SESSION['login_user']=$username;

mysql_select_db("library", $con);
$daten=(new\DateTime())->format('Y-m-d');
$image=mysql_query("SELECT link FROM students WHERE usn='$username'");
$rim=mysql_fetch_array($image);
$image2=$rim[0];

$result=mysql_query("SELECT name FROM Students WHERE usn='$username'");
$row = mysql_fetch_array($result);
 $name2= $row[0];
 
$a2=array();
$arw2=mysql_query("SELECT `bkid` FROM `issu1` WHERE `issu1`.`usn`='$username'"); 
while($rw2=mysql_fetch_array($arw2))
{
$a2[]=$rw2;
}
$famt=0;
foreach($a2 as $post2)
{
$dtq1=mysql_query("SELECT ISSUE_DATE FROM issu1 WHERE bkid='$post2[0]'");
$rd = mysql_fetch_array($dtq1);
 $dt1= $rd[0];
$dtq2=mysql_query("SELECT `RETURN_DATE` FROM `issu1` WHERE `issu1`.`bkid`='$post2[0]'");
$rd2 = mysql_fetch_array($dtq2);
 $dt2= $rd2[0];
$isup=mysql_query("UPDATE `issu1` SET `RETURN_DATE` = '$daten' WHERE `issu1`.`bkid` ='$post2[0]'");
$dtdiffe=floor(abs($dt2-$dt1)/86400);
if($dtdiffe>7)
{
$famt+=$dtdiffe-7;
}
}




$acc=$username.'.php';
$accf=fopen($acc,'w');

 $p1='
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
    <td width="24%" height="365" align="center" valign="top"><p align="left" class="style2">NAME : ';
 
 
 
 $p2=':</p>
      <p align="left" class="style2">USN : ';
 
 
 $p3='</p>
      <table width="58%" height="161" border="0">
      <tr>
        <td bgcolor="#00FF00" height="157"><img src="';
		
 $p4='" /></td>
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
          <td width="57%" valign="top"><p align="right">';
$p5='</p>
            <p align="right">&nbsp;</p>
          <p align="right">';
 
 
 $p6='</p></td>
          <td width="43%" valign="top" class="style2"><p>
		   <?php
		  $con=mysql_connect("127.0.0.1","root");
if(!$con)
{
die(\'could not connect:\' . mysql_error());
}


$username=$_SESSION[\'login_user\'];
$k=0;

$a=array();
mysql_select_db("library", $con);
$arr=mysql_query("SELECT BOOK_NAME FROM books WHERE BOOK_ID IN(SELECT bkid FROM issu1 WHERE usn=\'$username\')"); 
while($row=mysql_fetch_array($arr))
{
$a[]=$row;
}
foreach($a as $post)
{
echo "<p><a href=\"submit.php\">".$post[0]."</a></p>";
}

?>
</p>


           <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
		  <form id="form3" name="form3" method="post" action="subm.php">
            <label><span class="style3">Return Book
              :
            </span>
            <input type="text" name="textfield2" />
              </label>
            <p>
              <label>
              <div align="center">
                 <input type="submit" name="Submit4" value="Submit" />
              </div>
              </label>
            </p>
          </form>
          <p>&nbsp;</p></td>
        </tr>
      </table>      
      <table width="100%" height="52" border="0">
        <tr>
          <td width="68%" height="48" valign="top"><div align="right">FINE AMOUNT= Rs.</div></td>
          <td width="32%" valign="top"><div align="left"><P>';
		  $sp7='</p></div></td>
        </tr>
      </table>      
<form id="form2" name="form2" method="post" action="paid.php">
        <label>
          <input type="checkbox" name="checkbox" value="checkbox" />
          PAID</label>
        <p>
          <label>
          <input type="submit" name="Submit3" value="Submit" />
          </label>
        </p>
      </form>     


    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>';
$fine1=0;
$fn9=mysql_query("SELECT `amt` FROM `fine` WHERE `fine`.`usn`='$username'");
$fnt = mysql_fetch_array($fn9);
 $fine1= $fnt[0];

 $acc=$username.'.php';
 $ac_str=$p1.''.$name2.''.$p2.''.$username.''.$p3.''.$image2.''.$p4.''.$book1.''.$p5.''.$p6.''.$fine1.''.$sp7;
 fwrite($accf,$ac_str);
 header("Location:".$acc);


?>