<script type="text/javascript" >

	var xmlHttp = createXmlHttpRequestObject();


	function createXmlHttpRequestObject()
	{
		  var xmlHttp;

		  if(window.ActiveXObject)
		  {
		    try
		  {
		      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	      }
	    catch (e)
	    {
	      xmlHttp = false;
	    }
	 }
	 else
	  {
    	try
	    {
	      xmlHttp = new XMLHttpRequest();
    	}
	    catch (e)
	    {
	      xmlHttp = false;
	    }
	  }
	  if (!xmlHttp)

	    alert("Error creating the XMLHttpRequest object.");
	  else
	    return xmlHttp;
	}




	function process(f)
	{

       if (f == 1)
       {
		    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
		    {


			    	var mode = encodeURIComponent(document.getElementById("mode").checked);

				    xmlHttp.open("GET", "fungame_res.php?mode=" + mode, true);
				    xmlHttp.onreadystatechange = handleServerResponse;
				    xmlHttp.send(null);
		    }
		}

       if (f == 2)
       {
		    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
		    {

			    	var user = encodeURIComponent(document.getElementById("user").value);

		            xmlHttp.open("GET", "funmoney_res.php?user=" + user, true);
				    xmlHttp.onreadystatechange = handleServerResponse2;
				    xmlHttp.send(null);
		    }
		}


	}




	function handleServerResponse()
	{

		  if (xmlHttp.readyState == 4)
		  {

			    if (xmlHttp.status == 200)
			    {

				      var response = xmlHttp.responseText;

			    }
			    else
				    {
					      alert("There was a problem accessing the server: " + xmlHttp.statusText);
				    }
		  }
	}



	function handleServerResponse2()
	{

		  if (xmlHttp.readyState == 4)
		  {

			    if (xmlHttp.status == 200)
			    {

				      var response = xmlHttp.responseText;

                      var arr = response.split('+');

                      if (arr[0]=='no')
                      {
 				       	alert(arr[1]);
 				      }

 				      if (arr[0]=='ok')
 				      {
 				       	document.getElementById("fun").innerHTML = '<p align="left"><b><font color="#8B8B8B">'+arr[1]+'&nbsp;FUN</font></b></p>';
				      	alert('Ваш игровой счет успешно пополнен!')
                      }

			    }
			    else
				    {
					      alert("There was a problem accessing the server: " + xmlHttp.statusText);
				    }
		  }
	}


</script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>



<tr>
    <td align="left" valign="top">
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>

    <td align="center" width="100%" bgcolor="#000000" style="padding-top:5px; "><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td width="250px" valign="top" style="padding-left:0px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" alt="" width="145" height="1"></div><table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" style="margin-bottom:5px; margin-right:0px; margin-left:0px; ">
  <tr>
    <td height="24" align="left" valign="middle" style="background:url(../image/px_block.gif) top repeat-x; border:1px solid #6E2500; padding:1px;  ">
	<table cellspacing="0" cellpadding="0" width="100%" height="100%" style="border:1px solid #2E2E2E;">
	  <tr>
		<td><div style="padding-left:3px; padding-right:10px; padding-top:0px; color: #FF7800; font-weight:bold; font-size:10px">&nbsp;&nbsp;<span class="style1">Ваш счёт</span></div></td>

	  </tr>
	</table>
	</td>
  </tr>
  <tr>
    <td id="ma" align="left" valign="top" style="border-bottom:1px solid #6E2500; border-left:1px solid #6E2500; border-right:1px solid #6E2500; padding:1px;">

	<table width="100%" style="height:100%; background-color:#101010; border:1px solid #2E2E2E;   " border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td valign="top">


		     <table width="100%" border="0">
		       <tr>
		          <td>
		                <strong>Логин:</strong>
		          </td>
		          <td>
		                 <? echo $l; ?>
		          </td>
		        </tr>
		       <tr>
		          <td>
		               <strong>Счет:</strong>
		          </td>
		          <td>
		               <? echo $row['cash']; ?>&nbsp;WMR
		          </td>
		        </tr>
		       <tr>
		          <td>

						<?
							//*****************GAME FUN**************************
							include ("../setup_virtual.php");
							$sql_fun="select * from users where login='$l'";
							$res_fun=mysql_query($sql_fun);
							$row_fun=mysql_fetch_assoc($res_fun);
							//****************************************************
						?>
                       <input name="user" id="user"  type="hidden" value=" <? echo $l; ?> ">
                       <strong>Счет:</strong>
		          </td>
		          <td>
		                <div id='fun'><? echo $row_fun['cash']; ?> &nbsp;FUN </div>
						<? include ("../setup.php"); ?>
		          </td>
		        </tr>
                </table>


     	</td>
	  </tr>



	  <tr>
	    <td width="230"><img src="../image/spacer.gif" alt="" width="145" height="1"></td>
	  </tr>
	</table>

	</td>
  </tr>
</table></td>
  </tr>
</table>





<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" style="margin-bottom:5px; margin-right:0px; margin-left:0px; ">
  <tr>
    <td height="24" align="left" valign="middle" style="background:url(../image/px_block.gif) top repeat-x; border:1px solid #6E2500; padding:1px;  ">
	<table cellspacing="0" cellpadding="0" width="100%" height="100%" style="border:1px solid #2E2E2E;">
	  <tr>
		<td><div style="padding-left:3px; padding-right:10px; padding-top:0px; color: #FF7800; font-weight:bold; font-size:10px">&nbsp;&nbsp;<span class="style1">Режим игры</span></div></td>

	  </tr>
	</table>
	</td>
  </tr>
  <tr>
    <td id="ma" align="left" valign="top" style="border-bottom:1px solid #6E2500; border-left:1px solid #6E2500; border-right:1px solid #6E2500; padding:1px;">

	<table width="100%" style="height:100%; background-color:#101010; border:1px solid #2E2E2E;   " border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td valign="top">


          <input name="mode" id="mode" type="radio" value="real" <? if ($_SESSION['mode']=="true" or !isset($_SESSION['mode'])) echo " checked " ?> onclick="process(1);">
          <b>WMR Счет</b><br>


          <input name="mode" id="mode" type="radio" value="virtual" <? if ($_SESSION['mode']=="false") echo " checked " ?> onclick="process(1);">
          <b>FUN Счет</b><br>
		</td>
	  </tr>
	  <tr>
	    <td width="230"><img src="../image/spacer.gif" alt="" width="145" height="1"></td>
	  </tr>
	</table>

	</td>
  </tr>

</table></td>
  </tr>
</table>








<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" style="margin-bottom:5px; margin-right:0px; margin-left:0px; ">
  <tr>
    <td height="24" align="left" valign="middle" style="background:url(../image/px_block.gif) top repeat-x; border:1px solid #6E2500; padding:1px;  ">
	<table cellspacing="0" cellpadding="0" width="100%" height="100%" style="border:1px solid #2E2E2E;">
	  <tr>
		<td><div style="padding-left:3px; padding-right:10px; padding-top:0px; color: #FF7800; font-weight:bold; font-size:10px">&nbsp;&nbsp;<span class="style1">Касса</span></div></td>

	  </tr>
	</table>
	</td>
  </tr>
  <tr>
    <td id="ma" align="left" valign="top" style="border-bottom:1px solid #6E2500; border-left:1px solid #6E2500; border-right:1px solid #6E2500; padding:1px;">

	<table width="100%" style="height:100%; background-color:#101010; border:1px solid #2E2E2E;   " border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td valign="top">

<div style="padding-left:5px; padding-right:10px; padding-top:5px; padding-bottom:10px" class="style2">
<strong><big>&middot;</big></strong>&nbsp;<a href="/lobby/in.php">Пополнить WMR счёт</a><br>
<strong><big>&middot;</big></strong>&nbsp;<a href="javascript:process(2);">Пополнить FUN счёт</a><br>
<strong><big>&middot;</big></strong>&nbsp;<a href="/lobby/out.php">Снять</a><br>
<strong><big>&middot;</big></strong>&nbsp;<a href="/lobby/stat.php">История</a>
</div>

		</td>
	  </tr>
	  <tr>
	    <td width="230"><img src="../image/spacer.gif" alt="" width="145" height="1"></td>
	  </tr>
	</table>

	</td>
  </tr>

</table></td>
  </tr>
</table>



<?
$strok=mysql_query("SELECT * FROM partner WHERE pus='$l'");
$userp = mysql_num_rows($strok);
?>

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" style="margin-bottom:5px; margin-right:0px; margin-left:0px; ">
  <tr>
    <td height="24" align="left" valign="middle" style="background:url(../image/px_block.gif) top repeat-x; border:1px solid #6E2500; padding:1px;  ">
	<table cellspacing="0" cellpadding="0" width="100%" height="100%" style="border:1px solid #2E2E2E;">
	  <tr>
		<td><div style="padding-left:3px; padding-right:10px; padding-top:0px; color: #FF7800; font-weight:bold; font-size:10px">&nbsp;&nbsp;<span class="style1">Партнёрка</span></div></td>

	  </tr>
	</table>
	</td>
  </tr>
  <tr>
    <td id="ma" align="left" valign="top" style="border-bottom:1px solid #6E2500; border-left:1px solid #6E2500; border-right:1px solid #6E2500; padding:1px;">

	<table width="100%" style="height:100%; background-color:#101010; border:1px solid #2E2E2E;   " border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td valign="top">

<div style="padding-left:5px; padding-right:10px; padding-top:5px; padding-bottom:10px" class="style2">
<strong>Партнёров:</strong> <? echo $userp; ?>
<br>
<strong>Заработано:</strong> <? echo $row[10]; ?> руб.

</div>
		</td>
	  </tr>
	  <tr>
	    <td width="230"><img src="../image/spacer.gif" alt="" width="145" height="1"></td>
	  </tr>
	</table>

	</td>
  </tr>

</table></td>
  </tr>
</table>






</td>
