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
require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
// Подключаем файлы библиотеки прикладных классов:
//$TPhpTools=$SiteHost.'/TPhpTools';
//require_once $TPhpTools."/TPhpTools/iniErrMessage.php";
// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteHost."/TDoorTryer/DoorTryerPage.php";
try 
{
   $c_SignaPhoto=prown\MakeCookie('SignaPhoto',0,tInt,true);   // число запросов страницы
   $c_SignaPhoto=prown\MakeCookie('SignaPhoto',$c_SignaPhoto+1,tInt);  

   require_once 'SignaPhotoHtml.php';
   
   // Готовим начало страницы для подписывания фотографий
   HtmlBegin();
   echo '<link rel="stylesheet" type="text/css" href="SignaPhoto.css">';
   // Формируем тексты запросов для вызова страниц (с помощью JS) с портретной 
   // ориентацией и ландшафтной. Так как страница "Подписать фотографию" 
   // использует две разметки: для страницы на компьютере и ландшафтной странице
   // на смартфоне - простая разметка на дивах; а для портретной страницы на 
   // смартфоне с помощью jquery mobile 
   MakeTextPages();

   echo '</head>';
   echo '<body>';
   
   echo $c_SignaPhoto; echo ': PORTRAIT<br>';
   
   // Подключаем скрипты по завершению загрузки страницы
   echo '<script>$(document).ready(function() {';
   //echo 'alert("SignaPhotoPortrait");';
   echo '});</script>';

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
