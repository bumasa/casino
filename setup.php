<?
error_reporting(0);
$dbhost="localhost"; ///��� ����� (������ localhost)
$dbuname="root"; ///��� ������������
$dbpass="12345"; ///������ 
$dbname="baza"; ///��� ����

$full_base = mysql_connect($dbhost, $dbuname, $dbpass) or die("<br><br><center><br><br><b>��������, �� � ������ ������ �� ����� ���� ����������� ������.<br><br>�������� ���� ���������, ������ ��� ����� ������� �����.</center></b>");
mysql_select_db($dbname, $full_base);
?>