<? include ("header.php");
include ("../setup_virtual.php");
$resultg=mysql_query("select * from seting ");
$rog=mysql_fetch_array($resultg);
?>

<center><h4><font color=7C87C2>��������� ������</font></h4><br></center>


<table border="0" align="center" cellpadding="0" cellspacing="10">
<FORM action=config.php method=post>
<TR><td>����� ������ : </td><TD><INPUT size=40 name=alog value=<? echo $rog[0] ?>></TD></TR>
<TR><td>������ ������ </td><TD><INPUT size=40 name=apas value=<? echo $rog[1] ?>></TD></TR>
<TR><td>Email ������</td><TD><INPUT size=40 name=adm_email value=<? echo $rog[2] ?>></TD></TR>
<TR><td>ICQ ������ (���� ��� �� �����)</td><TD><INPUT size=40 name=icq value=<? echo $rog['icq'] ?>></TD></TR>
<TR><td>url ������ (������� � http:// � ��� "/" �����)</td><TD><INPUT size=40 name=cas_url value=<? echo $rog[3] ?>></TD></TR>
<TR><td>�������� ������</td><TD><INPUT size=40 name=cas_name value=<? echo $rog[4] ?>></TD></TR>
<TR><td>�����������</td><TD><INPUT size=20 name=pcash value=<? echo $rog['pcash'] ?>> %</TD></TR>

<TR><td><b>�������� Email ������:</b></td><TD></TD></TR>
<TR><td>��� ���������� �����</td><TD><input type=checkbox name="paymail" value="yes"<? if($rog["paymail"] == 'yes') { echo ' checked'; } ?>></TD></TR>
<TR><td>��������� ����� �����</td><TD><input type=checkbox name="regmail" value="yes"<? if($rog["regmail"] == 'yes') { echo ' checked'; } ?>></TD></TR>
<TR><td>����� �������</td><TD><input type=checkbox name="zakmail" value="yes"<? if($rog["zakmail"] == 'yes') { echo ' checked'; } ?>></TD></TR>

<TR>

        <td bgcolor="#FFFFFF"><font face="Verdana" size="2">

	<span style="background-color: #FFFFFF">����� ���������� ������� WMR(����������� .)</span></font></td>

        <TD bgcolor="#FFFFFF"><font face="Verdana">

	<INPUT size=10 name=us_bonus value="<? echo $rog['bonus'] ?>"></font></TD>

    </TR>


<TR><td><b>��������� Roboxchange.com</b></td><TD></TD></TR>
<TR><td>LOGIN � Robox</td><TD><INPUT size=40 name=mrh_login value=<? echo $rog[5] ?>></TD></TR>
<TR><td>PASS1 � Robox</td><TD><INPUT size=40 name=mrh_pass1 value=<? echo $rog[6] ?>></TD></TR>
<TR><td>PASS2 � Robox</td><TD><INPUT size=40 name=mrh_pass2 value=<? echo $rog[7] ?>></TD></TR>

<TR><TD><INPUT type=hidden value=1 name=send><INPUT type=hidden value=<? echo $rog[cas_bon] ?> name=cas_bon><INPUT type=submit value="���������"></TD></TR>
</FORM>
</table>


<?

if ($send=="1"){
mysql_query("UPDATE seting SET alog='$alog',apas='$apas',adm_email='$adm_email',cas_url='$cas_url',cas_name='$cas_name',mrh_login='$mrh_login',mrh_pass1='$mrh_pass1',mrh_pass2='$mrh_pass2',pcash='$pcash',cas_bon='$cas_bon',bonus='$us_bonus',paymail='$paymail',regmail='$regmail',zakmail='$zakmail',icq='$icq'");
echo "<script> alert('��������� ���������!'); document.location.href='config.php';</script>";
}

include ("footer.php"); ?>