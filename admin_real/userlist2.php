<? include "header.php"; ?>

<center><h4><font color=#7C87C2>������ �������</font></h4></center>
<?
@define( "PER_PAGE", 100 );			// ���-�� ������� �� ��������

# ������� ��� ������ �������������
$user_table = '<table border style="BORDER-COLLAPSE: collapse" cellspacing=0 cellpadding=3><tr><td class=text1><b>ID</b></td><td class=text1><b>�����</b></td><td class=text1><b>������</b></td><td class=text1><b>������</b></td><td class=text1><b>����</b></td><td class=text1><b>����</b></td><td class=text1><b>���,�������</b></td><td class=text1><b>E-mail</b></td><td class=text1><b>���� �������.</b></td><td class=text1><b>��������</b></td></tr>';

$CurrentPage = intval( $_GET[ "page" ] ) - 1;
$CurrentPage = ( $CurrentPage < 0 ) ? 0 : $CurrentPage;

# ��������� ��... ��...
$from = !empty( $CurrentPage ) ? $CurrentPage * PER_PAGE : 0;
$to = intval( $from + PER_PAGE );

# ������ � ��
$result=mysql_query("SELECT *, ( SELECT count(*) from users ) AS size FROM users ORDER BY id LIMIT " . $from ."," . PER_PAGE );

# ��������� ����� ��� ������� �������������
while($row=mysql_fetch_array($result)) {
	$user_table .= "<tr><td class=text1>$row[0]</td><td class=text1><a href=stat.php?user=$row[1]>$row[1]</a></td><td class=text1>$row[2]</td><td class=text1><a href=userpay.php?logi=$row[1]>$row[3]</a></td><td class=text1>$row[4]</td><td class=text1>$row[5]</td><td class=text1>$row[7] $row[8]</td><td class=text1><a href=mailto:$row[6]>$row[6]</a></td><td class=text1>$row[9]</td><td class=text1><a href=del.php?user=$row[1]>�������</a><br><a href=stat.php?user=$row[1]>����������</a></td></tr>";

	!isset( $size ) ? $size = $row[ "size" ] : "";
}

# ���-�� ������� �����
$num_pages = ceil( $size / PER_PAGE );

# ��������� ������ �� ��������
$pagenator = "<font size=\"5\" color=\"#9e9e9e\"><b>��������: </b></font>";

for( $i=0; $i < $num_pages; $i++ ) {
	if( $CurrentPage == $i ) {
		$pagenator .= " <font style=\"font-size:12px\" color=\"#ff0000\"><b>" . ($i+1) . "</b></font> ";
	} else {
		$pagenator .= "&nbsp;<a href=\"" . basename( __FILE__ ) . "?page=" . ($i+1)."\">" . ($i+1) . "</a>&nbsp;";
	}
}

# ��������� ������� �������������
$user_table .= "</tr></table>";

# ������� ������ �������
echo $pagenator . "<br />" . $user_table . "<br />" . $pagenator ;

?>


<? include "footer.php"; ?>