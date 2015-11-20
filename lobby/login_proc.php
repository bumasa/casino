<?
session_start();
$log = "";
$psw = "";
foreach ($_POST as $var => $value) 
{
if (preg_match("/^[A-Za-z0-9]{4,15}$/", $value)) {
 if ($var=="log"){ $log=$value;}
 if ($var=="psw"){ $psw=$value;}
}
}
$log = htmlentities($log);
$psw = htmlentities($psw);
#die($log."=".$psw."\n");
if(isset($submit) )
{
include ("../setup.php");
$log2=$log;
$result=mysql_query("select * from users where login='$log2' and check_mail = 1") or die("Error: ".mysql_error());
$row=mysql_fetch_array($result);
$base_login=$row[1];
$base_psw=$row[2];
if($log==$base_login && $psw==$base_psw && $log<>"")
{
$_SESSION['l']=$base_login;
Header("Location: index.php");
exit;
}
else
{
Header("Location: ../index.php");
exit;
}
}
?>