<?
include ("../../../setup.php");
include ("../../auth.php"); 


if ($send == "1") {
$send="";
if ($vp_proc == "0") {$vp_proc=1;}
if ($vp_proc >100 ) {$vp_proc=100;}
mysql_query("update vp_set set vp_bank=$vp_bank where vp_nomer='01'");
mysql_query("update vp_set set vp_proc=$vp_proc where vp_nomer='01'");
echo "<script>document.location.href='index.php';</script>";
}


if ($send == "31") {
$send="";
if ($vp_shanswin11 <= "1") {$vp_shanswin11=2;}
if ($vp_shanswin21 <= "1") {$vp_shanswin21=2;}
if ($vp_shanswin31 <= "1") {$vp_shanswin31=2;}
if ($vp_shanswin41 <= "1") {$vp_shanswin41=2;}
if ($vp_shanswin51 <= "1") {$vp_shanswin51=2;}
$vp_shanswin1=$vp_shanswin11."|".$vp_shanswin21."|".$vp_shanswin31."|".$vp_shanswin41."|".$vp_shanswin51."|";
mysql_query("update vp_set set vp_shanswin1='$vp_shanswin1' where vp_nomer='01'");
echo "<script>document.location.href='index.php';</script>";
}


if ($send == "32") {
$send="";
if ($vp_shanswin12 <= "1") {$vp_shanswin12=2;}
if ($vp_shanswin22 <= "1") {$vp_shanswin22=2;}
if ($vp_shanswin32 <= "1") {$vp_shanswin32=2;}
if ($vp_shanswin42 <= "1") {$vp_shanswin42=2;}
if ($vp_shanswin52 <= "1") {$vp_shanswin52=2;}
if ($vp_shansdouble <= "1") {$vp_shansdouble=2;}
$vp_shanswin2=$vp_shanswin12."|".$vp_shanswin22."|".$vp_shanswin32."|".$vp_shanswin42."|".$vp_shanswin52."|";
mysql_query("update vp_set set vp_shanswin2='$vp_shanswin2' where vp_nomer='01'");
mysql_query("update vp_set set vp_shansdouble='$vp_shansdouble' where vp_nomer='01'");
echo "<script>document.location.href='index.php';</script>";
}



$row_bon=mysql_fetch_array(mysql_query("select * from vp_set where vp_nomer='01'"));
$vp_bank=$row_bon['vp_bank'];
$vp_proc=$row_bon['vp_proc'];
$vp_shansdouble=$row_bon['vp_shansdouble'];


$vp_shanswin1=$row_bon['vp_shanswin1'];
$vp_shanswin2=$row_bon['vp_shanswin2'];
$shs1=explode("|", $vp_shanswin1);
$vp_shanswin11=$shs1[0];
$vp_shanswin21=$shs1[1];
$vp_shanswin31=$shs1[2];
$vp_shanswin41=$shs1[3];
$vp_shanswin51=$shs1[4];
$shs2=explode("|", $vp_shanswin2);
$vp_shanswin12=$shs2[0];
$vp_shanswin22=$shs2[1];
$vp_shanswin32=$shs2[2];
$vp_shanswin42=$shs2[3];
$vp_shanswin52=$shs2[4];
?>




<html>
<head>
<title>Настройка игры Aces And Faces</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>

<BODY text=#000000 bgColor=#ffffff leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">


<center><b>Настройка игры Aces And Faces</b><br>
<a href=../../index.php> << Вернуться в админку </a><br><br></center>

<table border="0" align="center" cellpadding="5" cellspacing="0" width=800>


<TR><TD>

<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla1" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=blue>Касса игры</font></h4></td><td>&nbsp;</td></tr>
<TR><TD align="right">В кассе игры </td><td><INPUT maxLength=20 size=10 name=vp_bank value="<?echo $vp_bank;?>" style="border: 1px solid #ff6600;"> </TD></TR>
<TR><TD><b>Процент от ставки в кассу</b></TD><td>&nbsp;</td></TR>
<TR><TD align="right">%</td><td><INPUT maxLength=20 size=10 name=vp_proc value="<? echo $vp_proc; ?>" style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD align="right"><INPUT type=hidden value=1 name=send><INPUT type=submit value="Сохранить"></TD><td>&nbsp;</td></TR>
</FORM>
</td>


</table>


<table border="0" align="left" cellpadding="30" cellspacing="0" >
<td>
</td>
</table>



<?
$dropdate_y = substr($dropdate_y, 2, 3);
$dropdate=$dropdate_d.".".$dropdate_m.".".$dropdate_y;
if ($dropdate==".."){$dropdate=date("d.m.y");}
list($betall) = mysql_fetch_row(mysql_query("SELECT SUM(stav) FROM stat_game WHERE game='JOB' or game='JOB_double'"));
list($winall) = mysql_fetch_row(mysql_query("SELECT SUM(win) FROM stat_game WHERE game='JOB' or game='JOB_double' "));
$colbet=mysql_num_rows(mysql_query("SELECT * FROM stat_game WHERE game='JOB' or game='JOB_double'"));

list($betall2) = mysql_fetch_row(mysql_query("SELECT SUM(stav) FROM stat_game WHERE game='JOB' && data='$dropdate' or game='JOB_double' && data='$dropdate'"));
list($winall2) = mysql_fetch_row(mysql_query("SELECT SUM(win) FROM stat_game WHERE game='JOB' && data='$dropdate' or game='JOB_double' && data='$dropdate'"));
$colbet2=mysql_num_rows(mysql_query("SELECT * FROM stat_game WHERE game='JOB' && data='$dropdate' or game='JOB_double' && data='$dropdate'"));
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
<table border style="BORDER-COLLAPSE: collapse" align="center" cellpadding="3" cellspacing="0">
<TR><TD align="center" valign="center"><h4><font color=blue>Статистика игры</font></h4></td><td>Всего</td><td width=150>по дате (дд.мм.гггг)<br><? DateDropDown($dropdate); ?><br><input type='submit' class='button' value='смотреть' ></td></tr>
<TR><TD>Cтавок: </td><td><?echo $colbet;?></TD><td><?echo $colbet2;?></TD></TR>
<TR><TD>Ставок на сумму: </td><td><?echo $betall;?></TD><td><?echo $betall2;?></TD></TR>
<TR><TD>Выигрышей на сумму: </td><td><?echo $winall;?></TD><td><?echo $winall2;?></TD></TR>
<TR><TD>Прибыль: </td><td><?echo $dohod;?></TD><td><?echo $dohod2;?></TD></TR>
</table>
</form>
</td>


<TR><TD>
<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla3_1" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=blue>Частота выпадения<br>выигрышей</font></h4></td><td align="center" valign="center"><h4>Раздача 1</h4></TD></tr>
<TR><TD align="left">&nbsp;</td><td> </TD></TR>
<TR><TD><b>Выигрыша по ставке:</b></TD><td>&nbsp;</td></TR>
<TR><TD align="left">ставка 1 </td><td>1 из <INPUT maxLength=20 size=10 name=vp_shanswin11 value="<?echo $vp_shanswin11;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">ставка 2 </td><td>1 из <INPUT maxLength=20 size=10 name=vp_shanswin21 value="<?echo $vp_shanswin21;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">ставка 3 </td><td>1 из <INPUT maxLength=20 size=10 name=vp_shanswin31 value="<?echo $vp_shanswin31;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">ставка 4 </td><td>1 из <INPUT maxLength=20 size=10 name=vp_shanswin41 value="<?echo $vp_shanswin41;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">ставка 5 </td><td>1 из <INPUT maxLength=20 size=10 name=vp_shanswin51 value="<?echo $vp_shanswin51;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="right"><INPUT type=hidden value=31 name=send><INPUT type=submit value="Сохранить"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>

<table border="0" align="left" cellpadding="30" cellspacing="0" >
<td>
</td>
</table>


<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla3_2" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=blue>Частота выпадения<br>выигрышей</font></h4></td><td align="center" valign="center"><h4>Раздача 2</h4></TD></tr>
<TR><TD align="left">Удвоения:</td><td>1 из <INPUT maxLength=20 size=10 name=vp_shansdouble value="<?echo $vp_shansdouble;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD><b>Выигрыша по ставке:</b></TD><td>&nbsp;</td></TR>
<TR><TD align="left">ставка 1 </td><td>1 из <INPUT maxLength=20 size=10 name=vp_shanswin12 value="<?echo $vp_shanswin12;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">ставка 2 </td><td>1 из <INPUT maxLength=20 size=10 name=vp_shanswin22 value="<?echo $vp_shanswin22;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">ставка 3 </td><td>1 из <INPUT maxLength=20 size=10 name=vp_shanswin32 value="<?echo $vp_shanswin32;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">ставка 4 </td><td>1 из <INPUT maxLength=20 size=10 name=vp_shanswin42 value="<?echo $vp_shanswin42;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">ставка 5 </td><td>1 из <INPUT maxLength=20 size=10 name=vp_shanswin52 value="<?echo $vp_shanswin52;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="right"><INPUT type=hidden value=32 name=send><INPUT type=submit value="Сохранить"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>
</TR>

<tr>
<table align="center" cellpadding="0" cellspacing="0"><TR><TD><br><br>
<center><font color="green" size=2><b>© 2009 AzartSoft</b></font><br/><font color="green" size=3>Разработка игры www.azartsoft.co.cc</font><br/></center>
</TD></tr></table>
</tr>

</table>
</body></html>


<?
function DateDropDown($def) {
$deff=explode(".", $def);
echo "<select name=dropdate_d >\n";
for ($i_d = 1; $i_d <= 31; $i_d++) {
$i_d = sprintf ("%02d", $i_d);
if ($i_d == $deff[0]) {$selected="SELECTED";} else {$selected="";}
echo "<option value=\"$i_d\" $selected>$i_d </option>\n";
}echo "</select>.";
echo "<select name=dropdate_m >\n";
for ($i_m = 1; $i_m <= 12; $i_m++) {
$i_m = sprintf ("%02d", $i_m);
if ($i_m == $deff[1]) {$selected="SELECTED";} else {$selected="";}
echo "<option value=\"$i_m\" $selected>$i_m </option>\n";
}echo "</select>.";
echo "<select name=dropdate_y >\n";
$ny=date("Y");
for ($i_y = 2008; $i_y <= $ny; $i_y++) {
if ($i_y == "20".$deff[2]) {$selected="SELECTED";} else {$selected="";}
echo "<option value=\"$i_y\" $selected>$i_y </option>\n";
}echo "</select>\n";
}
?>

