<?
include ("header.php");
include ("config.bonus.php");
//////////////////////////////////
// Ниже не менять : $bonus_sum (B)
//////////////////////////////////
$date=date("d.m.y");
$time=date("H:i:s");


if ($HTTP_SESSION_VARS['mode']=="false" or !isset($HTTP_SESSION_VARS['mode']))
{
echo "<script> alert('Поменяете режим игры на WMR!'); document.location.href='in.php'; </script>";
exit;
}


if (mysql_fetch_assoc(mysql_query("select * from stat_pay where data='$date' AND user='$l'")))
{
    echo "<script> alert('Сегодня Вы уже получали БОНУС!'); document.location.href='in.php'; </script>";
}
else
	{
	  mysql_query("Update users set cash=cash+'".$_Config['bonus_sum']."' where login='$l'");
	  mysql_query("INSERT INTO stat_pay VALUES('$l','$date','$time','".$_Config['bonus_sum']." (B)','0.00')");
	  echo "<script> alert('Бонус зачислен на ваш игровой счет!'); document.location.href='in.php'; </script>";
	}
include ("footer.php");
?>