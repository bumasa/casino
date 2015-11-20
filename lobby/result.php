<?
include ("../setup.php");
$conf=mysql_query("select * from seting");
$con=mysql_fetch_array($conf);
$crc = strtoupper($crc);
$my_crc = strtoupper(md5("$out_summ:$inv_id:$con[7]:shpa=$shpa"));
if (strtoupper($my_crc) != strtoupper($crc))
{
echo "bad sign\n";
exit();
}
$pcash=$out_summ/100*$con['pcash'];
mysql_query("update partner set cash=cash+'$pcash' where user='$shpa'");
$res=mysql_query("select * from partner where user='$shpa'");
$ro=mysql_fetch_array($res);
mysql_query("update users set pcash=pcash+'$pcash' where login='$ro[0]'");
mysql_query("update users set cash=cash+'$out_summ' where login='$shpa'");
mysql_query("update users set cashin=cashin+'$out_summ' where login='$shpa'");
$date=date("d.m.y");
$time=date("H:i:s");
$sqls="INSERT INTO stat_pay VALUES('$shpa','$date','$time','$out_summ','0.00')";
mysql_query($sqls);
echo "OK$inv_id\n";
?>