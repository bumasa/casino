<?

 include "header.php";


if ($_POST["send"]!="1")
{
?>

<br>
<form name="test_form" action="user_test.php" method="post">
<center>
<table cellspacing=2 cellpadding=5 border=0 width=400>
<tr>
    <td colspan="2" align=center>
        <b><font face="tahoma">�������� ������</font></b><br><br>
    </td>
</tr>
<tr>
     <td align=right width=140>
        <font face="tahoma">�����:</font><br><br>
     </td >
     <td>
        <input name="log_name" id="log_name" type="text" value="" style="width:130;" maxlength="25"><br><br>
     </td>
</tr>
<tr>
     <td colspan=2 align=center>
          <input name="send" id="send" type="hidden" value="1">
          <input name="test_btn" type="submit" value="��������� ����������">
     </td>
</tr>
</table>
</center>
</form>

<?
}
else
    {
		if ($_POST["send"]==1)
		{

		  	if ($_POST["log_name"]!="")
		  	{                //����� ������� �� �������
				$sql_0 = mysql_query("SELECT * FROM users WHERE login='$_POST[log_name]'");
				$user = mysql_num_rows($sql_0);
				$user_info = mysql_fetch_array($sql_0);


                 //�������� �� ������������� ������
                 if ($user=="0")
                 {
                   echo "<script language=javascript>
                             alert('� ���� ������ ��� ������������ � ����� �������');
                             document.location.href = 'user_test.php';
                         </script>
                        ";
                 }


                 //����� �c�� ��������� ������
				 $sql_1 = mysql_query("SELECT SUM(deposit) as sum_dep FROM `user_deposits` WHERE login='$_POST[log_name]'");
				 $res_1 = mysql_fetch_array($sql_1);
				 $sum_dep = $res_1["sum_dep"];

				 //����� �c�� ������ ������
				 $sql_2 = mysql_query("SELECT SUM(outm) as sum_out FROM `stat_pay`  WHERE user='$_POST[log_name]'");
				 $res_2 = mysql_fetch_array($sql_2);
				 $sum_out = $res_2["sum_out"];


				 //����������� ����� ���� ��������� ������
				 $sql_3 = mysql_query("SELECT deposit as sum_dep_kontrol FROM `users` WHERE login='$_POST[log_name]'");
				 $res_3 = mysql_fetch_array($sql_3);
				 $sum_dep_kontrol = $res_3["sum_dep_kontrol"];

				 //2-�� ����������� ����� ��������� ������
				 $sql_4 = mysql_query("SELECT SUM(inm) as sum_dep2 FROM `stat_pay` WHERE user='$_POST[log_name]'");
				 $res_4 = mysql_fetch_array($sql_4);
				 $sum_dep2 = $res_4["sum_dep2"];


				 //������� ��� ��������� ������
				 $sql_5 = mysql_query("SELECT SUM(sumout) as sum_end FROM `zakaz`  WHERE login='$_POST[log_name]' and flag='0'");
				 $res_5 = mysql_fetch_array($sql_5);
				 $sum_end = $res_5["sum_end"];

				 //������� ��� ��������� ������
				 $sql_6 = mysql_query("SELECT SUM(sumout) as sum_add FROM `zakaz`  WHERE login='$_POST[log_name]' and flag='1'");
				 $res_6 = mysql_fetch_array($sql_6);
				 $sum_add = $res_6["sum_add"];

				 //����� ���� ��������� ������
				 $sql_6 = mysql_query("SELECT SUM(sumout) as sum_add FROM `zakaz`  WHERE login='$_POST[log_name]' and flag='1'");
				 $res_6 = mysql_fetch_array($sql_6);
				 $sum_add = $res_6["sum_add"];

				 //����������� ����� �c�� ������ ������
				 $sql_7 = mysql_query("SELECT cashout as sum_out_kontrol FROM `users`  WHERE login='$_POST[log_name]'");
				 $res_7 = mysql_fetch_array($sql_7);
				 $sum_out_kontrol = $res_7["sum_out_kontrol"];

				 //����� ���� ��������� ������
				 $sql_8 = mysql_query("SELECT SUM(win) as sum_win FROM `stat_game`  WHERE login='$_POST[log_name]'");
				 $res_8 = mysql_fetch_array($sql_8);
				 $sum_win = $res_8["sum_win"];

				 //����� ���� ������ ������
				 $sql_9 = mysql_query("SELECT SUM(stav) as sum_stav FROM `stat_game`  WHERE login='$_POST[log_name]'");
				 $res_9 = mysql_fetch_array($sql_9);
				 $sum_stav = $res_9["sum_stav"];

				 //�������� ���� ������
  				 $real_cash = $sum_dep_kontrol - $sum_out - $sum_stav + $sum_win;


				 //������� ���� ������
				 $sql_11 = mysql_query("SELECT cash FROM `users`  WHERE login='$_POST[log_name]'");
				 $res_11 = mysql_fetch_array($sql_11);
				 $curr_cash = $res_11["cash"];

		  	}

?>

	     <br>
	     <center>
		 <table width="500" cellspacing="4" cellpadding="4" border="1" bordercolor="black" frame="hsides">
		 <tr>
		 	  <td colspan="2">
		    	  <center><h3><font color="black">C��������� ������ <u><? echo $_POST["log_name"]; ?></u>. </font></h3></center>
		  	 </td>
		  </tr>
			<tr><td><b><font size="2" face="Tahoma">����� �c�� ��������� ������:</font></b></td><td><b><font color="#1AB015"><? if ($sum_dep=="") echo "0";  else echo $sum_dep; ?> �.</font></b></td></tr>
			<tr><td><b><font size="2" face="Tahoma">����������� ����� �c�� ���������:</font></b></td><td><font color="#1AB015"><? echo $sum_dep_kontrol; ?> �.</font></td></tr>
			<tr><td><b><font size="2" face="Tahoma">2-�� ����������� ����� ���������:</font></b></td><td><font color="#1AB015"><? if ($sum_dep2=="") echo "0";  else echo $sum_dep2; ?> �.</font></b></td></tr>
			<tr><td><b><font size="2" face="Tahoma">C���� �c�� ������ ������:</font></b></td><td><b><font color="#EA2900"><? if ($sum_out=="") echo "0";  else echo $sum_out; ?> �.</font></b></td></tr>
			<tr><td><b><font size="2" face="Tahoma">����������� ����� �c�� ������ ������:</font></b></td><td><font color="#EA2900"><? echo $sum_out_kontrol; ?> �.</font></td></tr>
			<tr><td><b><font size="2" face="Tahoma">������� ��� ��������� ������:</font></b></td><td><b><font color="#EA2900"><? if ($sum_end=="") echo "0";  else echo $sum_end; ?> �.</font></b></td></tr>
			<tr><td><b><font size="2" face="Tahoma">������� �������� ��������� ������:</font></b></td><td><b><font color="#1AB015"><? if ($sum_add=="") echo "0";  else echo $sum_add; ?> �.</font></b></td></tr>
			<tr><td><b><font size="2" face="Tahoma">������� + �����������:(��� ��������)</font></b></td><td><b><font color="#6A6A6A"><? echo $sum_end + $sum_add; ?> �.</font></b></td></tr>
			<tr><td><b><font size="2" face="Tahoma">����� ���� ��������� ������:</font></b></td><td><b><font color="#C40000"><? if ($sum_win=="") echo "0";  else echo $sum_win; ?> �.</font></b></td></tr>
			<tr><td><b><font size="2" face="Tahoma">����� ���� ������ ������:</font></b></td><td><b><font color="#1AB015"><?  if ($sum_stav=="") echo "0";  else echo $sum_stav; ?> �.</font></b></td></tr>
			<tr><td><b><font size="2" face="Tahoma">��������� ��������� ������:(+ ��� -)</font></b></td><td><b><font color="#A4135B"><? echo $sum_win-$sum_stav; ?> �.</font></b></td></tr>
			<tr><td><b><font size="2" face="Tahoma">�������� ���� ������(������ ����):</font></b></td><td><b><font color="#000000"><? echo $real_cash; ?> �.</font></b></td></tr>
			<tr><td><b><font size="2" face="Tahoma">������� ���� ������:</font></b></td><td><b><font color="#0A869C"><? echo $curr_cash; ?> �.</font></td></tr>
		  </table>
		  <br>
	      </center> <?
	    }

	}
include "footer.php";

?>