<style type="text/css">
<!--
A.mail:link {COLOR: #000080; FONT-WEIGHT: normal; FONT-FAMILY: verdana, arial, helvetica, sans-serif; FONT-SIZE: 11px; TEXT-DECORATION: none}
A.mail:visited {COLOR: #ff0000; FONT-WEIGHT: normal; FONT-FAMILY: verdana, arial, helvetica, sans-serif; FONT-SIZE: 11px; TEXT-DECORATION: none}
A.mail:hover {COLOR: #000000; FONT-WEIGHT: normal; FONT-FAMILY: verdana, arial, helvetica, sans-serif; FONT-SIZE: 11px; TEXT-DECORATION: underline}
-->
</style>

<?
include "header.php"; 
$key="ghjdthrf"; // НЕ МЕНЯТЬ !!!!!!
include "mail_set.ini";

$priority = "3";
$fileaddr = "mail_addr.ini";
$filemsg  = "mail_msg.ini";



If ($page == "send") {
 $f = file($fileaddr);
 $f3 = file($filemsg);
 $msg = "";

 for ($s = 0; $s < count($f3); $s++) {
  $msg .= trim($f3[$s]) . "\n";
 }

If ($format == "TEXT") {$format="text/plain"; $msg .= "\n\n\n--------------\n Для отказа от рассылки перейдите по ссылке:\n http://".$_SERVER[HTTP_HOST]."/unsubscribe.php?code=%EMAIL%";}
If ($format == "HTML") {$format="text/html"; $msg .= "\n\n\n--------------\n<br> Для отказа от рассылки перейдите по ссылке:\n<br> <a href=http://".$_SERVER[HTTP_HOST]."/unsubscribe.php?code=%EMAIL%>Отписаться от рассылки</a>";}


for ($i = $nf; $i < $nt; $i++) {
mail(trim($f[$i]), $subject, str_replace("%EMAIL%", MD5($f[$i].$key)."&email=".$f[$i] ,$msg), "From: $fromname <$frommail>\nContent-Type:$format;charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: $priority\nX-Mailer:Casino mail v2");
}

 $b=$i++;
 echo "<p><b>Все $b сообщения отправлены</b></p>\n";

}Else{

 $f2 = file($fileaddr);
 for ($e = 1; $e < ceil(count($f2) / 100 +1); $e++) {
  If ($e*100 > count($f2)) {
   $nt = count($f2);
  }
  Else {
   $nt = $e*100;
  }
  $nf = $e*100-100;
$rnd3=rand(0,88888);
  echo "<p><a class='mail' href='mail_send.php?page=send&nf=$nf&nt=$nt&rnd3=$rnd3' target='_blank'>Отправить с $nf по $nt</a></p>\n";
 }
}

include "footer.php"; 
?>
