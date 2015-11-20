<?
$on_ip = $REMOTE_ADDR;
$on_time = time();
$on_minutes = 3;
$on_found = 0;
$on_users = 0;
$on_user  = "";
if (!is_file("online.txt"))	
{
$on_s = fopen("online.txt","w");
fclose($on_s);
chmod("online.txt",0666);
}
$on_f = fopen("online.txt","r+");
flock($on_f,2);
while (!feof($on_f))
{
$on_user[] = chop(fgets($on_f,65536));
}
fseek($on_f,0,SEEK_SET);
ftruncate($on_f,0);
foreach ($on_user as $on_line)
{
list($on_savedip,$on_savedtime) = split("\|",$on_line);
if ($on_savedip == $on_ip) {$on_savedtime = $on_time;$on_found = 1;}
if ($on_time < $on_savedtime + ($on_minutes * 60)) 
{
fputs($on_f,"$on_savedip|$on_savedtime\n");
$on_users = $on_users + 1;
}
}
if ($on_found == 0) 
{
fputs($on_f,"$on_ip|$on_time\n");
$on_users = $on_users + 1;
}
fclose ($on_f);

echo "Игроков онлайн: ".$on_users;
?>
