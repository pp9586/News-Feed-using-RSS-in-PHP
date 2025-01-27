<? 
$name=$_REQUEST['txtname'];
$email=$_REQUEST['txtemail'];
$sub=$_REQUEST['txtsub'];
$msg=$_REQUEST['txtmsg'];

$to=$email;
$subject = $sub;
$message = "<html><body><table>
    <tr>
      <td align='left'>Name : </td><td>".$name."</td>
    </tr>
 
    
      
	<tr>
      <td align='left'>Email : </td><td>".$email."</td>
    </tr>
	<tr>
      <td align='left'>Message : </td><td>".$msg."</td>
    </tr>
	
  </table>
</body>
</html>
";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: Rajagopal <raj.kapals@gmail.com>, Rajesh <rajeshsm_sm@yahoo.com>' . "\r\n";
$headers .= 'From: Explorer <info@explorer.com>' . "\r\n";
$stat=mail($to,$subject,$message,$headers);


if($stat)
{
header("Location:contactus.php?flag=SUCESS");
}
else
{
header("Location:contactus.php");
}
?>