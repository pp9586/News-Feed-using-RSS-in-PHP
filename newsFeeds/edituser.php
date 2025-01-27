<?php
   include("conn.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>News Aggregator</title>
	<link rel="stylesheet" href="style_signup.css" type="text/css" charset="utf-8" />
<script language="javascript" type="text/javascript">

function valid()      
{var v=true;
	if(document.getElementById("first_name").value=="")
	{
		alert("Enter your first name");
		v=false;
	}
	else if(document.getElementById("last_name").value=="")
	{
		alert("Enter your last name");
		v=false;
	}
	else if(document.getElementById("date").value=="dd")
	{
		alert("Enter your dob date");
		v=false;
	}
	else if(document.getElementById("month").value=="mm")
	{
		alert("Enter your dob month");
		v=false;
	}
	else if(document.getElementById("year").value=="yyyy")
	{
		alert("Enter your dob year");
		v=false;
	}
	else if(document.getElementById("username").value=="")
	{
		alert("Enter your username");
		v=false;
	}
	else if(document.getElementById("password").value=="")
	{
		alert("Enter your password");
		v=false;
	}
	else if(document.getElementById("cpassword").value=="")
	{
		alert("confirm your password");
		v=false;
	}
	else if(document.getElementById("password").value != document.getElementById("cpassword").value)
	{
		alert("Password not matching");
		v=false;
	}
	else if(document.getElementById("email").value=="")
	{
		alert("Enter your email");
	v=false;
	}
	
	if(document.getElementById("date").value!="dd")
	{
	   document.getElementById("dob").value=document.getElementById("date").value;
	   if(document.getElementById("month").value!="mm" )
	      {
		    document.getElementById("dob").value=document.getElementById("dob").value+"/"+document.getElementById("month").value;
			if(document.getElementById("year").value!="yyyy")
			  {
			    document.getElementById("dob").value=document.getElementById("dob").value+"/"+document.getElementById("year").value; 
			  }
		  }
	}
	
	//alert("DOFB="+document.getElementById("dob"));
return v;
}
</script>

<script language="javascript" type="text/javascript">
function Move(inputControl)
{
  var left = document.getElementById("Left");
  var right = document.getElementById("Right");
  var from, to;
  var bAll = false;
  switch (inputControl.value)
  {
  case '<<':
    bAll = true;
    // Fall through
  case '<':
    from = right; to = left;
    break;
  case '>>':
    bAll = true;
    // Fall through
  case '>':
    from = left; to = right;
    break;
  default:
    alert("Check your HTML!");
  }
  for (var i = from.length - 1; i >= 0; i--)
  {
    var o = from.options[i];
    if (bAll || o.selected)
    {
      from.remove(i);
      try
      {
        to.add(o, null);  // Standard method, fails in IE (6&7 at least)
      }
      catch (e)
      {
        to.add(o); // IE only
      }
    }
  }
}



</script>
</head>

<body>

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
      <div id="left">
        <div id="nav">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li class="drk"><a href="signup.php">Registration</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="contactus.php">Contact us</a></li>
            <li></li>
              <li style=" border-left-color:#646C79; border-left-width:7px"></li>
            
          </ul>
          <div class="clear"> </div>
        </div>
        <div id="visit" style="height:500px; padding-left:200px" >
          <h2><strong>Registration...</strong></h2>
  <?php
        $qryedit="select * from account where user_id=".$_GET['uid'];
		$rsedit=mysql_query($qryedit);
		$row_edit=mysql_fetch_array($rsedit);
		$date=$row_edit['dob'];
		$datearry=array();
		$datearry=explode("/",$date);
		$dd=$datearry[0];
		$mm=$datearry[1];
		$yy=$datearry[2];
  ?>
  
<form name="signup" id="signup" method="post" action="edituser.php?uid=<?=$row_edit['user_id'];?>" >
          <table width="345" height="473" border="0" bgcolor="#B1B6BF">
                <tr>
                  <td width="4" height="40">&nbsp;</td>
                <td width="125"><strong>First Name </strong></td>
                <td colspan="3"><input name="first_name" type="text" id="first_name" size="25" value="<?=$row_edit['first_name']?>" /></td>
                <td width="6">&nbsp;</td>
              </tr>
                <tr>
                  <td>&nbsp;</td>
                <td><strong>Last Name</strong></td>
                <td colspan="3"><input name="last_name" type="text" id="last_name" size="25" value="<?=$row_edit['last_name']?>" /></td>
                <td>&nbsp;</td>
              </tr>
                <tr>
                  <td>&nbsp;</td>
                <td><strong>Date of Birth</strong></td>
                  <td width="51"><select name="date" id="date">
                    <option  value="dd" ><?=$dd;?></option>
                    <?php 
			  	   for($d=1;$d<=31;$d++)
                echo "<option value=".$d.">".$d."</option>"; ?>
                  </select>              </td>
                <td width="64"><select name="month" id="month">
                  <option value="mm"><?=$mm;?></option>
                  <?php 
			   for($m=1;$m<=12;$m++)
                echo "<option value=".$m.">".$m."</option>"; ?>
                  </select></td>
                <td width="69"><select name="year" id="year">
                  <option  value="yyyy"><?=$yy;?></option>
                  <?php
			   for($y=1910;$y<=2009;$y++)
                echo "<option value=".$y.">".$y."</option>"; ?>
                  </select>
                  <input type="hidden" name="dob" id="dob" />                  </td>
                <td>&nbsp;</td>
              </tr>
                <tr>
                  <td>&nbsp;</td>
                <td><strong>User Name</strong></td>
                <td colspan="3"><input name="username" type="text" id="username" size="25"  value="<?=$row_edit['user_name']?>"  /></td>
                <td>&nbsp;</td>
              </tr>
                <tr>
                  <td>&nbsp;</td>
                <td><strong>Password</strong></td>
                <td colspan="3"><input name="password" type="password" id="password" size="25" value="<?=$row_edit['password']?>" /></td>
                <td>&nbsp;</td>
              </tr>
                <tr>
                  <td height="29" align="center">&nbsp;</td>
                <td align="left"><strong>Confirm password</strong></td>
                <td colspan="3" align="left"><input name="cpassword" type="password" id="cpassword" size="25" value="<?=$row_edit['password']?>" /></td>
                <td align="center">&nbsp;</td>
              </tr>
                <tr>
                  <td height="216" align="center">
         <!--  get category list----------------------------------------- -->
                   
			<?php
			      $qry_cat_list="select * from category";
				  $rs_cat_list=mysql_query($qry_cat_list);
				 // echo "NUM=".mysql_num_rows($rs_cat_list);
				  ?>
				  <select name="Left" size="10" multiple="multiple" id="Left" style="width:120px"> 
				 <?php
                  while($row_cat_data=mysql_fetch_array($rs_cat_list))
				  {
				   ?>
                     <option value="<?=$row_cat_data['cat_name'];?>"><?=$row_cat_data['cat_name'];?></option>   
                   <?php
				  }
         
             ?>
         
         <!-- end category list ----------------------------------------- -->         
               <!--   <select name="Left" size="10" multiple="multiple" id="Left" style="width:120px">
                    <option value="Cricket">Cricket</option>
                    <option value="Football">Football</option>
                    <option value="Tennis">Tennis</option>
                    <option value="Politics">Politics</option>
                    <option value="Newspaper">Newspaper</option>
                    <option value="Jobs">Jobs</option>
                    <option value="Education">Education</option>
                    <option value="Fashion">Fashion</option> -->
                    
                   </select> 
                  </td>
                <td align="left"><strong>Select Categories</strong><br></td>
                <td>
             <div id="Toolbar">
                  <input type="button" value="&gt;" onclick="Move(this)"/>
                  <input type="button" value="&gt;&gt;" onclick="Move(this)"/>
                  <input type="button" value="&lt;&lt;" onclick="Move(this)"/>
                  <input type="button" value="&lt;" onclick="Move(this)"/>   
             </div>                  </td>
                <td colspan="2">
                <select name="user_category[]" id="Right" multiple="multiple" size="10" style="width:120px" >
</select></td>
                <td ></td>
              </tr>
                <tr>
                  <td height="36" align="center">&nbsp;</td>
                <td align="left"><strong>Email</strong></td>
                <td colspan="3" align="center"><input name="email" type="text" id="email" size="25" value="<?=$row_edit['email']?>" /></td>
                <td align="center">&nbsp;</td>
              </tr>
                <tr>
                  <td height="36" align="center">&nbsp;</td>
                <td align="center"><input type="submit" name="submit" id="submit" value="Submit"  onclick="return valid();"/></td>
                <td colspan="3" align="center"><input type="reset" name="button2" id="button2" value="Reset" /></td>
                <td align="center">&nbsp;</td>
              </tr>
              </table>
          </form>

          <p>&nbsp;</p>
        </div>
        <div id="subs"></div>
      </div>
      <div class="clear"> </div>
    </div>
    <div id="copyright">
  <p><span class="style9">&copy;</span> News Feeds. All rights reserved</p>
    </div>
  </div>

</body>
</html>
<?php

if(isset($_POST['submit']))
{
$f=$_POST['first_name'];
$l=$_POST['last_name'];
$dob=$_POST['dob'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
//$query="insert into account(first_name,last_name,dob,user_name,password,email) values('".$f."','".$l."','".$dob."','".$username."','".$password."','".$email."')";
 // echo "QRY=".$query."<br>";
$qryupdate="update account set first_name='".$f."' , last_name='".$l."' , dob='".$dob."' ,user_name='".$username."' , password='".$password."' ,   email='".$email."' where user_id=".$_GET['uid'];
 
if(mysql_query($qryupdate))
{
//echo "Submitted";
   $qrysel="select user_id  from account where user_name='".$username."' and  password='".$password."' and email='".$email."'"; 
   $rs_getid=mysql_query($qrysel);
   $row_id=mysql_fetch_array($rs_getid);
   $arry=array();
   $catid_list=array();
 /* --------- get cat id------------------------- --*/
   $arry=$_POST['user_category'];
   for($i=0;$i<sizeof($arry);$i++)
    {
        $qrycat="select cat_id from category where cat_name='".$arry[$i]."'";
		$rs_catid=mysql_query($qrycat);
		$row_catid=mysql_fetch_array($rs_catid);
		$catid_list[$i]=$row_catid['cat_id'];
	}
   
   $qrydel="delete from user_news_category where user_id=".$_GET['uid'];
   mysql_query($qrydel);
 /* ---- end cat id----------------------------- --*/  
 /* ----------- add user category--------------------------------*/
   for($j=0;$j<sizeof($catid_list);$j++)
   {
     $qry_ins_cat="insert into user_news_category (user_id,cat_id)values(".$row_id['user_id'].",".$catid_list[$j].")";
	 mysql_query($qry_ins_cat);
   }
 
 
 /*----------------- end user category ---------------- --------- -*/
  
}
else
{
echo "Error";
}
}
?>