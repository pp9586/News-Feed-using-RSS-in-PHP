<?php
//databse connection, included in all files 
$link = mysql_connect("localhost","root","");
mysql_select_db("newsfeeds",$link);
?>
