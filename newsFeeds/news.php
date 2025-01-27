<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>News Aggregator</title>
	<link rel="stylesheet" href="style_signup.css" type="text/css" charset="utf-8" />
</head>
<script type="text/javascript">
function validate()
{
		var name=document.getElementById("txtname").value;
		var email=document.getElementById("txtemail").value;
		
		var subject=document.getElementById("txtsub").value;
		var message=document.getElementById("txtmsg").value;
		if(name=="")
		{
					alert("Enter your  name");
					return false;
		}
		else if(email=="")
		{
					alert("Enter your mail Id");
					return false;
		}
		
		else if(subject=="")
		{
					alert("Enter Subject for the mail");
					return false;
		}
		else if(message=="")
		{
					alert("Enter your message");
					return false;
		}
		return true;
}
</script>
<body>
<form id="contact" action="news.php" method="post">

  <div id="wrapper">
    <h1>...The <strong>Worldwide</strong> News...</h1>
    <div id="top-nav">
      <ul>
        <li><a href="signin.php">sign in</a> &nbsp;&nbsp;|&nbsp;&nbsp; </li>
        <li><a href="index.php">sign out</a></li>
      </ul>
    </div>
    <div id="mmagic"> </div>
    <div id="header"> </div>
    <div id="spacer"> </div>
    <div id="body">
      <div id="left" style="width:730px">
        <div id="nav">
          <ul>
            <li ><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="signup.php">Registration</a></li>
            <li class="drk"><a href="news.php">News</a></li>
            <li><a href="contactus.php">Contact us</a></li>
               <li></li>
              <li style=" border-left-color:#646C79; border-left-width:7px"></li>
            
          </ul>
          <div class="clear"> </div>
        </div>
        <div id="visit" >
        <h2><strong>News Feeds...<br></strong></h2>
        
           <div id="cat" style="color: #000000;font-weight:bold;">
       <!-- get category list ----------------------------------------------------- -->
            <?php
			    require("conn.php");
				if(isset($_GET['uid']))
				 {
				    $id=$_GET['uid'];
				    $arry=array();
				    $qry_get_catids="select * from user_news_category where user_id=".$id."";
				    $rs_cat_id=mysql_query($qry_get_catids);
				    $i=0;
				    while($row_catids=mysql_fetch_array($rs_cat_id))
				      {
				        $arry[$i]=$row_catids['cat_id'];
				        $i++;
				      }
				   for($j=0;$j<sizeof($arry);$j++)
				      {
				        $qry_cat_data="select * from category where cat_id=".$arry[$j];
				        $rs_cat_data=mysql_query($qry_cat_data);
				        $row_cat_data=mysql_fetch_array($rs_cat_data);
				        echo "<a href='news.php?file=".$row_cat_data['cat_name']."&catid=".$arry[$j]."'>".$row_cat_data['cat_name']."</a>&nbsp;|&nbsp;";
				      }
				}
				
			?>
       <!-- end category list --------------------------------------------------------- -->    
        <!--   <a href="news.php?file=cricket">Cricket</a>  <a href="news.php?file=cricket">Politics</a> | <a href="news.php?file=cricket">Education</a> | <a href="news.php?file=cricket">Fashion</a> -->
            </div>
        
            <div id="dis" background-color:#FF9900"><br><br>
           <?php
		   echo  "<font size=5><b>".$_GET['file']."</b></font>";
		   if(isset($_GET['file']))
		   {
		   $file=$_GET['file'];
		   $id=$_GET['catid'];
		   //echo $file;
		   include("cricket.php");
		   }
		   ?>
            </div>
        
        </div>
        
        <div id="subs"></div>
      </div>
      <div class="clear"> </div>
    </div>
    <div id="copyright">
 <p><span class="style9">&copy;</span> News Feeds. All rights reserved</p>
    </div>
  </div>
</form>
</body>
</html>
