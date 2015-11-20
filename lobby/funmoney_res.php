<?
include ("../setup_virtual.php");

 if ($_GET["user"]!="")
 {
   $_GET["user"]=trim($_GET["user"]);
   $dt=date("d.m.y");


   $sql_f="select * from users where login='".$_GET["user"]."'";
   $res_f=mysql_query($sql_f);
   $row_f=mysql_fetch_assoc($res_f);

   if ($row_f['date']==$dt)
   {
     $res_text = "Игровой счет можно пополнить через каждый день,\n сегодня вы уже пополнили свой игровой счет!";
     $res_text =  iconv("Windows-1251", "UTF-8", $res_text);   	 print "no+".$res_text;
   }
   else
     {
	   $sql_fun = "UPDATE users SET cash='1000.00' WHERE login='".$_GET["user"]."'";
	   $sql_date = "UPDATE users SET date='".$dt."' WHERE login='".$_GET["user"]."'";
	   mysql_query($sql_fun);
	   mysql_query($sql_date);
	   print "ok+1000.00";
     }

 }


?>




