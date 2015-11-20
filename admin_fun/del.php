<? include ("header.php");
mysql_query("DELETE FROM users WHERE login = '$user'");
echo "<script>document.location.href='userlist.php'; </script>";
include ("footer.php"); 
?>