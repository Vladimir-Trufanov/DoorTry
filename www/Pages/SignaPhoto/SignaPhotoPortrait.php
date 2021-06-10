<?php
// PHP7/HTML5, EDGE/CHROME                       *** SignaPhotoPortrait.php ***

// ****************************************************************************
// * SignaPhoto            Подготовка страницы сайтостраницы для подписывания *
// *                          фотографий на смартфоне в портретной ориентации *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.06.2021
// Copyright © 2021 tve                              Посл.изменение: 10.06.2021

require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteRoot   = $_WORKSPACE[wsSiteRoot];    // Корневой каталог сайта
$SiteAbove  = $_WORKSPACE[wsSiteAbove];   // Надсайтовый каталог
$SiteHost   = $_WORKSPACE[wsSiteHost];    // Каталог хостинга
$SiteDevice = $_WORKSPACE[wsSiteDevice];  // 'Computer' | 'Mobile' | 'Tablet'
// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
//require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
// Подключаем файлы библиотеки прикладных классов:
//$TPhpTools=$SiteHost.'/TPhpTools';
//require_once $TPhpTools."/TPhpTools/iniErrMessage.php";
// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteHost."/TDoorTryer/DoorTryerPage.php";
try 
{
   require_once 'SignaPhotoHtml.php';
   HtmlBegin();
   echo '<link rel="stylesheet" type="text/css" href="SignaPhoto_m.css">';

   echo '</head>';
   echo '<body>';
   echo 'Мобильнай и портретный';
   /*
   echo '***<br>';
   echo 'Всем привет!<br>';
   echo '<pre>';
   print_r(gd_info());
   echo '</pre>';
   echo '***<br>';
   */
   echo '</body>';
   echo '</html>';
   //prown\ViewGlobal(avgSERVER);
   //prown\ViewGlobal(avgCOOKIE);
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// *** <!-- --> ************************************ SignaPhotoPortrait.php ***
