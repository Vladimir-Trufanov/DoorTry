<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// *      DOORTRY - сайт сбора ошибок и формирования страницы с ошибками      *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 03.05.2019

$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
require_once $SiteRoot."/includErrs.php";
echo '<br>Exit programm!<br>';



/*
require_once $SiteRoot."/TDoorTryer/DoorTryerClass.php";
$w2e = new DoorTryer(E_ALL);
if (isPhp7())
{
   try 
   {
      require_once $SiteRoot."/Main.php";
   }
   catch (E_EXCEPTION $e) 
   {
      //echo  "<pre><b>ex Перехвачена ошибка!</b><br>".$e."</pre>";
      DoorTryPage($e);
   }
   catch (Error $e) 
   {
      //echo  "<pre><b>er Перехвачена ошибка!</b><br>".$e."</pre>";
      DoorTryPage($e);
   }
}
else
{
   echo 'PHP5';
}
unset($w2e);
*/