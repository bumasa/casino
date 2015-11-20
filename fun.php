<?
include ("setup.php");
########################Статистика на сайт
function statistika()
{
$date=date("d.m.y");
$masvet_user_stat=mysql_num_rows(mysql_query("SELECT * FROM users"));
$masvet_newuser_stat=mysql_num_rows(mysql_query("SELECT * FROM users WHERE date='$date'"));
$masvet_game_stat=mysql_num_rows(mysql_query("SELECT * FROM stat_game"));
$masvet_stat = "Всего игроков: $masvet_user_stat<br>Новых за сутки: $masvet_newuser_stat<br>Сыграли игр: $masvet_game_stat<br>";
echo $masvet_stat;
}
###########################################

################################# Поддкржка
function support()
{
$conf=mysql_query("select * from seting");
$con=mysql_fetch_array($conf);
$masvet_support_email="<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td align=\"CENTER\"><a href=mailto:$con[2]>$con[2]</a><br></td></tr></table>";
if ($con[icq]<>""){
$masvet_support_icq="<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td align=\"CENTER\">ICQ: $con[icq];<br></td></tr><tr><td align=\"CENTER\"><a href=\"http://web.icq.com/whitepages/message_me?uin=$con[icq];&action=message\"><img src=\"http://web.icq.com/whitepages/online?icq=$con[icq];&img=2\" border=0> </a></td></tr></table>";
}
$masvet_support=$masvet_support_email.$masvet_support_icq;
echo $masvet_support;
}
############################################


############################################
function procent()
{
$conf=mysql_query("select * from seting");
$con=mysql_fetch_array($conf);
echo $con['pcash'];
}
############################################

function config()
{
$conf=mysql_query("select * from seting");
$con=mysql_fetch_array($conf);
return $con;
}
$con=config();

$date=date("d.m.y");
?>