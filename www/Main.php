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

// Подключаем модули обеспечения обработки ошибок
require_once $SiteHost."/TPhpPrown/MakeRegExp.php";
require_once "TDoorTryer/DoorTryerClass.php";
require_once "TDoorTryer/DoorTryerPage.php";
require_once "PHP/Exceptionizer.php";

//$w2e = new PHP_Exceptionizer(E_ALL);
$w2e = new DoorTryer(E_ALL);
try 
{

   //echo '<script>';
   //echo 'document.location.assign("'.'http://ittve.me'.'")';
   
   //echo 'window.location.assign("'.'http://ittve.me'.'")';
   
   
   //echo 'document.location.replace("'.$uripage.'")';
   //echo 'document.location.assign("'.$uripage.'")';
   //echo '</script>';
   
   //MainBody();
   //echo 'Привет!<br>';
   //include 'includErrs.php'; 
   //echo '<br>Hi!';
   
   
   
   require_once "iHtmlBegin.php";
   require_once "includErrs.php";
   require_once "Site.php";
   require_once "iHtmlEnd.php";
}

/*
catch (E_EXCEPTION $e) 
{
   echo '<pre>';
   echo "{$e->getMessage()}";
   echo $e->getTraceAsString();
   echo '</pre>';
   
   // При необходимости выводим дополнительную информацию
   // Header("Content-type: text/plain");
   // $headers = getallheaders();
   // print_r($headers);
   // print_r($_SERVER);
}
*/
 
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
