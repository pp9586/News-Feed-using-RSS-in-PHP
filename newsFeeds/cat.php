<?php
    include("conn.php");
    if(isset($_POST['submit_cat']))
	 {
	   $catname=$_POST['cat_name'];
	   $catlink=$_POST['cat_id'];
	   $qry_addcat="insert into category (cat_name,cat_link)values('".$catname."','".$catlink."')";
	   mysql_query($qry_addcat);
     }
	if(isset($_GET['delid']))
	{
	  $qrydel="delete from category where cat_id=".$_GET['delid'];
	  //echo "QRY=".$qrydel;
	  mysql_query($qrydel);
	} 
?>

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

function delme(id)
 {
    if(confirm("you want to delete this!"))
	 {
      document.cat_mng.action="cat.php?delid="+id;
	  document.cat_mng.submit();
	 }
 }
</script>
<body>
<form id="cat" name="cat_mng" action="cat.php" method="post">

  <div id="wrapper">
    <h1>...The <strong>Worldwide</strong> News...</h1>
    <div id="top-nav">
      <ul>
        <li><a href="index.php">Logout</a></li>
      </ul>
    </div>
    <div id="mmagic"> </div>
    <div id="header"> </div>
    <div id="spacer"> </div>
    <div id="body">
      <div id="left" style="width:730px">
        <div id="nav">
          <ul>
            <li class="drk"><a href="cat.php">Category</a></li>
            <li><a href="usermanager.php">User Manager</a></li>
            <li></li>
            <li style=" border-left-color:#646C79;"></li>
            <li style=" border-left-color:#646C79;"></li>
               <li style=" border-left-color:#646C79;"></li>
              <li style=" border-left-color:#646C79; border-left-width:7px"></li>
            
          </ul>
          <div class="clear"> </div>
        </div>
        <div id="visit" style="height:400px; padding-left:200px">
         	
              <h2><strong><br><br>
              Create Category...</strong></h2>
           
          <br>
          <table width="360" height="101" border="0" bgcolor="#B1B6BF">
            <tr>
              <td width="90" height="33"><strong>Category Name </strong></td>
              <td width="260"><input type="text" name="cat_name" id="cat_name" /></td>
            </tr>
            <tr>
              <td height="34"><strong>Feed URL</strong></td>
              <td><input name="cat_id" type="text" id="cat_id" size="35" /></td>
            </tr>
            <tr>
              <td height="26" align="right">&nbsp;</td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="submit_cat" id="submit_cat" value="Create" />
              &nbsp;&nbsp;&nbsp;</td>
            </tr>
          </table>
          <br />
          <br />
              
           <table width="460" height="101" border="0" bgcolor="#B1B6BF">
            <tr>
               <td style="font-size:16px;color:#C0200E"> Name</td>
               <td align="center" style="font-size:16px;color:#C0200E">Link</td>
            </tr>
           <?php
             $qrycatlist="select * from category";
			 $rs_catlist=mysql_query($qrycatlist); 
			 while($row_catlist=mysql_fetch_array($rs_catlist))
			 {
		   ?>
              <tr>
                  <td><?=$row_catlist['cat_name'];?></td>
                  <td><?=$row_catlist['cat_link'];?></td>
                  <td><input type="button" name="<?=$row_catlist['cat_id'];?>" id="<?=$row_catlist['cat_id'];?>"  onclick="delme(this.id);" value="delete" /></td>
              </tr>
           <?php
		     }
		   ?>
          </table>
          
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
