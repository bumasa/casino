<? include ("header.php"); ?>
<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div> 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
<center><font class="option" color="#FFFFFF"><b>ВЫВОД ДЕНЕЖНЫХ СРЕДСТВ</b></font></center>
<br>

<FORM name=form action=out.php method=post>
<TABLE cellSpacing=0 cellPadding=4 align=center border=0>
<TBODY>
<TR>
<TD colSpan=2>
<TABLE cellSpacing=0 cellPadding=2 border=0>
<TBODY>
<TR>
	<TD><B>Сумма</B>&nbsp;<FONT color=#ff0000>*</FONT></TD>
	<TD><INPUT maxLength=10 size=10 name=sumout> &nbsp; Минимум: 7 рублей.</TD>
</TR>

<TR>
	<TD><B>Система</B>&nbsp;<FONT color=#ff0000>*</FONT></TD>
	<TD>

<SELECT name=cash>
	<OPTION selected>WebMoney</OPTION>
</SELECT>
</td></tr>
<TR>
	<TD><B>Реквизиты</B>&nbsp;<FONT color=#ff0000>*</FONT></TD>
	<TD><INPUT size=25 name=rekvizit value="R"> WMR кошелек</TD>
</TR>
</TBODY></TABLE></TD></TR>

       <TR>
       <TD colSpan=2>
       <INPUT type=hidden value=1 name=send> 
	<INPUT type=submit value="Заказать выплату" name=submit></TD></TR></TBODY></TABLE></FORM>

</div>		
</td>
</tr>
</table>
</td>
</tr>
</table>


<br> 

<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
<center><font class="option" color="#FFFFFF"><b>ВАЖНО ЗНАТЬ</b></font></center>
<br>
<div style="padding-left:20px; padding-top:0px"><ul style="margin:0; padding:0; line-height:15px">

<li>Перед нажатием кнопки 'заказать выплату' проверте все данные</li>
<li>Заказываемая сумма будет автоматически списана с вашего счета!</li>
<li>Деньги поступят на ваш счет после проверки администратором в течении 5 дней.</li>

</ul></div>
</div>		
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>


<?
if ($send=="1"){


if ($sumout > $row[3] or $sumout < "7"){
echo "<script> alert('Вывод денег возможен от 7 рублей! На вашем счету недостаточно средств! '); document.location.href='out.php'; </script>";
}
else
{

$date=date("d.m.y");
$time=date("H:i:s");
mysql_query("update users set cash=cash-'$sumout' where login='$l'");
mysql_query("update users set cashout=cashout+'$sumout' where login='$l'");
mysql_query("INSERT INTO stat_pay VALUES('$l','$date','$time','0.00','$sumout')");
mysql_query("INSERT INTO zakaz VALUES(NULL,'$l','$cash','$rekvizit','$sumout','1')");


$con=mysql_fetch_array(mysql_query("select * from seting"));
if ($con[zakmail]=="yes"){
include("../mail/out.php");
$to =$con['adm_email'];
$subject = $reg_reg_mail_subject;
$msg =$reg_reg_mail;
$mailheaders = "Content-Type: text/plain; charset=Windows-1251\n";
$mailheaders .= "From: $con[adm_email]\n";
mail($to, $subject, $msg, $mailheaders);
}

echo "<script> alert('Ваш заказ подан на обработку!'); document.location.href='index.php'; </script>";


}


}
?>


<? include ("footer.php"); ?>