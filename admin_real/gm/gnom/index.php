<?
include ("../../../setup.php");
include ("../../auth.php"); 


if ($send == "1") {
$send="";
mysql_query("update g_set_new_cr set g_bank=$g_bank where g_name='gnome'");
mysql_query("update g_set_new_cr set g_proc=$g_proc where g_name='gnome'");
echo "<script> alert('��������� ���������!'); document.location.href='index.php';</script>";
}

if ($send == "2") {
$send="";
mysql_query("update g_set_new_cr set g_rezim=$g_rezim where g_name='gnome'");
echo "<script> alert('��������� ���������!'); document.location.href='index.php';</script>";
}

if ($send == "3") {
$send="";
$g_shanswin=$g_shanswin1."|".$g_shanswin3."|".$g_shanswin5."|".$g_shanswin7."|".$g_shanswin9."|";
mysql_query("update g_set_new_cr set g_shansbon=$g_shansbon where g_name='gnome'");
mysql_query("update g_set_new_cr set g_shanswin='$g_shanswin' where g_name='gnome'");
mysql_query("update g_set_new_cr set g_rezerv='$g_shansdouble' where g_name='gnome'");
echo "<script> alert('��������� ���������!'); document.location.href='index.php';</script>";
}
if ($send == "4") {
$send="";
mysql_query("update g_set_new_cr set g_cask=$g_cask where g_name='gnome'");
echo "<script> alert('��������� ���������!'); document.location.href='index.php';</script>";
}


$row_bon=mysql_fetch_array(mysql_query("select * from g_set_new_cr where g_name='gnome'"));
$g_shansbon=$row_bon['g_shansbon'];
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
$g_cask=$row_bon['g_cask'];
if ($g_rezim==1){$g_rezim1="CHECKED";$g_rezim2="";$g_rezim3="";$g_rezim4="";$g_rezim5=""; }
if ($g_rezim==2){$g_rezim1="";$g_rezim2="CHECKED";$g_rezim3="";$g_rezim4="";$g_rezim5=""; }
if ($g_rezim==3){$g_rezim1="";$g_rezim2="";$g_rezim3="CHECKED";$g_rezim4="";$g_rezim5=""; }
if ($g_rezim==4){$g_rezim1="";$g_rezim2="";$g_rezim3="";$g_rezim4="CHECKED";$g_rezim5=""; }
if ($g_rezim==5){$g_rezim1="";$g_rezim2="";$g_rezim3="";$g_rezim4="";$g_rezim5="CHECKED"; }
?>

<html>
<head>
<title>��������� ���� gnome</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../../text.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#ffffff" text="#000000">



<center><b>��������� ���� gnome</b><br><a href=../../index.php> << ��������� � ������� </a><br><br></center>

<table border="0" align="center" cellpadding="5" cellspacing="0" >
<TR><TD>

<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla1" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=green>����� ����</font></h4></td><td>&nbsp;</td></tr>
<TR><TD align="right">� ����� ���� </td><td><INPUT maxLength=20 size=10 name=g_bank value="<?echo $g_bank;?>" style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD><b>������� �� ������ � �����</b></TD><td>&nbsp;</td></TR>
<TR><TD align="right">%</td><td><INPUT maxLength=20 size=10 name=g_proc value="<? echo $g_proc; ?>" style=" border: 1px solid rgb(0,0,0)"> </TD></TR>
<TR><TD align="right"><INPUT type=hidden value=1 name=send><INPUT type=submit value="���������"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>

<br>
<br>
<table border="0" align="left" cellpadding="2" cellspacing="0" >
<td>
<FORM name="blabla1" action=index.php method=post>
<TR><TD align="center" valign="center"><h4><font color=green>������</font></h4></td><td>&nbsp;</td></tr>
<TR><TD align="right">��� ������ � </td><td><INPUT maxLength=20 size=10 name=g_cask value="<?echo $g_cask;?>" style=" border: 1px solid rgb(0,0,0)"> </TD></TR>

<TR><TD align="right"><INPUT type=hidden value=4 name=send><INPUT type=submit value="���������"></TD><td>&nbsp;</td></TR>
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
<TR><TD><b>������:</b></TD><td>&nbsp;</td></TR>
<TR><TD align="right"></td><td>1 �� <INPUT maxLength=20 size=10 name=g_shansbon value="<?echo $g_shansbon;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 !!! </TD></TR>
<TR><TD><b>��������:</b></TD><td>&nbsp;</td></TR>
<TR><TD align="right"></td><td>1 �� <INPUT maxLength=20 size=10 name=g_shansdouble value="<?echo $g_shansdouble;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 !!! </TD></TR>

<TR><TD><b>�������� �� ������:</b></TD><td>&nbsp;</td></TR>
<TR><TD align="left">����� 1 </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shanswin1 value="<?echo $g_shanswin1;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 !!! </TD></TR>
<TR><TD align="left">����� 3 </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shanswin3 value="<?echo $g_shanswin3;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 !!! </TD></TR>
<TR><TD align="left">����� 5 </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shanswin5 value="<?echo $g_shanswin5;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 !!! </TD></TR>
<TR><TD align="left">����� 7 </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shanswin7 value="<?echo $g_shanswin7;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 !!! </TD></TR>
<TR><TD align="left">����� 9 </td><td>1 �� <INPUT maxLength=20 size=10 name=g_shanswin9 value="<?echo $g_shanswin9;?>" style=" border: 1px solid rgb(0,0,0)"> min 2 !!! </TD></TR>

<TR><TD align="right"><INPUT type=hidden value=3 name=send><INPUT type=submit value="���������"></TD><td>&nbsp;</td></TR>
</FORM>
</td>
</table>

</TD></TR>





<TR><TD>





<form name="frmMain" action=index.php method="get">
<table border style="BORDER-COLLAPSE: collapse" align="center" cellpadding="5" cellspacing="0">
<TR><TD><h4><font color=green>���������� ����</font></h4></td><td>�����</td><td><? DateDropDown($dropdate); ?><br><input type='submit' class='button' value='��������' ></td></tr>
<TR><TD>������� ������: </td><td><?echo $colbet;?></TD><td><?echo $colbet2;?></TD></TR>
<TR><TD>������ �� �����: </td><td><?echo $betall;?></TD><td><?echo $betall2;?></TD></TR>
<TR><TD>��������� �� �����: </td><td><?echo $winall;?></TD><td><?echo $winall2;?></TD></TR>
<TR><TD>�������: </td><td><?echo $dohod;?></TD><td><?echo $dohod2;?></TD></TR>
</table>
</form>
</td></TR>



<table align="center" cellpadding="0" cellspacing="0">
<center><font color="green" size=2>� 2009 AzartSoft</font><br/>
<font color="red" size=2>���������� ���� www.azartsoft.co.cc</font><br/>
</table>


</table>
</body></html>


<?
function DateDropDown($def) {
echo "<select name=dropdate >\n";
for ($i = 0; $i <= 400; $i++) {
$theday = mktime (0,0,0,04,18+$i ,date("Y"));
$value=date("d.m.y",$theday);
if ($value == $def) {$selected="SELECTED";} else {$selected="";}
echo "<option value=\"$value\" $selected>$value</option>\n";
}
echo "</select>\n";
}

?>
