<?php
// PHP7/HTML5, EDGE/CHROME                               *** SignaPhoto.php ***

// ****************************************************************************
// * SignaPhoto                                              Главный модуль - *
// *                                сайтостраница для подписывания фотографий *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  01.06.2021
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
   HtmlBegin();
   echo '<link rel="stylesheet" type="text/css" href="SignaPhoto.css">';

   // Как можно раньше (до полной загрузки страницы) определяем
   // ориентацию смартфона и формируем URL:
   // $SignaPortraitUrl, $SignaUrl
   ?>
      <script>
      // Определяем защишенность сайта, для того чтобы правильно сформулировать 
      // в запросе http или https
      $https='<?php echo $_SERVER["HTTPS"];?>';
      if ($https=="off") $https="http"
      else $https="https"; 
      console.log($https);
      // Готовим URL для мобильно-портретной разметки, то есть разметки
      // для jQuery-мobile c двумя страницами 
      $SignaPortraitUrl=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphotoportrait";
      console.log($SignaPortraitUrl);
      // Готовим URL для настольно-ландшафтной разметки (одностраничной)
      $SignaUrl=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphoto";
      console.log($SignaUrl);
      
      if ((window.orientation==0)||(window.orientation==180)) window.location = $SignaPortraitUrl;
      //alert(window.orientation);
      //doOnOrientationChange();
      
      $SiteDevice='<?php echo $SiteDevice; ?>';
      //alert($SiteDevice);
      
      </script>
   <?php

   echo '</head>';
   echo '<body>';
   
   echo $c_SignaPhoto; echo ': LANDSCAPE<br>';
   
   // Подключаем скрипты по завершению загрузки страницы
   echo '<script>$(document).ready(function() {';
   //echo 'alert("SignaPhoto");';
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
// *** <!-- --> ******************************************** SignaPhoto.php ***
