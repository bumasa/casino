<? include "pg/secure.inc";?>


<form name="bonus" method="post" action="?pg=bonus">
    <p align="center"><font size="2" face="Tahoma"><b><center>
</b></font><b><font size="2" face="Tahoma" color="white">Количество выплат:  </font><font size="2" face="Tahoma" color="black"><font color=red>

<?


$result=mysql_query("select * from bonus where payd=1");
$number = mysql_num_rows($result);

$resultg=mysql_query("select * from seting ");
 $rog=mysql_fetch_array($resultg);

echo $number;
?>
</font></b><font size="2" face="Tahoma" color="black"><b>


<br><br>
<br><br>
<input value="Получить!" type="submit" class=submit2>
<input name="ok_k" type="hidden" value="1">
</b></font></p>
</form>

<?
if ($ok_k==1){
$result = mysql_query ("select * from bonus WHERE DATE_FORMAT(NOW(),\"%Y-%m-%d\") <= date and ip='$REMOTE_ADDR'");
$result2 = mysql_query ("select * from bonus WHERE DATE_FORMAT(NOW(),\"%Y-%m-%d\") <= date and login='$l'");

if (mysql_num_rows($result)!=0){$ok3=1; echo '<font color=red><b>Ошибка:</font></b><font color=white> С данного IP адреса сегодня уже получали бонус, попробуйте завтра...</b></font><br>';}
if (mysql_num_rows($result2)!=0){$ok3=1; echo '<font color=red><b>Ошибка:</font></b><font color=white> Вы сегодня уже получали бонус, попробуйте завтра...</b></font><br>';}

if ($ok3!=1) {
$topay = $rog['bonus'];
$sqls = "insert into bonus (login,date,bonus,ip,payd) values ('$l',NOW(),'$topay','$REMOTE_ADDR','1')";
mysql_query($sqls);
mysql_query("update users set cash=cash+'$topay' where login='$l'"); 
$date=date("d.m.y"); $time=date("H:i:s");  
$sqls2="INSERT INTO stat_pay VALUES('$l','$date','$time','$topay (b)WMR','0.00','','','$ip','0')";
mysql_query($sqls2);
echo "<font color=green><b>Успешно:</font></b><font color=white> Вы получили ежедневный бонус на счет в размере $topay WMR...</b></font><br>";  

} 
}
?>