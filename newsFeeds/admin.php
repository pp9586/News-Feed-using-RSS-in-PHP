<?php
    include("conn.php");
	if(isset($_POST['submit_admin']))
	{
	  $na=$_POST['un'];
	  $pwd=$_POST['pw'];
	  
	  $qrysearch_admin="select * from admin where user_name='".$na."' and password='".$pwd."'";
	  $rs_search_admin=mysql_query($qrysearch_admin);
	  if(mysql_num_rows($rs_search_admin)>0)
	    {
		?>
          <script language="javascript">
		     window.location="cat.php";
		  </script>  
        <?php
		}
	  else
	    {
	  ?>
         <script language="javascript">
		    alert("Invalid Admin user/password");
		 </script>
      <?php
		}
			
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
		var name=document.getElementById("un").value;
		var pwd=document.getElementById("pw").value;
		
		 
		if(name=="")
		{
					alert("Enter User Name");
					return false;
		}
		else if(pwd=="")
		{
					alert("Enter password");
					return false;
		}
		
		 
		return true;
}
</script>
<body>
<form id="signin" action="admin.php" method="post">

  <div id="wrapper">
    <h1>...The <strong>Worldwide</strong> News...</h1>
    <div id="top-nav">
      <ul>
        <li>ADMIN</li>
      </ul>
    </div>
    <div id="mmagic"> </div>
    <div id="header"> </div>
    <div id="spacer"> </div>
    <div id="body">
      <div id="left" style="width:730px">
        <div id="nav">
          <ul>
            <li style=" border-left-color:#646C79;" ></li>
            <li style=" border-left-color:#646C79;"></li>
            <li style=" border-left-color:#646C79;"></li>
            <li style=" border-left-color:#646C79;"></li>
            <li style=" border-left-color:#646C79;"></li>
               <li style=" border-left-color:#646C79;"></li>
              <li style=" border-left-color:#646C79; border-left-width:7px"></li>
            
          </ul>
          <div class="clear"> </div>
        </div>
        <div id="visit" style="height:400px; padding-left:220px">
         	
              <h2><strong><br><br>Admin Login...</strong></h2>
           
          <br>
          <table width="297" height="101" border="0" bgcolor="#B1B6BF">
            <tr>
              <td height="33"><strong>User Name </strong></td>
              <td><input type="text" name="un" id="un" /></td>
            </tr>
            <tr>
              <td height="34"><strong>Password</strong></td>
              <td><input type="password" name="pw" id="pw" /></td>
            </tr>
            <tr>
              <td height="26" align="right">&nbsp;</td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="submit_admin" id="button" value="Sign in"  onclick="return validate()" />
              &nbsp;&nbsp;&nbsp;</td>
            </tr>
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
