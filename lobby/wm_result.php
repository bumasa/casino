<?
$seckey="123"; // Секретный ключ лучше длинный

include ("../setup.php");
$conf=mysql_query("select * from seting");
$con=mysql_fetch_array($conf);



$hash = strtolower($LMI_HASH);
$char=substr($LMI_PAYER_PURSE,0,1);
$md5res = md5($LMI_PAYEE_PURSE.$LMI_PAYMENT_AMOUNT.$LMI_PAYMENT_NO.$LMI_MODE.$LMI_SYS_INVS_NO.$LMI_SYS_TRANS_NO.$LMI_SYS_TRANS_DATE.$seckey.$LMI_PAYER_PURSE.$LMI_PAYER_WM);

$out_summ=$LMI_PAYMENT_AMOUNT;
if ($hash == $md5res) {
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
echo "YES\n";


$con=mysql_fetch_array(mysql_query("select * from seting"));
if ($con[paymail]=="yes"){
include("../mail/in.php");
$to =$con['adm_email'];
$subject = $reg_reg_mail_subject;
$msg =$reg_reg_mail;
$mailheaders = "Content-Type: text/plain; charset=Windows-1251\n";
$mailheaders .= "From: $con[adm_email]\n";
mail($to, $subject, $msg, $mailheaders);
}
}





?>