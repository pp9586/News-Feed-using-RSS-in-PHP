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
<form id="contact" action="mail.php" method="post">

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
            <li><a href="news.php">News</a></li>
            <li class="drk"><a href="contactus.php">Contact us</a></li>
               <li></li>
              <li style=" border-left-color:#646C79; border-left-width:7px"></li>
            
          </ul>
          <div class="clear"> </div>
        </div>
        <div id="visit" style="height:400px; padding-left:200px">
         	
              <h2><strong>Contact Us...</strong></h2>
           
          <br>
          <table width="335" height="330" border="0" bgcolor="#B1B6BF">
            <tr>
              <td width="26">&nbsp;</td>
              <td width="299">Name<br>
              <input name="txtname" type="text" id="txtname" size="30" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Email<br>
              <input name="txtemail" type="text" id="txtemail" size="30" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Subject<br>
              <input name="txtsub" type="text" id="txtsub" size="30" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Message<br>
              <textarea name="txtmsg" cols="40" rows="5" id="txtmsg"></textarea></td>
            </tr>
            <tr>
              <td height="36" align="center">&nbsp;</td>
              <td align="center"><input type="submit" name="button" id="button" value="Submit" onclick="return validate();" />
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="reset" name="button2" id="button2" value="Reset" /></td>
            </tr>
            <tr>
              <td height="36" align="center">&nbsp;</td>
              <td align="center"><? if($_REQUEST['flag']=="SUCESS")
				{
				?>
                <div align="justify">You message has been sent. Thank you!
                <?
        		}
				else
				{
				?>
             	We love hearing your comments! Send us a message with the form above
                </div>
              	<? 
				}
				?></p>
                </td>
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
