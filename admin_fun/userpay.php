<? include ("header.php"); ?>

<center><h4><font color=7C87C2>������ ����������� ������ ������</font></h4><br>
<table border=0 cellspacing=0 cellpadding=3 >

<FORM action=userpay.php method=post>
<TR>
<TD class=text1><B>�����</B>&nbsp;:</TD>
<TD><INPUT maxLength=16 size=25 name=logi value=<? echo $logi; ?>></TD>
</TR>
<TR>
<TD class=text1><B>�����</B>&nbsp;:</TD>
<TD class=text1><INPUT maxLength=16 size=20 name=sumin>&nbsp;���.</TD>
</TR>

<TR>
<TD class=text1>&nbsp;</TD>
<TD class=text1><INPUT type=radio checked name=send value=1>&nbsp;���������</TD>
</TR>
<TR>
<TD class=text1>&nbsp;</TD>
<TD class=text1><INPUT type=radio name=send value=2>&nbsp;�����</TD>
</TR>
<TR>
<TD class=text1></TD>
<TD><INPUT type=submit value="���������"></TD>
</TR>
</FORM>


</table><br>������� ����� ��������� ������!<br>
</center>

<?
if ($send=="1"){
mysql_query("update users set cash=cash+'$sumin' where login='$logi'");
mysql_query("update users set cashin=cashin+'$sumin' where login='$logi'");
$date=date("d.m.y");
$time=date("H:i:s");
$sqls="INSERT INTO stat_pay VALUES('$logi','$date','$time','$sumin (a)','0.00')";
mysql_query($sqls);
echo "<script> alert('���� ��������!'); document.location.href='userlist.php'; </script>";
}
if ($send=="2"){
mysql_query("update users set cash=cash-'$sumin' where login='$logi'");
mysql_query("update users set cashout=cashout+'$sumin' where login='$logi'");
$date=date("d.m.y");
$time=date("H:i:s");
$sqls="INSERT INTO stat_pay VALUES('$logi','$date','$time','0.00','$sumin (a)')";
mysql_query($sqls);
echo "<script> alert('��������� ����� �����!'); document.location.href='userlist.php'; </script>";
}

include ("footer.php"); 
?>