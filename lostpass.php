<? include ("header.php"); ?>
<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div> 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
	
	<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
      <center><font class="option" color="#FFFFFF"><b>Востановление пароля в интернет казино <? echo $con[4]; ?></b></font></center><br>

<font class="content">
<form name="form" method="post" action="?st=lostpass" onSubmit="return formCheck(this)">
<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center">

Отправка логина и пароля на e-mail, указаный при регистрации<br><br>
<table border="0" cellspacing="0" cellpadding="5">
<tr>
<td>
Введите ваш E-mail: </td>
<td><input name="zapros" value="" type="text" size="20" maxlength="50"></td>
<td><input type="hidden" name="send" value="1">
<input type="submit" name="submit" value="Прислать пароль"></td>
</tr>
</table>
</td>
</tr>
</table>
</form>
<br>
<br>
*Если забыли и E-mail, напишите администратору указав имя и фамилию.

</font></div>		
		</td>
	  </tr>
	</table>

	
	</td>
  </tr>
</table>

<? 
if ($send=="1"){

$zapros = htmlentities($zapros);
$sqlr="select * from users where email='$zapros'";
$resultr=mysql_query($sqlr);
$rowr=mysql_fetch_array($resultr);
$r_login= $rowr[1];
$r_pass = $rowr[2];
include("mail/reg.php");
$to = $rowr[6];
$subject = $reg_reg_mail_subject;
$msg =$reg_reg_mail;
$mailheaders = "Content-Type: text/plain; charset=Windows-1251\n";
$mailheaders .= "From:$con[2];\n";
mail($to, $subject, $msg, $mailheaders);
echo "<script> alert('Ваши данные отправленны на email Указанный при регистрации!'); document.location.href='index.php'; </script>";
}
include ("footer.php"); 
?>