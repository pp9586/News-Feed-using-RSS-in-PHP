<?php
include("conn.php");
if(isset($_GET['id']))
	{
	  $qrydel="delete from account  where user_id=".$_GET['id'];
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

function editMe(id)
 {
   
      document.user_mng.action="edituser.php?uid="+id;
	  document.user_mng.submit();
	  
 }
 function deleteMe(id)
 {
    document.user_mng.action="usermanager.php?id="+id;
	  document.user_mng.submit();
 }
</script>
<body>
<form id="user" name="user_mng" action="" method="post">

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
            <li><a>User Manager</a></li>
            <li></li>
            <li style=" border-left-color:#646C79;"></li>
            <li style=" border-left-color:#646C79;"></li>
               <li style=" border-left-color:#646C79;"></li>
              <li style=" border-left-color:#646C79; border-left-width:7px"></li>
            
          </ul>
          <div class="clear"> </div>
        </div>
        <div id="visit" style="height:400px; padding-left:50px">
         	
              <h2><strong><br><br>
              Create Category...</strong></h2>
           
          <br>
          <table width="460" height="101" border="0" bgcolor="#B1B6BF">
             <tr>
                  <td align="center" style="font-size:16px;color:#C0200E">First_Name</td>
                  <td align="center" style="font-size:16px;color:#C0200E">Last_Name</td>
                  <td align="center" style="font-size:16px;color:#C0200E">D_of_B</td>
                  <td align="center" style="font-size:16px;color:#C0200E">User_Name</td>
                  <td align="center" style="font-size:16px;color:#C0200E">Password</td>
                  <td align="center" style="font-size:16px;color:#C0200E">Email </td>
                  <td align="center" style="font-size:16px;color:#C0200E">Category</td>
                  <td>&nbsp;</td>
             </tr>
             <?php
			    $qryuser="select * from account";
				$rs_user=mysql_query($qryuser);
				while($row_user=mysql_fetch_array($rs_user))
				{
				?> 
                 <tr>
                     <td align="center"><?=$row_user['first_name'];?></td>
                     <td  align="center"><?=$row_user['last_name'];?></td>
                     <td align="center"><?=$row_user['dob'];?></td>
                     <td align="center"><?=$row_user['user_name'];?></td>
                     <td align="center"><?=$row_user['password'];?></td>
                     <td align="center"><?=$row_user['email'];?></td>
                     <td>
                         
                     <?php
					    $qrycat="select * from user_news_category where user_id=".$row_user['user_id'];
                        $rs_cat=mysql_query($qrycat);
						$arry=array();
						$i=0;
						while($row_cat=mysql_fetch_array($rs_cat))
						{
						  $arry[$i]=$row_cat['cat_id'];
						  $i++;
						}
						echo " <select name='cat' >";
						for($j=0;$j<sizeof($arry);$j++)
						 {
						   $qrygetcat="select * from category where cat_id=".$arry[$j];
						   $rs_catdata=mysql_query($qrygetcat);
						   $row_cat_data=mysql_fetch_array($rs_catdata);
						  ?>
                            <option value="<?=$row_cat_data['cat_name'];?>"><?=$row_cat_data['cat_name'];?></option>
						  <?php
						 }
					 ?>
                      </select>
                      </td>
                      <td>
                         <input type="button" name="<?=$row_user['user_id'];?>" id="<?=$row_user['user_id'];?>" value="Delet"  onclick="deleteMe(this.id)"/>
                         <input type="button" name="<?=$row_user['user_id'];?>" id="<?=$row_user['user_id'];?>" value="edit"  onclick="editMe(this.id)"/>
                      </td>
                      
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
