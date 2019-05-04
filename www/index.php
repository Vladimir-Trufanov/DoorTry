<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// *      DOORTRY - сайт сбора ошибок и формирования страницы с ошибками      *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 03.05.2019

$SiteRoot=$_SERVER['DOCUMENT_ROOT'];

$TypeExp='ConfigFileNotFoundException';
class ConfigFileNotFoundException extends Exception {}
function testFile($FileName)
{
   global $TypeExp;
   if (!file_exists($FileName))
   {
      //throw new ConfigFileNotFoundException("oiConfiguration file not found.");
      throw new $TypeExp("oiConfiguration file not found.");
   }
}



require_once $SiteRoot."/dt.php";
ddt();
// init bootstrapping phase
try 
{
   require_once $SiteRoot."/Main.php";
}
// continue execution of the bootstrapping phase
catch (ConfigFileNotFoundExceptioni $e) 
{
   echo  "<pre><b>CC Перехвачена ошибка!</b><br>".$e."</pre>";
   //DoorTryPage($e);
} 
// other additional actions that you want to carry out for this exception
/*
catch (Error $e) 
{
   echo  "<pre><b>ER Перехвачена ошибка!</b><br>".$e."</pre>";
   //DoorTryPage($e);
}
*/
catch (Exception $e) 
{
   echo  "<pre><b>EE Перехвачена ошибка!</b><br>".$e."</pre>";
   //DoorTryPage($e);
}





/*
require_once $SiteRoot."/includErrs.php";
echo '<br>Exit programm!<br>';
*/


//require_once $SiteRoot."/dt.php";
//require_once $SiteRoot."/TDoorTryer/DoorTryerClass.php";
//$w2e = new DoorTryer(E_ALL);




/*
class ConfigFileNotFoundException extends Exception {}

ddt();
if (isPhp7())
{
   try {require_once $SiteRoot."/Main.php";}
   catch (ConfigFileNotFoundException $e) 
   {
      echo  "<pre><b>cc Перехвачена ошибка!</b><br>".$e."</pre>";
      //DoorTryPage($e);
   }
   catch (Exception $e) 
   {
      echo  "<pre><b>ee Перехвачена ошибка!</b><br>".$e."</pre>";
      //DoorTryPage($e);
   }
   catch (E_EXCEPTION $e) 
   {
      echo  "<pre><b>ex Перехвачена ошибка!</b><br>".$e."</pre>";
      //DoorTryPage($e);
   }
   catch (Error $e) 
   {
      echo  "<pre><b>er Перехвачена ошибка!</b><br>".$e."</pre>";
      //DoorTryPage($e);
   }
}
else
{
   echo 'PHP5';
   //try {require_once $SiteRoot."/Main.php";}
   //catch (Exeption $e) 
   //{
      //echo  "<pre><b>ee Перехвачена ошибка!</b><br>".$e."</pre>";
      //DoorTryPage($e);
   //}
}
*/
//unset($w2e);
