<?
include ("../../../setup.php");
include ("../../auth.php"); 


if ($reset == "1") {
$reset=0;
mysql_query("update g_set_new_g set g_bon1_$jp =0 where g_name='garage'");
mysql_query("update g_set_new_g set g_bon$jp =0 where g_name='garage'");
echo "<script>document.location.href='index.php';</script>";
}
if ($resetf == "1") {
$reset=0;
mysql_query("update g_set_new_g set gf_bon1_$jp =0 where g_name='garage'");
mysql_query("update g_set_new_g set gf_bon$jp =0 where g_name='garage'");
echo "<script>document.location.href='index.php';</script>";
}
if ($send == "1") {
$send="";
if ($g_proc == "0") {$g_proc=1;}
mysql_query("update g_set_new_g set g_bank=$g_bank where g_name='garage'");
mysql_query("update g_set_new_g set g_proc=$g_proc where g_name='garage'");
echo "<script>document.location.href='index.php';</script>";
}

if ($send == "2") {
$send="";
mysql_query("update g_set_new_g set g_rezim=$g_rezim where g_name='garage'");
echo "<script>document.location.href='index.php';</script>";
}

if ($send == "3") {
$send="";
if ($g_shanswin1 <= "1") {$g_shanswin1=2;}
if ($g_shanswin3 <= "1") {$g_shanswin3=2;}
if ($g_shanswin5 <= "1") {$g_shanswin5=2;}
if ($g_shanswin7 <= "1") {$g_shanswin7=2;}
if ($g_shanswin9 <= "1") {$g_shanswin9=2;}
if ($g_shansbon1 <= "1") {$g_shansbon1=2;}
if ($g_shansbon2 <= "1") {$g_shansbon2=2;}
if ($g_shansbon3 <= "1") {$g_shansbon3=2;}
if ($g_shansdouble <= "1") {$g_shansdouble=2;}

$g_shanswin=$g_shanswin1."|".$g_shanswin3."|".$g_shanswin5."|".$g_shanswin7."|".$g_shanswin9."|";
$g_shansbon=$g_shansbon1."|".$g_shansbon2."|".$g_shansbon3."|";
mysql_query("update g_set_new_g set g_shansbon='$g_shansbon' where g_name='garage'");
mysql_query("update g_set_new_g set g_shanswin='$g_shanswin' where g_name='garage'");
mysql_query("update g_set_new_g set g_rezerv='$g_shansdouble' where g_name='garage'");
echo "<script>document.location.href='index.php';</script>";
}



$row_bon=mysql_fetch_array(mysql_query("select * from g_set_new_g where g_name='garage'"));
$g_shansbon=$row_bon['g_shansbon'];
$shs2=explode("|", $g_shansbon);
$g_shansbon1=$shs2[0];
$g_shansbon2=$shs2[1];
$g_shansbon3=$shs2[2];
$g_shanswin=$row_bon['g_shanswin'];
$g_shansdouble=$row_bon['g_rezerv'];
$g_bank=$row_bon['g_bank'];
$g_proc=$row_bon['g_proc'];
$g_rezim=$row_bon['g_rezim'];
$shs=explode("|", $g_shanswin);
$g_shanswin1=$shs[0];
$g_shanswin3=$shs[1];
$g_shanswin5=$shs[2];
$g_shanswin7=$shs[3];
$g_shanswin9=$shs[4];

if ($g_rezim==1){$g_rezim1="CHECKED";$g_rezim2="";$g_rezim3="";$g_rezim4="";$g_rezim5=""; }
if ($g_rezim==2){$g_rezim1="";$g_rezim2="CHECKED";$g_rezim3="";$g_rezim4="";$g_rezim5=""; }
if ($g_rezim==3){$g_rezim1="";$g_rezim2="";$g_rezim3="CHECKED";$g_rezim4="";$g_rezim5=""; }
if ($g_rezim==4){$g_rezim1="";$g_rezim2="";$g_rezim3="";$g_rezim4="CHECKED";$g_rezim5=""; }
if ($g_rezim==5){$g_rezim1="";$g_rezim2="";$g_rezim3="";$g_rezim4="";$g_rezim5="CHECKED"; }


$row_bon1=mysql_fetch_array(mysql_query("select * from g_set_new_g where g_name='garage'"));
$g_bon1=$row_bon1['g_bon1'];
$g_bon2=$row_bon1['g_bon2'];
$g_bon3=$row_bon1['g_bon3'];
$g_bon1_1=$row_bon1['g_bon1_1'];
$g_bon1_2=$row_bon1['g_bon1_2'];
$g_bon1_3=$row_bon1['g_bon1_3'];

if ($g_bon1==0){$col_1_1="yellow"; $col_1_2="yellow"; $col_1_3="yellow"; $col_1_4="yellow"; $col_1_5="yellow";}
if ($g_bon1==1){$col_1_1="red"; $col_1_2="yellow"; $col_1_3="yellow"; $col_1_4="yellow"; $col_1_5="yellow";}
if ($g_bon1==2){$col_1_1="red"; $col_1_2="red"; $col_1_3="yellow"; $col_1_4="yellow"; $col_1_5="yellow";}
if ($g_bon1==3){$col_1_1="red"; $col_1_2="red"; $col_1_3="red"; $col_1_4="yellow"; $col_1_5="yellow";}
if ($g_bon1==4){$col_1_1="red"; $col_1_2="red"; $col_1_3="red"; $col_1_4="red"; $col_1_5="yellow";}
if ($g_bon1==5){$col_1_1="red"; $col_1_2="red"; $col_1_3="red"; $col_1_4="red"; $col_1_5="red";}

if ($g_bon2==0){$col_2_1="yellow"; $col_2_2="yellow"; $col_2_3="yellow"; $col_2_4="yellow"; $col_2_5="yellow";}
if ($g_bon2==1){$col_2_1="red"; $col_2_2="yellow"; $col_2_3="yellow"; $col_2_4="yellow"; $col_2_5="yellow";}
if ($g_bon2==2){$col_2_1="red"; $col_2_2="red"; $col_2_3="yellow"; $col_2_4="yellow"; $col_2_5="yellow";}
if ($g_bon2==3){$col_2_1="red"; $col_2_2="red"; $col_2_3="red"; $col_2_4="yellow"; $col_2_5="yellow";}
if ($g_bon2==4){$col_2_1="red"; $col_2_2="red"; $col_2_3="red"; $col_2_4="red"; $col_2_5="yellow";}
if ($g_bon2==5){$col_2_1="red"; $col_2_2="red"; $col_2_3="red"; $col_2_4="red"; $col_2_5="red";}

if ($g_bon3==0){$col_3_1="yellow"; $col_3_2="yellow"; $col_3_3="yellow"; $col_3_4="yellow"; $col_3_5="yellow";}
if ($g_bon3==1){$col_3_1="red"; $col_3_2="yellow"; $col_3_3="yellow"; $col_3_4="yellow"; $col_3_5="yellow";}
if ($g_bon3==2){$col_3_1="red"; $col_3_2="red"; $col_3_3="yellow"; $col_3_4="yellow"; $col_3_5="yellow";}
if ($g_bon3==3){$col_3_1="red"; $col_3_2="red"; $col_3_3="red"; $col_3_4="yellow"; $col_3_5="yellow";}
if ($g_bon3==4){$col_3_1="red"; $col_3_2="red"; $col_3_3="red"; $col_3_4="red"; $col_3_5="yellow";}
if ($g_bon3==5){$col_3_1="red"; $col_3_2="red"; $col_3_3="red"; $col_3_4="red"; $col_3_5="red";}
$row_bon1=mysql_fetch_array(mysql_query("select * from g_set_new_g where g_name='garage'"));

$gf_bon1=$row_bon1['gf_bon1'];
$gf_bon2=$row_bon1['gf_bon2'];
$gf_bon3=$row_bon1['gf_bon3'];
$gf_bon1_1=$row_bon1['gf_bon1_1'];
$gf_bon1_2=$row_bon1['gf_bon1_2'];
$gfbon1_3=$row_bon1['gf_bon1_3'];

if ($gf_bon1==0){$fcol_1_1="yellow"; $fcol_1_2="yellow"; $fcol_1_3="yellow"; $fcol_1_4="yellow"; $fcol_1_5="yellow";}
if ($gf_bon1==1){$fcol_1_1="red"; $fcol_1_2="yellow"; $fcol_1_3="yellow"; $fcol_1_4="yellow"; $fcol_1_5="yellow";}
if ($gf_bon1==2){$fcol_1_1="red"; $fcol_1_2="red"; $fcol_1_3="yellow"; $fcol_1_4="yellow"; $fcol_1_5="yellow";}
if ($gf_bon1==3){$fcol_1_1="red"; $fcol_1_2="red"; $fcol_1_3="red"; $fcol_1_4="yellow"; $fcol_1_5="yellow";}
if ($gf_bon1==4){$fcol_1_1="red"; $fcol_1_2="red"; $fcol_1_3="red"; $fcol_1_4="red"; $fcol_1_5="yellow";}
if ($gf_bon1==5){$fcol_1_1="red"; $fcol_1_2="red"; $fcol_1_3="red"; $fcol_1_4="red"; $fcol_1_5="red";}

if ($gf_bon2==0){$fcol_2_1="yellow"; $fcol_2_2="yellow"; $fcol_2_3="yellow"; $fcol_2_4="yellow"; $fcol_2_5="yellow";}
if ($gf_bon2==1){$fcol_2_1="red"; $fcol_2_2="yellow"; $fcol_2_3="yellow"; $fcol_2_4="yellow"; $fcol_2_5="yellow";}
if ($gf_bon2==2){$fcol_2_1="red"; $fcol_2_2="red"; $fcol_2_3="yellow"; $fcol_2_4="yellow"; $fcol_2_5="yellow";}
if ($gf_bon2==3){$fcol_2_1="red"; $fcol_2_2="red"; $fcol_2_3="red"; $fcol_2_4="yellow"; $fcol_2_5="yellow";}
if ($gf_bon2==4){$fcol_2_1="red"; $fcol_2_2="red"; $fcol_2_3="red"; $fcol_2_4="red"; $fcol_2_5="yellow";}
if ($gf_bon2==5){$fcol_2_1="red"; $fcol_2_2="red"; $fcol_2_3="red"; $fcol_2_4="red"; $fcol_2_5="red";}

if ($gf_bon3==0){$fcol_3_1="yellow"; $fcol_3_2="yellow"; $fcol_3_3="yellow"; $fcol_3_4="yellow"; $fcol_3_5="yellow";}
if ($gf_bon3==1){$fcol_3_1="red"; $fcol_3_2="yellow"; $fcol_3_3="yellow"; $fcol_3_4="yellow"; $fcol_3_5="yellow";}
if ($gf_bon3==2){$fcol_3_1="red"; $fcol_3_2="red"; $fcol_3_3="yellow"; $fcol_3_4="yellow"; $fcol_3_5="yellow";}
if ($gf_bon3==3){$fcol_3_1="red"; $fcol_3_2="red"; $fcol_3_3="red"; $fcol_3_4="yellow"; $fcol_3_5="yellow";}
if ($gf_bon3==4){$fcol_3_1="red"; $fcol_3_2="red"; $fcol_3_3="red"; $fcol_3_4="red"; $fcol_3_5="yellow";}
if ($gf_bon3==5){$fcol_3_1="red"; $fcol_3_2="red"; $fcol_3_3="red"; $fcol_3_4="red"; $fcol_3_5="red";}


?>




<html>
<head>
<title>Настройка игры garage</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../../text.css" rel="stylesheet" type="text/css">
</head>

<BODY text=#000000 bgColor=#ffffff leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">


<center><b>Настройка игры GARAGE</b><br><a href=../../index.php> << Вернуться в админку </a><br><br></center>

<table border="0" align="center" cellpadding="5" cellspacing="0" width=800>


<TR><TD>

<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>

</td>
<TR><TD>

<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla1" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=blue>Касса игры</font></h4></td><td>&nbsp;</td></tr>
<TR><TD align="right">В кассе игры </td><td><INPUT maxLength=20 size=10 name=g_bank value="<?echo $g_bank;?>" style="border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD><b>Процент от ставки в кассу</b></TD><td>&nbsp;</td></TR>
<TR><TD align="right">%</td><td><INPUT maxLength=20 size=10 name=g_proc value="<? echo $g_proc; ?>" style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD align="right"><INPUT type=hidden value=1 name=send><INPUT type=submit value="Сохранить"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
<TR><TD>
<br><b>Джекпоты в бонусе 2</b>
<table border="1" align="center" cellpadding="2" cellspacing="0" >

<TR><TD width=40 align="center"><b><?echo$g_bon1_1;?></b></td><TD width=40 align="center"><b><?echo$g_bon1_2;?></b></td><TD width=40 align="center"><b><?echo$g_bon1_3;?></b></td></TR>
<TR><TD width=40 bgcolor=<?echo$col_1_5;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$col_2_5;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$col_3_5;?>>&nbsp;</td></TR>
<TR><TD width=40 bgcolor=<?echo$col_1_4;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$col_2_4;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$col_3_4;?>>&nbsp;</td></TR>
<TR><TD width=40 bgcolor=<?echo$col_1_3;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$col_2_3;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$col_3_3;?>>&nbsp;</td></TR>
<TR><TD width=40 bgcolor=<?echo$col_1_2;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$col_2_2;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$col_3_2;?>>&nbsp;</td></TR>
<TR><TD width=40 bgcolor=<?echo$col_1_1;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$col_2_1;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$col_3_1;?>>&nbsp;</td></TR>

<TR><TD width=40 align="center"><a href="index.php?reset=1&jp=1" >сброс</a></td><TD width=40 align="center"><a href="index.php?reset=1&jp=2" >сброс</a></td><TD width=40 align="center"><a href="index.php?reset=1&jp=3" >сброс</a></td></TR>

</table>
<br><b>Джекпоты в бонусе 2(FUN)</b>
<table border="1" align="center" cellpadding="2" cellspacing="0" >

<TR><TD width=40 align="center"><b><?echo$gf_bon1_1;?></b></td><TD width=40 align="center"><b><?echo$gf_bon1_2;?></b></td><TD width=40 align="center"><b><?echo$gf_bon1_3;?></b></td></TR>
<TR><TD width=40 bgcolor=<?echo$fcol_1_5;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$fcol_2_5;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$fcol_3_5;?>>&nbsp;</td></TR>
<TR><TD width=40 bgcolor=<?echo$fcol_1_4;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$fcol_2_4;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$fcol_3_4;?>>&nbsp;</td></TR>
<TR><TD width=40 bgcolor=<?echo$fcol_1_3;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$fcol_2_3;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$fcol_3_3;?>>&nbsp;</td></TR>
<TR><TD width=40 bgcolor=<?echo$fcol_1_2;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$fcol_2_2;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$fcol_3_2;?>>&nbsp;</td></TR>
<TR><TD width=40 bgcolor=<?echo$fcol_1_1;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$fcol_2_1;?>>&nbsp;</td><TD width=40 bgcolor=<?echo$fcol_3_1;?>>&nbsp;</td></TR>

<TR><TD width=40 align="center"><a href="index.php?resetf=1&jp=1" >сброс</a></td><TD width=40 align="center"><a href="index.php?resetf=1&jp=2" >сброс</a></td><TD width=40 align="center"><a href="index.php?resetf=1&jp=3" >сброс</a></td></TR>

</table>
</TD></TR>

</table>


<table border="0" align="left" cellpadding="30" cellspacing="0" >
<td>
</td>
</table>


<table border="0" align="center" cellpadding="2" cellspacing="0">
<FORM name="blabla2" action=index.php method=post>
<TR><TD><h4><font color=blue>Режим игры</font></h4></td><td></td><td><h4><font color=blue>Описание</font></h4></td></tr>
<TR><TD align="center"> #1 </td><td><INPUT type="radio" name="g_rezim" value="1" <?echo $g_rezim1;?> style=" border: 1px solid rgb(0,0,0)"> </TD><td><font color=#000080>Только мелкие выигрыши</font></td></TR>
<TR><TD align="center"> #2 </td><td><INPUT type="radio" name="g_rezim" value="2" <?echo $g_rezim2;?> style=" border: 1px solid rgb(0,0,0)"> </TD><td><font color=#000080>Режим #1 + есть шанс на крупный</font></td></TR>
<TR><TD align="center"> #3 </td><td><INPUT type="radio" name="g_rezim" value="3" <?echo $g_rezim3;?> style=" border: 1px solid rgb(0,0,0)"> </TD><td><font color=#000080>Средние и крупные выигрыши <br>(если в кассе мало денег включается режим #2)</font></td></TR>
<TR><TD align="center"> #4 </td><td><INPUT type="radio" name="g_rezim" value="4" <?echo $g_rezim4;?> style=" border: 1px solid rgb(0,0,0)"> </TD><td><font color=#000080>Обычный режим x1</font></td></TR>
<TR><TD align="center"> #5 </td><td><INPUT type="radio" name="g_rezim" value="5" <?echo $g_rezim5;?> style=" border: 1px solid rgb(0,0,0)"> </TD><td><font color=#000080>Обычный режим x2 <br> (Более щедрый режим #4)</font></td></TR>
<TR><TD align="right"><INPUT type=hidden value=2 name=send><INPUT type=submit value="Сохранить"></TD><td>&nbsp;</td></TR>
<font color=red>(не влияет на частоту выпадения)</font>
</td>
</table>
</td></TR>
</FORM>





<TR><TD>
<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla3" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=blue>Частота выпадения...</font></h4></td></tr>

<TR><TD align="left">Бонус 1 (ключи): </td><td align="right">1 из <INPUT maxLength=20 size=10 name=g_shansbon1 value="<?echo $g_shansbon1;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">Бонус 2 (ящики): </td><td>1 из <INPUT maxLength=20 size=10 name=g_shansbon2 value="<?echo $g_shansbon2;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>

<TR><TD align="left">Джекпоты в бонусе 2: </td><td>1 из <INPUT maxLength=20 size=10 name=g_shansbon3 value="<?echo $g_shansbon3;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>

<TR><TD align="left">Удвоения:</td><td>1 из <INPUT maxLength=20 size=10 name=g_shansdouble value="<?echo $g_shansdouble;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>

<TR><TD><b>Выигрыша по линиям:</b></TD><td>&nbsp;</td></TR>
<TR><TD align="left">линий 1 </td><td>1 из <INPUT maxLength=20 size=10 name=g_shanswin1 value="<?echo $g_shanswin1;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">линий 3 </td><td>1 из <INPUT maxLength=20 size=10 name=g_shanswin3 value="<?echo $g_shanswin3;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">линий 5 </td><td>1 из <INPUT maxLength=20 size=10 name=g_shanswin5 value="<?echo $g_shanswin5;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">линий 7 </td><td>1 из <INPUT maxLength=20 size=10 name=g_shanswin7 value="<?echo $g_shanswin7;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">линий 9 </td><td>1 из <INPUT maxLength=20 size=10 name=g_shanswin9 value="<?echo $g_shanswin9;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>

<TR><TD align="right"><INPUT type=hidden value=3 name=send><INPUT type=submit value="Сохранить"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>




<?
$dropdate_y = substr($dropdate_y, 2, 3);
$dropdate=$dropdate_d.".".$dropdate_m.".".$dropdate_y;
if ($dropdate==".."){$dropdate=date("d.m.y");}
list($betall) = mysql_fetch_row(mysql_query("SELECT SUM(stav) FROM stat_game WHERE game='garage' or game='garage_bonus1' or game='garage_bonus2' or game='garage_double'"));
list($winall) = mysql_fetch_row(mysql_query("SELECT SUM(win) FROM stat_game WHERE game='garage' or game='garage_bonus1' or game='garage_bonus2' or game='garage_double' "));
$colbet=mysql_num_rows(mysql_query("SELECT * FROM stat_game WHERE game='garage' or game='garage_bonus1' or game='garage_bonus2' or game='garage_double'"));

list($betall2) = mysql_fetch_row(mysql_query("SELECT SUM(stav) FROM stat_game WHERE game='garage' && data='$dropdate' or game='garage_bonus1' && data='$dropdate' or game='garage_bonus2' && data='$dropdate' or game='garage_double' && data='$dropdate'"));
list($winall2) = mysql_fetch_row(mysql_query("SELECT SUM(win) FROM stat_game WHERE game='garage' && data='$dropdate' or game='garage_bonus1' && data='$dropdate' or game='garage_bonus2' && data='$dropdate' or game='garage_double' && data='$dropdate'"));
$colbet2=mysql_num_rows(mysql_query("SELECT * FROM stat_game WHERE game='garage' && data='$dropdate' or game='garage_bonus1' && data='$dropdate' or game='garage_bonus2' && data='$dropdate' or game='garage_double' && data='$dropdate'"));
$dohod=$betall-$winall;
$dohod2=$betall2-$winall2;
$betall = sprintf ("%01.2f", $betall); 
$winall = sprintf ("%01.2f", $winall);
$dohod = sprintf ("%01.2f", $dohod);
$betall2 = sprintf ("%01.2f", $betall2); 
$winall2 = sprintf ("%01.2f", $winall2);
$dohod2 = sprintf ("%01.2f", $dohod2);
?>




</td>


</TR>

<table align="center" cellpadding="0" cellspacing="0">

</table>


</table>
</body></html>


<?
function DateDropDown($def) {
$deff=explode(".", $def);
echo "<select name=dropdate_d >\n";
for ($i_d = 1; $i_d <= 31; $i_d++) {
$i_d = sprintf ("%02d", $i_d);
if ($i_d == $deff[0]) {$selected="SELECTED";} else {$selected="";}
echo "<option value=\"$i_d\" $selected>$i_d</option>\n";
}echo "</select>.";
echo "<select name=dropdate_m >\n";
for ($i_m = 1; $i_m <= 12; $i_m++) {
$i_m = sprintf ("%02d", $i_m);
if ($i_m == $deff[1]) {$selected="SELECTED";} else {$selected="";}
echo "<option value=\"$i_m\" $selected>$i_m</option>\n";
}echo "</select>.";
echo "<select name=dropdate_y >\n";
for ($i_y = 2006; $i_y <= 2020; $i_y++) {
if ($i_y == "20".$deff[2]) {$selected="SELECTED";} else {$selected="";}
echo "<option value=\"$i_y\" $selected>$i_y</option>\n";
}echo "</select>\n";
}
?>
