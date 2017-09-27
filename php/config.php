<?php 
$conn = mysql_connect("localhost","root","ltw23");
if(!$conn) 
{
die('Could not connect : '.mysql_error());
}
mysql_select_db('taxi');
?>

