<?php
// PHP7/HTML5, EDGE/CHROME                       *** SignaPhotoPortrait.php ***

// ****************************************************************************
// * SignaPhoto            Подготовка страницы сайтостраницы для подписывания *
// *                          фотографий на смартфоне в портретной ориентации *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.06.2021
// Copyright © 2021 tve                              Посл.изменение: 10.06.2021

// Инициируем рабочее пространство страницы
require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteRoot   = $_WORKSPACE[wsSiteRoot];    // Корневой каталог сайта
$SiteAbove  = $_WORKSPACE[wsSiteAbove];   // Надсайтовый каталог
$SiteHost   = $_WORKSPACE[wsSiteHost];    // Каталог хостинга
$SiteDevice = $_WORKSPACE[wsSiteDevice];  // 'Computer' | 'Mobile' | 'Tablet'
// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteHost."/TDoorTryer/DoorTryerPage.php";
try 
{
   // Подключаем файлы библиотеки прикладных модулей:
   $TPhpPrown=$SiteHost.'/TPhpPrown';
   require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
   require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";
   // Подключаем файлы библиотеки прикладных классов:
   $TPhpTools=$SiteHost.'/TPhpTools';
   //require_once $TPhpTools."/TPhpTools/iniErrMessage.php";
   
   $c_FileImg=prown\MakeCookie('FileImg','images/iphoto.jpg',tStr,true);
   $c_FileStamp=prown\MakeCookie('FileStamp','images/istamp.png',tStr,true);

   // Подключаем модули страницы "Подписать фотографию"
   require_once 'SignaPhotoHtml.php';
   // Готовим начало страницы для подписывания фотографий
   IniPage($c_SignaPhoto,$UrlHome);
   echo '<link rel="stylesheet" type="text/css" href="SignaPhoto_m.css">';
   echo '<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">';
   // Включаем набор meta-тегов для сайтов с адаптивным дизайном:
   // константой device-width задаёт ширину страницы в соответствии с размером 
   // экрана и определяем неизменный начальный масштаб страницы;
   // указываем, что страница оптимизирована под мобильные устройства на Palm 
   // и Blackberry, в таком браузере как AvantGo и других;
   // для мобильных браузеров IE Mobile или Pocket IE определяем ширина страницы
   // в соответствии с размером экрана, аналог device-width; 
   // позволяем работать в полноэкранном режиме на мобильных устройствах Apple.
   echo "
      <meta name='viewport' content='width=device-width,initial-scale=1'/> 
      <meta content='true' name='HandheldFriendly'/>
      <meta content='width' name='MobileOptimized'/>
      <meta content='yes' name='apple-mobile-web-app-capable'/>
   ";
   // Подключаем jquery/jquery-ui
   echo '
      <link rel="stylesheet" href="/Jsx/jquery-ui.min.css"/> 
      <script src="/Jsx/jquery-1.11.1.min.js"></script>
      <script src="/Jsx/jquery-ui.min.js"></script>
   ';
   echo '
      <link rel="stylesheet" href="/Jsx/jquery.mobile-1.4.5.min.css" />
      <script src="/Jsx/jquery.mobile-1.4.5.min.js"></script> 
      <script src="/Jsx/TJsPrown.js"></script>
   ';
   // Формируем тексты запросов для вызова страниц (с помощью JS) с портретной 
   // ориентацией и ландшафтной. Так как страница "Подписать фотографию" 
   // использует две разметки: для страницы на компьютере и ландшафтной странице
   // на смартфоне - простая разметка на дивах; а для портретной страницы на 
   // смартфоне с помощью jquery mobile 
   MakeTextPages();
   // Подключаем скрипты по завершению загрузки страницы
   echo '<script>$(document).ready(function() {';
   echo '
      ApartButtons();
   ';
   
   
   echo '});</script>';
   echo '</head>';
   echo '<body>';
   
   markupMobileSite($c_SignaPhoto,$UrlHome,$SiteRoot,$c_FileImg,$c_FileStamp);

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
