<? 
include ("../../../setup_virtual.php");
include ("../../auth.php"); 


if ($send == "1") {
$send="";
mysql_query("update g_set set g_shansbon=$g_shansbon where g_name='aquaslot'");
mysql_query("update g_set set g_bon_min=$g_bon_min where g_name='aquaslot'");
mysql_query("update g_set set g_bon_max=$g_bon_max where g_name='aquaslot'");
}

if ($send == "2") {
$send="";
mysql_query("update g_set set g_rezim=$g_rezim where g_name='aquaslot'");
}


$row_bon=mysql_fetch_array(mysql_query("select * from g_set where g_name='aquaslot'"));
$g_shansbon=$row_bon['g_shansbon'];
$g_bon_min=$row_bon['g_bon_min'];
$g_bon_max=$row_bon['g_bon_max'];
$g_rezim=$row_bon['g_rezim'];


if ($g_rezim==1){$g_rezim1="CHECKED";$g_rezim2="";$g_rezim3=""; }
if ($g_rezim==2){$g_rezim1="";$g_rezim2="CHECKED";$g_rezim3=""; }
if ($g_rezim==3){$g_rezim1="";$g_rezim2="";$g_rezim3="CHECKED"; }

?>

<html>
<head>
<title>Настройка игры stroyslot</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../../text.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#ffffff" text="#000000">



<center><b>Настройка игры stroyslot</b><br><br>
<a href=../../index.php>[Вернуться в админку]</a>
<br><br></center>

<table border="0" align="center" cellpadding="5" cellspacing="0" >
<TR><TD>

<table border="0" align="left" cellpadding="5" cellspacing="0" >
<td>
<FORM name="masvet1" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=red>Настройка призовой игры</font></h4></td><td>&nbsp;</td></tr>
<TR><TD align="right">Шанс на выпадение 1 из </td><td><INPUT maxLength=20 size=10 name=g_shansbon value="<?echo $g_shansbon;?>" style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD><b>Диапазон множетеля на ставку</b></TD><td>&nbsp;</td></TR>
<TR><TD align="right">Минимальный</td><td><INPUT maxLength=20 size=10 name=g_bon_min value="<? echo $g_bon_min; ?>" style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD align="right">Максимальный</td><td><INPUT maxLength=20 size=10 name=g_bon_max value="<? echo $g_bon_max; ?>" style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD align="right"><INPUT type=hidden value=1 name=send><INPUT type=submit value="Сохранить"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>

<table border="0" align="left" cellpadding="30" cellspacing="0" >
<td></td>
</table>



<table border="0" align="left" cellpadding="5" cellspacing="0">
<td>
<FORM name="masvet2" action=index.php method=post>
<TR><TD><h4><font color=red>Режим работы игры</font><br>(в пределах банка казино)</h4></td><td>&nbsp;</td></tr>
<TR><TD>Щедрый</td><td><INPUT type="radio" name="g_rezim" value="1" <?echo $g_rezim1;?> style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD>Нормальный</td><td><INPUT type="radio" name="g_rezim" value="2" <?echo $g_rezim2;?> style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD>Жадный</td><td><INPUT type="radio" name="g_rezim" value="3" <?echo $g_rezim3;?> style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD align="right"><INPUT type=hidden value=2 name=send><INPUT type=submit value="Сохранить"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>

</td></TR>




<TR><TD>
<br><br>

<?
if ($dropdate==""){$dropdate=date("d.m.y");}
list($betall) = mysql_fetch_row(mysql_query("SELECT SUM(stav) FROM stat_game WHERE game='AquaSlot' "));
list($winall) = mysql_fetch_row(mysql_query("SELECT SUM(win) FROM stat_game WHERE game='AquaSlot' or game='AquaSlot_BONUS'"));
$colbet=mysql_num_rows(mysql_query("SELECT * FROM stat_game WHERE game='AquaSlot' "));

list($betall2) = mysql_fetch_row(mysql_query("SELECT SUM(stav) FROM stat_game WHERE game='AquaSlot' && data='$dropdate' "));
list($winall2) = mysql_fetch_row(mysql_query("SELECT SUM(win) FROM stat_game WHERE game='AquaSlot' && data='$dropdate' or game='AquaSlot_BONUS' && data='$dropdate' "));
$colbet2=mysql_num_rows(mysql_query("SELECT * FROM stat_game WHERE game='AquaSlot' && data='$dropdate' "));
$dohod=$betall-$winall;
$dohod2=$betall2-$winall2;
$betall = sprintf ("%01.2f", $betall); 
$winall = sprintf ("%01.2f", $winall);
$dohod = sprintf ("%01.2f", $dohod);
$betall2 = sprintf ("%01.2f", $betall2); 
$winall2 = sprintf ("%01.2f", $winall2);
$dohod2 = sprintf ("%01.2f", $dohod2);
?>



<form name="frmMain" action=index.php method="get">
<table border style="BORDER-COLLAPSE: collapse" align="center" cellpadding="5" cellspacing="0">
<TR><TD><h4><font color=red>Статистика игры</font></h4></td><td>Всего</td><td><? DateDropDown($dropdate); ?><br><input type='submit' class='button' value='смотреть' ></td></tr>
<TR><TD>Сделано ставок: </td><td><?echo $colbet;?></TD><td><?echo $colbet2;?></TD></TR>
<TR><TD>Ставок на сумму: </td><td><?echo $betall;?></TD><td><?echo $betall2;?></TD></TR>
<TR><TD>Выигрышей на сумму: </td><td><?echo $winall;?></TD><td><?echo $winall2;?></TD></TR>
<TR><TD>Прибыль: </td><td><?echo $dohod;?></TD><td><?echo $dohod2;?></TD></TR>
</table>
</form>

</td></TR>


<table align="center" cellpadding="0" cellspacing="0">
<center><font color="green" size=2>© 2009 AzartSoft</font><br/>
<font color="red" size=2>Разработка игры www.azartsoft.co.cc</font></center><br/>
</table>


</table>
</body></html>







<?
function DateDropDown($def) {
echo "<select name=dropdate >\n";
for ($i = 0; $i <= 400; $i++) {
$theday = mktime (0,0,0,12,8+$i ,date("Y"));
$value=date("d.m.y",$theday);
if ($value == $def) {$selected="SELECTED";} else {$selected="";}
echo "<option value=\"$value\" $selected>$value</option>\n";
}
echo "</select>\n";
}





?>




