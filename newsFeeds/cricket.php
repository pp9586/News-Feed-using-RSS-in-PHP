<?php
//////////$file = "test.xml";
////////$file="http://rss.news.yahoo.com/rss/topstories";
/////////$file="http://www.hindu.com/rss/01hdline.xml";

//echo "URL=".$id."<br>";

$qry_getcat_link="select * from category where cat_id=".$id;
$rs_getcat_link=mysql_query($qry_getcat_link);
$row_get_link=mysql_fetch_array($rs_getcat_link);

$file=$row_get_link['cat_link'];
//$file="http://content-www.cricinfo.com/rss/content/feeds/news/2.xml";
$byte = "100000";
$ofile = @fopen("$file", "r");
 $contents = @fread ($ofile, $byte);
 @fclose($ofile);
 if(!$contents) 
{ 
echo "<p>\nUnable to Get XML/RSS data. Fatal Error.\n</p>";
 exit;
 } 
preg_match_all ("'<title>(.*?)</title>'si", $contents, $titles);
 preg_match_all ("'<link>(.*?)</link>'si", $contents, $link); 
 preg_match_all ("'<description>(.*?)</description>'si", $contents, $description); 
$count = count($titles[1]); $link = $link[1]; $titles = $titles[1]; $description = $description[1];
echo "<p>\n"; 
for($i = 0; $i <= $count; $i++)
 { 
echo "<a href=\"$link[$i]\">$titles[$i]</a>\n<br />\n"; 
echo "<br>";
echo "<b>";
echo $description[$i];
echo "</b>";
echo "<br>";
echo "<br>";
}
 echo "</p>";
 ?> 