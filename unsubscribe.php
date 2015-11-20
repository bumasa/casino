<?
$admindir="admin_real"; // название папки с админкой


$key="\nghjdthrf"; // Ќ≈ ћ≈Ќя“№ !!!!!!
function checkEmail($email){
return ereg( "^[^@  ]+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]{2}|net|com|gov|mil|org|edu|int|biz|by|ru|uk)\$",$email);
}

function checkEmail2($email2,$admindir){
$base=@file($admindir."/mail_addr_uns.ini"); 
$cnt=sizeof($base);
$err=0;
$am=0;
  while ($am < $cnt) {
  $masvet=$base[$am];
  if ($masvet == $email2."\n"){$err=1; }
  $am++;
  }
return $err;
}


$email_test2=checkEmail($email);
$email_test3=checkEmail2($email,$admindir);

if ($email_test2==false){
echo "ќшибка, неверный E-mail";
exit;
}

if ($email_test3==1){
echo "ќшибка, E-mail не подписан, либо был удален";
exit;
}


$email_test=MD5($email.$key);

if ($code==$email_test){


$fp = fopen ($admindir."/mail_addr_uns.ini", "a+");
fwrite ($fp, $email."\n");
fclose ($fp);

echo "ваш E-mail удален из рассылки";
}else{
echo "ќшибка, неверный E-mail";
}

?>
