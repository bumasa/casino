<?
include ("header.php");
include ("wm_setup.php");
?>
<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div> 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
<center><font class="option" color="#FFFFFF"><b>ПОПОЛНЕНИЕ СЧЁТА ЧЕРЕЗ СИСТЕМУ WEBMONEY</b></font></center>
<br>


<TABLE width="100%">
<TBODY>
<TR vAlign=top>
<TD><br><br>
Для оплаты введите сумму в выбранной вами валюте.<br> 
Оплаченная сумма поступит на Ваш счет моментально. 
 
<br><br><br><br>

<form method="POST" action="https://merchant.webmoney.ru/lmi/payment.asp">
	<input name="LMI_PAYMENT_AMOUNT" size="5" value=""> WMR
	<input type="hidden" name="LMI_PAYMENT_DESC" value="Пополнение счета игроку <? echo $l; ?>">
	<input type="hidden" name="LMI_PAYMENT_NO" value="">
	<input type="hidden" name="LMI_PAYEE_PURSE" value="R123456789012"> <!--// Номер вашего кошелька -->
	<input type="hidden" name="LMI_SIM_MODE" value="0">
	<input type="hidden" name="shpa" value=<? echo $l; ?> >
        <input type=submit value="Оплатить">
</form>






<BR><BR></TD>
<TD align=middle width=100><BR><BR><BR><BR><BR>
<IMG height=31 hspace=2 src="/image/psl_wmr.gif" width=88 vspace=2 border=0><br>
</TD>

</TR></TBODY></TABLE>

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
<center><font class="option" color="#FFFFFF"><b>ПОПОЛНЕНИЕ СЧЁТА ЧЕРЕЗ СИСТЕМУ ROBOXCHANGE</b></font></center>
<br>



<TABLE width="100%">
<TBODY>
<TR vAlign=top>
<TD><br><br>
Оплата осуществляется через 
                        систему ROBOXchange.<BR>Минимальная сумма 
                        платежа&nbsp;— <B>1 руб.</B> <BR><BR>Для оплаты нажмите кнопку "пополнить счет", затем 
                        выберите желаемую систему и сумму. Оплаченная Вами 
                        сумма будет сразу зачислена на Ваш счет. 
                        <BR><BR>Обратите внимание, что система ROBOXchange берет 
                        небольшой процент за перевод. На счет зачисляется сумма, 
                        указанная в поле "Продавец получает".<br> <br>
<?
//параметры магазина
$inv_id    = 0;
$inv_desc  = "Пополнение";
$out_summ  = "";
$shpa = $l;
$crc  = md5("$conf[5]:$out_summ:$inv_id:$conf[6]:shpa=$shpa");

print "<form action='https://www.roboxchange.com/ssl/calc.asp' method=POST>".
"<input type=hidden name=mrh value=$conf[5]>".
"<input type=hidden name=out_summ value=$out_summ>".
"<input type=hidden name=inv_id value=$inv_id>".
"<input type=hidden name=inv_desc value=$inv_desc>".
"<input type=hidden name=crc value=$crc>".
"<input type=hidden name=shpa value=$shpa>".
"<input type=submit value='Пополнить счёт'>".
"</form>";
?>
<BR><BR></TD>
<TD align=middle width=100>
<IMG height=31 hspace=2 src="/image/logo_wm.gif" width=88 vspace=2 border=0><br>
<IMG height=31 hspace=2 src="/image/logo_eg.gif" width=88 vspace=2 border=0><BR>
<IMG height=31 hspace=2 src="/image/logo_yd.gif" width=88 vspace=2 border=0><br>
<IMG height=31 hspace=2 src="/image/logo_mm.gif" width=88 vspace=2 border=0><BR>
<IMG height=31 hspace=2 src="/image/logo_ua.gif" width=88 vspace=2 border=0><BR>
</TD>
</TR></TBODY></TABLE>

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
<center><font class="option" color="#FFFFFF"><b>ЕЖЕДНЕВНЫЙ БОНУС</b></font></center>
<br>



<!-- Выдача бонуса -->
<? include("config.bonus.php"); ?>
<br><br><center>
<b>АКТИВИРОВАТЬ БОНУС</b>
<form action='bonus_in.php' method=POST>
<input type=submit value='Зачислить <?=$_Config['bonus_sum']?> руб.'>
</form>
<font color="red">* Бонус выдается 1 раз в сутки.</font>
</center><br><br>
<!-- Выдача бонуса -->

</div>		
</td>
</tr>
</table>
</td>
</tr>
</table>




</td>



<? include ("footer.php"); ?>