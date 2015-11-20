<?
include ("header.php");
require_once('sb_tuning.php');

$t = new TProtectCode();
$t->GetCode();

?>

<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div> 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
<center><font class="option" color="#FFFFFF"><b>Форма для связи с администратором <? echo $con[4]; ?></b></font></center>
<br>
<font class="content"> 


<form name="form" method="post" action="" onSubmit="return formCheck(this)">
<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center">




<table border="0" cellpadding="4" cellspacing="0">
<tr>
<td colspan="2"><table border="0" cellspacing="0" cellpadding="2">

<tr>
<td><b>Ваш E-mail</b> <font color="#FF0000">* </font>:</td>
<td><input name="email" type="text" value="" size="25" style=" border: 1px solid rgb(0,0,0)"></td>
</tr>
</table></td>
</tr>
<tr>
<td colspan="2"><b>Текст вашего сообщения</b> <font color="#FF0000">*</font> :<br><br>
<textarea name="mess" cols="70" rows="15" style=" border: 1px solid rgb(0,0,0)"></textarea></td>
</tr>
<tr><td>Код <b><?php echo $t->msg;?></b></td><td><input type=text name=Code></td></tr>
<tr>
<td colspan="2">
<input type="hidden" name="send" value="1"><input type="submit" name="submit" value="Отправить сообщение"></td>
</tr>
</table>
</td>
</tr>
</table>
<? echo $t->hashfield;?>
</form>

Пожалуйста вводите правильный E-mail, для получения нашего ответа.

</font></div>		
</td>
</tr>
</table>	
</td>
</tr>
</table>

<?
if (isset($_POST['send']) && ($_POST['send']=="1")){
	$turning = isset($_POST['Code']) ? (int)$_POST['Code'] : 0;
	$hash = isset($_POST[HASH_FIELDNAME]) ? $_POST[HASH_FIELDNAME] : '';

	if (!$t->CheckCode($turning, $hash)){
		echo "<script> alert('Неправильно введен защитный код !');</script>";
	} else {
		$dopmess="\n\n\n==========\nИгрок: ".$l."\nIP: ".$REMOTE_ADDR;
		$to = $con[2];
		$subject = "письмо из казино";
		$msg =$mess.$dopmess;
		$mailheaders = "Content-Type: text/plain; charset=Windows-1251\n";
		$mailheaders .= "From:$email\n";
		mail($to, $subject, $msg, $mailheaders);
		echo "<script> alert('Ваше сообщение отправленно!'); document.location.href='index.php'; </script>";
	}
}

include ("footer.php"); 
?>