<?

  function winlimit ()
  {




   $rowb=mysql_fetch_array(mysql_query("select * from game_bank where name='ttuz'"));



 $bank = $rowb['bank']; 
//////////////////////////////////////////////

$caswin =  $bank/100*$rowb['proc'];


    return $caswin;
  }
  error_reporting (0);
  unset ($l);
  session_start ();
  session_register ($l);
  if (!(isset ($l)))
  {
    header ('Location: ../../login.php');
    exit ();
  }

//**************GAMEMODE*****************************************************************
if ($HTTP_SESSION_VARS['mode']=="true" or !isset($HTTP_SESSION_VARS['mode']))
{
 include ("../../../setup.php");
}

if ($HTTP_SESSION_VARS['mode']=="false")
{
      include ("../../../setup_virtual.php");
}
//****************************************************************************************
  include 'caswin.inc.php';
$prLosePlayer=7; // процент проигрыша игрока в расчёте из сыграных 10 ... число от 0 до 10




  if (isset ($_POST['bet']))
  {
    $bet = $_POST['bet'];
  }
  else
  {
    $bet = '';
  }

  if (isset ($_POST['lines']))
  {
    $line = $_POST['lines'];
  }
  else
  {
    $lines = '';
  }

  $row = mysql_fetch_array (mysql_query ('select * from users where login=\'' . $l . '\''));
  $user_balance = $row[3];
 


  if ($user_balance < $bet)
  {
    $mon = 0;
  }

   if($bet < 0 or $bet > 50)
{
  $mon = 0;
  $bet=1;
}

if ($lines < 0 OR $lines > 9)
{
  $mon = 0;
  $lines =1;
}

if ($line < 0 OR $line > 9)
{
  $mon = 0;
  $line =1;
}




  $date = date ('d.m.y');
  $time = date ('H:i:s');
  $allbet = $bet * $lines;
 if ( $mon == 1 || $mon == "" )
  {

    echo '&cash=' . $user_balance;
  }

  if ($mon == 2)
  {





    $win1 = 0;
    $win2 = 0;
    $win3 = 0;
    $win4 = 0;
    $win5 = 0;
    $win6 = 0;
    $win7 = 0;
    $win8 = 0;
    $win9 = 0;
    $winall = 0;
    $bank = $allbet;
    mysql_query ('update users set cash=cash-\'' . $allbet . '\' where login=\'' . $l . '\'');

    



   mysql_query ('update game_bank set bank=bank+\'' . $bank . '\' where name=\'ttuz\'');



    $psym[1] = array (0, 0, 0, 0, 0, 0);
    $psym[2] = array (0, 0, 0, 0, 0, 0);
    $psym[3] = array (0, 0, 0, 7, 70, 700);
    $psym[4] = array (0, 0, 0, 6, 60, 600);
    $psym[5] = array (0, 0, 0, 5, 50, 500);
    $psym[6] = array (0, 0, 0, 3, 30, 300);
    $psym[7] = array (0, 0, 0, 2, 20, 200);
    $psym[8] = array (0, 0, 0, 5, 50, 100);
    $psym[9] = array (0, 0, 0, 4, 10, 100);
    $psym[10] = array (0, 0, 2, 3, 10, 50);
    $psym[11] = array (0, 0, 1, 3, 10, 50);
    $m_line = array (5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 10, 11, 12, 13, 14, 0, 6, 12, 8, 4, 10, 6, 2, 8, 14, 5, 1, 2, 3, 9, 5, 11, 12, 13, 9, 0, 1, 7, 13, 14, 10, 11, 7, 3, 4);
    $mx2 = array (3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 8, 8, 8, 8, 8, 9, 9, 9, 9, 9, 10, 10, 10, 10, 10, 11, 11, 11, 11);
    $m_wild = array (1, 2, 3, 6, 7, 8, 11, 12, 13);

    $km2 = 0;
    for ($m_ln = 0; $m_ln <= 8; ++$m_ln)
    {
      for ($km = 0; $km <= 4; ++$km)
      {
        $lin[$m_ln][$km] = $m_line[$km2];
        ++$km2;
      }
    }

    $rnd_result = rand (1, 1);
    if ($rnd_result == 1)
    {
      $mas_win = 1;
    }
    else
    {
      $mas_win = 0;
    }

    $casbank = winlimit ();
    $am = 0;


//////////////////////////////////////////////////




//////////////////////////////////////////////

    srand ((double)microtime () * 1000000);

      if ($lines == 1 or $lines == 3)
      {
   
 
  $flag = rand (1, rand (4, 5));  

      }

   

      if ($lines == 5 or $lines == 7 or $lines == 9 )
      {
     
  $flag = rand (1, rand (2, rand (3, 4)));  

 
      }




////////////////////////////////////////////////



    while ($am < 10000)
    {
      srand ((double)microtime () * 1000000);
      shuffle ($mx2);
      for ($k = 0; $k <= 14; ++$k)
      {
        $map[$k] = $mx2[$k];
      }

      for ($k = 1; $k <= 9; ++$k)
      {

// $rnd_wild = rand (1, 30);
       
 $rnd_wild = rand (1, rand (4, 6));  
        if ($rnd_wild == 1)
        {
          shuffle ($m_wild);
          $map[$m_wild[1]] = 2;
          continue;
        }
      }

      for ($ln = 0; $ln <= 8; ++$ln)
      {
        $s1 = $map[$lin[$ln][0]];
        $s2 = $map[$lin[$ln][1]];
        if ($s2 == 2)
        {
          $s2 = $s1;
        }

        $s3 = $map[$lin[$ln][2]];
        if ($s3 == 2)
        {
          $s3 = $s2;
        }

        $s4 = $map[$lin[$ln][3]];
        if ($s4 == 2)
        {
          $s4 = $s3;
        }

        $s5 = $map[$lin[$ln][4]];
        if ($s1 == $s2)
        {
          $map_win[$ln] = $psym[$s1][2];
        }

        if ($s1 == $s2)
        {
          if ($s2 == $s3)
          {
            $map_win[$ln] = $psym[$s1][3];
          }
        }

        if ($s1 == $s2)
        {
          if ($s2 == $s3)
          {
            if ($s3 == $s4)
            {
              $map_win[$ln] = $psym[$s1][4];
            }
          }
        }

        if ($s1 == $s2)
        {
          if ($s2 == $s3)
          {
            if ($s3 == $s4)
            {
              if ($s4 == $s5)
              {
                $map_win[$ln] = $psym[$s1][5];
                continue;
              }

              continue;
            }

            continue;
          }

          continue;
        }
      }

      for ($k = 1; $k <= 15; ++$k)
      {
        ${'sym' . $k} = $map[$k - 1];
      }

      for ($k = 1; $k <= 9; ++$k)
      {
        ${'win' . $k} = $bet * $map_win[$k - 1];
      }

      if ($lines == 1)
      {
        $win2 = 0;
        $win3 = 0;
        $win4 = 0;
        $win5 = 0;
        $win6 = 0;
        $win7 = 0;
        $win8 = 0;
        $win9 = 0;
      }

      if ($lines == 2)
      {
        $win3 = 0;
        $win4 = 0;
        $win5 = 0;
        $win6 = 0;
        $win7 = 0;
        $win8 = 0;
        $win9 = 0;
      }

      if ($lines == 3)
      {
        $win4 = 0;
        $win5 = 0;
        $win6 = 0;
        $win7 = 0;
        $win8 = 0;
        $win9 = 0;
      }

      if ($lines == 4)
      {
        $win5 = 0;
        $win6 = 0;
        $win7 = 0;
        $win8 = 0;
        $win9 = 0;
      }

      if ($lines == 5)
      {
        $win6 = 0;
        $win7 = 0;
        $win8 = 0;
        $win9 = 0;
      }

      if ($lines == 6)
      {
        $win7 = 0;
        $win8 = 0;
        $win9 = 0;
      }

      if ($lines == 7)
      {
        $win8 = 0;
        $win9 = 0;
      }

      if ($lines == 8)
      {
        $win9 = 0;
      }

      $winall = $win1 + $win2 + $win3 + $win4 + $win5 + $win6 + $win7 + $win8 + $win9;
      ++$am;
      if ($casbank <= $winall)
      {
        $mas_win = 0;
        $flag =0;      // моё  
        $am = 10;
      }

      if ($mas_win == 1)
      {
        if (0 < $winall)
        {
          $am = 12000;
        }
      }

      if ($mas_win == 1)
      {
        if ($winall == 0)
        {
          $am = 12000;
        }
      }

      if ($mas_win == 0)
      {
        if ($winall == 0)
        {
          $am = 12000;
          continue;
        }

        continue;
      }

   


if ($flag ==1 AND $winall == 0) { $am = 10;  } 
    





   }


$casalwwin=false;//////////////////////////////////
srand ((double)microtime () * 1000000);///////////
$rnd=rand(1,10);/////////////////////////////////
if($rnd<=$prLosePlayer){$casalwwin=true;}///////

    if (0 < $winall && $casalwwin==false)
    {
      $winall = sprintf ('%01.2f', $winall);
      mysql_query ('update users set cash=cash+\'' . $winall . '\' where login=\'' . $l . '\'');
     


    mysql_query ('update game_bank set bank=bank-\'' . $winall . '\' where name=\'ttuz\'');











    }

    $row = mysql_fetch_array (mysql_query ('select * from users where login=\'' . $l . '\''));
    $user_balance = $row[3];
    $winall = sprintf ('%01.2f', $winall);
    


if($casalwwin==true){
$winall=0;
mysql_query ('INSERT INTO stat_game VALUES(\'NULL\',\'' . $date . '\',\'' . $time . '\',\'' . $l . '\',\'' . $user_balance . '\',\'' . $allbet . '\',\'' . $winall . '\',\'Crazy Chameleons\')');

    echo CasAlwaysWin();
}
  
if($casalwwin==false){

mysql_query ('INSERT INTO stat_game VALUES(\'NULL\',\'' . $date . '\',\'' . $time . '\',\'' . $l . '\',\'' . $user_balance . '\',\'' . $allbet . '\',\'' . $winall . '\',\'Crazy Chameleons\')');


    echo '&dig1=' . $sym1 . '&dig2=' . $sym2 . '&dig3=' . $sym3 . '&dig4=' . $sym4 . '&dig5=' . $sym5 . '&dig6=' . $sym6 . '&dig7=' . $sym7 . '&dig8=' . $sym8 . '&dig9=' . $sym9 . '&dig10=' . $sym10 . '&dig11=' . $sym11 . '&dig12=' . $sym12 . '&dig13=' . $sym13 . '&dig14=' . $sym14 . '&dig15=' . $sym15 . '&';
    echo '&win1=' . $win1 . '&win2=' . $win2 . '&win3=' . $win3 . '&win4=' . $win4 . '&win5=' . $win5 . '&win6=' . $win6 . '&win7=' . $win7 . '&win8=' . $win8 . '&win9=' . $win9 . '&';
    echo '&win=' . $winall;
}

echo '&cash=' . $user_balance;
}

?>
