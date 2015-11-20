<? include ("header.php");
include ("../setup_virtual.php");
$resultg=mysql_query("select * from game_bank where name='ttuz'");
$rog=mysql_fetch_array($resultg);
?>
<center><h4><font color=7C87C2>Параметры банка и выйгрыша </font></h4><br></center>
<table border="0" align="center" cellpadding="10" cellspacing="0" >
<FORM action=bank.php method=post>
<TR><TD>Банк казино </td><td><INPUT maxLength=20 size=10 name=bank value=<? echo $rog[1] ?>> Рублей </TD></TR>
<TR><TD>Выйгрыш </td><td><INPUT maxLength=20 size=10 name=proc value=<? echo $rog[2] ?>> %</TD></TR>
<TR><TD><INPUT type=hidden value=1 name=send> <INPUT type=submit value="Сохранить"></TD></TR>
</FORM>
</table>
<br><br>
*Банк казино - Указывается сумма банка казино, т.е сколько денег у казино...<br>
**Выигрыш - Указан процент от банка казино для выйгрышей.<br>
 Т.е сколько процентов из банка казино можно отдать на выигрыш.

<?
if ($send=="1"){
mysql_query("UPDATE game_bank SET bank='$bank',proc='$proc' WHERE name='ttuz'");
echo "<script> alert('Настройки сохранены!'); document.location.href='bank.php';</script>";
}
include ("footer.php");
?>