<?php
// PHP7/HTML5, EDGE/CHROME                                   *** SchPos.php ***

// ****************************************************************************
// *                         Отладка счетчика посещаемости                    *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.10.2019
// Copyright © 2019 tve                              Посл.изменение: 09.10.2019

//echo 'Счетчик посещаемости<br>';

function SessStart($NamePage)
{
session_start();
if (!isset($_SESSION[$NamePage]))
{



   $agent = $_SERVER['HTTP_USER_AGENT'];
   $uri = $_SERVER['REQUEST_URI'];
   //$useri = 'PHP_AUTH_USER';
   $ip = $_SERVER['REMOTE_ADDR'];
   //$ref = '123'; //$_SERVER['HTTP_REFERER'];
   $dtime = date('r');
   $entry_line = 
      '***'.$NamePage.'***'.
      "$dtime ".
      "IP: $ip ".
      "Agent: $agent ".
      "URL: $uri \r\n";



/*

   if($ref == "")
   {
      $ref = "None";
   }
   if($useri == "")
   {
      $useri = "None";
   }

   $entry_line = "$dtime - IP: $ip | Agent: $agent | URL: $uri | Referrer: $ref | Username: $useri n";
   
*/   
   
   $fp = fopen("logis.txt", "a+");
   if (flock($fp, LOCK_EX)) 
   { // выполнить эксплюзивное запирание
      fputs($fp, $entry_line);
      flock($fp, LOCK_UN); // отпираем файл
      fclose($fp);
      $_SESSION[$NamePage]='yes';
   } 
   else 
   {
      echo "Не могу запереть файл! [".$NamePage.']';
   }



}


   $agent = $_SERVER['HTTP_USER_AGENT'];
   $uri = $_SERVER['REQUEST_URI'];
   //$useri = 'PHP_AUTH_USER';
   $ip = $_SERVER['REMOTE_ADDR'];
   //$ref = '123'; //$_SERVER['HTTP_REFERER'];
   $dtime = date('r');
   $entry_line = 
      '==='.$NamePage.'==='.
      "$dtime ".
      "IP: $ip ".
      "Agent: $agent ".
      "URL: $uri \r\n";

   
   $fp = fopen("logis.txt", "a+");
   if (flock($fp, LOCK_EX)) 
   { // выполнить эксплюзивное запирание
      fputs($fp, $entry_line);
      flock($fp, LOCK_UN); // отпираем файл
      fclose($fp);
   } 
   else 
   {
      echo "Не могу запереть файл! [".$NamePage.']';
   }

}

/*

   
   //----
   $f=fopen("stat.dat","a+");
   flock($f,LOCK_EX);
   $count=fread($f,100);
   @$count++;
   ftruncate($f,0);
   fwrite($f,$count);
   fflush($f);
   flock($f,LOCK_UN);
   fclose($f);
*/
// ************************************************************* SchPos.php ***
