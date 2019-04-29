<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// *      DOORTRY - сайт сбора ошибок и формирования страницы с ошибками      *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 21.04.2019

// "фрагмент с типом ошибки с начала строки до ":"
define ("regErrorType",   "/^[A-Za-z_]{1,}:/u");

// Инициализируем корневой каталог сайта, надсайтовый каталог, каталог хостинга
require_once "iGetAbove.php";
$SiteRoot = $_SERVER['DOCUMENT_ROOT'];  // Корневой каталог сайта
$SiteAbove = iGetAbove($SiteRoot);      // Надсайтовый каталог
$SiteHost = iGetAbove($SiteAbove);      // Каталог хостинга

//require_once $SiteHost."/TPhpPrown/MakeRegExp.php";

// Подключаем модули и обеспечиваем обработку ошибок
require_once "TDoorTryer/DoorTryerClass.php";
$w2e = new DoorTryer(E_ALL);
try 
{
   require_once "iHtmlBegin.php";
   require_once "includErrs.php";
   require_once "Site.php";
   require_once "iHtmlEnd.php";
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
unset($w2e);
// *************************************************************** Main.php ***
