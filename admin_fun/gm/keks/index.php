<?
include ("../../../setup_virtual.php");
include ("../../auth.php"); 


if ($send == "1") {
$send="";
mysql_query("update g_set_new set g_bank=$g_bank where g_name='keks'");
mysql_query("update g_set_new set g_proc=$g_proc where g_name='keks'");
echo "<script> alert('��������� ���������!'); document.location.href='index.php';</script>";
}

if ($send == "2") {
$send="";
mysql_query("update g_set_new set g_rezim=$g_rezim where g_name='keks'");
echo "<script> alert('��������� ���������!'); document.location.href='index.php';</script>";
}

if ($send == "3") {
$send="";
$g_shanswin=$g_shanswin1."|".$g_shanswin3."|".$g_shanswin5."|".$g_shanswin7."|".$g_shanswin9."|";
$g_shansbon=$g_shansbon1."|".$g_shansbon2."|".$g_shansbon3."|";
mysql_query("update g_set_new set g_shansbon='$g_shansbon' where g_name='keks'");
mysql_query("update g_set_new set g_shanswin='$g_shanswin' where g_name='keks'");
mysql_query("update g_set_new set g_rezerv='$g_shansdouble' where g_name='keks'");
echo "<script> alert('��������� ���������!'); document.location.href='index.php';</script>";
}



$row_bon=mysql_fetch_array(mysql_query("select * from g_set_new where g_name='keks'"));
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
?>

<html>
<head>
<title>��������� ���� keks</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../../text.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#ffffff" text="#000000">



<center><b>��������� ���� keks</b><br><a href=../../index.php> << ��������� � ������� </a><br><br></center>

<table border="0" align="center" cellpadding="5" cellspacing="0" >
<TR><TD>

<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla1" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=green>����� ����</font></h4></td><td>&nbsp;</td></tr>
<TR><TD align="right">� ����� ���� </td><td><INPUT maxLength=20 size=10 name=g_bank value="<?echo $g_bank;?>" style="border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD><b>������� �� ������ � �����</b></TD><td>&nbsp;</td></TR>
<TR><TD align="right">%</td><td><INPUT maxLength=20 size=10 name=g_proc value="<? echo $g_proc; ?>" style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD align="right"><INPUT type=hidden value=1 name=send><INPUT type=submit value="���������"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>


<table border="0" align="left" cellpadding="30" cellspacing="0" >
<td>
</td>
</table>


<table border="0" align="center" cellpadding="2" cellspacing="0">
<FORM name="blabla2" action=index.php method=post>
<TR><TD><h4><font color=green>����� ����</font></h4></td><td></td><td><h4><font color=green>��������</font></h4></td></tr>
<TR><TD align="center"> #1 </td><td><INPUT type="radio" name="g_rezim" value="1" <?echo $g_rezim1;?> style=" border: 1px solid rgb(0,0,0)"> </TD><td><font color=green>������ ������ ��������</font></td></TR>
<TR><TD align="center"> #2 </td><td><INPUT type="radio" name="g_rezim" value="2" <?echo $g_rezim2;?> style=" border: 1px solid rgb(0,0,0)"> </TD><td><font color=green>����� #1 + ���� ���� �� �������</font></td></TR>
<TR><TD align="center"> #3 </td><td><INPUT type="radio" name="g_rezim" value="3" <?echo $g_rezim3;?> style=" border: 1px solid rgb(0,0,0)"> </TD><td><font color=green>������� � ������� �������� <br>(���� � ����� ���� ����� ���������� ����� #2)</font></td></TR>
<TR><TD align="center"> #4 </td><td><INPUT type="radio" name="g_rezim" value="4" <?echo $g_rezim4;?> style=" border: 1px solid rgb(0,0,0)"> </TD><td><font color=green>������� ����� x1</font></td></TR>
<TR><TD align="center"> #5 </td><td><INPUT type="radio" name="g_rezim" value="5" <?echo $g_rezim5;?> style=" border: 1px solid rgb(0,0,0)"> </TD><td><font color=green>������� ����� x2 <br> (����� ������ ����� #4)</font></td></TR>
<TR><TD align="right"><INPUT type=hidden value=2 name=send><INPUT type=submit value="���������"></TD><td>&nbsp;</td></TR>
<font color=red>(�� ������ �� ������� ���������)</font>
</td>
</table>
</td></TR>
</FORM>


<TR><TD>
<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla3" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=green>������� ���������</font></h4></td></tr>

<TR><TD align="left">����� 1 : </td><td align="right">1 �� <INPUT maxLength=20 size=10 name=g_shansbon1 value="<?echo $g_shansbon1;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">����� 2 (� ������ 1): </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shansbon3 value="<?echo $g_shansbon3;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>

<TR><TD align="left">��������:</td><td>1 �� <INPUT maxLength=20 size=10 name=g_shansdouble value="<?echo $g_shansdouble;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>

<TR><TD><b>�������� �� ������:</b></TD><td>&nbsp;</td></TR>
<TR><TD align="left">����� 1 </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shanswin1 value="<?echo $g_shanswin1;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">����� 3 </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shanswin3 value="<?echo $g_shanswin3;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">����� 5 </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shanswin5 value="<?echo $g_shanswin5;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">����� 7 </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shanswin7 value="<?echo $g_shanswin7;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>
<TR><TD align="left">����� 9 </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shanswin9 value="<?echo $g_shanswin9;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 </TD></TR>

<TR><TD align="right"><INPUT type=hidden value=3 name=send><INPUT type=submit value="���������"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>







</TR>

<table align="center" cellpadding="0" cellspacing="0">
<center><font color="green" size=2>� 2009 AzartSoft</font><br/>
<font color="red" size=2>���������� ���� www.azartsoft.co.cc</font><br/>
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
