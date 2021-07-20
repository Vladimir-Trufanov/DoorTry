<?php
// PHP7/HTML5, EDGE/CHROME                               *** SignaPhoto.php ***

// ****************************************************************************
// * SignaPhoto                                              Главный модуль - *
// *                                сайтостраница для подписывания фотографий *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  01.06.2021
// Copyright © 2021 tve                              Посл.изменение: 20.07.2021

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
   //require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";
   // Подключаем файлы библиотеки прикладных классов:
   $TPhpTools=$SiteHost.'/TPhpTools';
   //require_once $TPhpTools."/TPhpTools/iniErrMessage.php";
   // Подключаем модули страницы "Подписать фотографию"
   require_once 'SignaPhotoHtml.php';
    
   // Готовим начало страницы для подписывания фотографий
   IniPage($c_SignaPhoto,$UrlHome,$c_FileImg,$c_FileStamp,$c_FileProba);
   echo '<link rel="stylesheet" type="text/css" href="SignaPhoto.css">';
   echo '<script src="SignaPhoto.js"></script>';

   // Подключаем скрипты по завершению загрузки страницы
   echo '<script>$(document).ready(function() {';
   //echo 'alert("SignaPhoto");';
   echo '});</script>';


   echo '</head>';
   echo '<body>';
   
   //echo 'Привет!<br>';
   echo '
      <nav class="navigation-menu js-nav-menu">
      <div class="navigation-menu__toggle js-nav-menu-toggle">
         <span class="navigation-menu__bars"></span>
      </div>
      <ul class="menu-list">
         <li class="menu-list__item">Menu Item 1</li>
         <li class="menu-list__item">Menu Item 2</li>
         <li class="menu-list__item">Menu Item 3</li>
         <li class="menu-list__item">Menu Item 4</li>
         <li class="menu-list__item">Menu Item 5</li>
      </ul>
      </nav>
      <script src="/Jsx/index.js"></script>
   ';
   //echo 'Пока!<br>';
   
   /*
   // Размечаем область изображений
   echo '<div id="All">';
      // Размечаем область оригинального изображения и образца подписи
      echo '<div  id="View">';
      echo '<div  id="Photo">';
      ViewPhoto($c_FileImg);
      echo '</div>';
      echo '<div  id="Stamp">';
      ViewStamp($c_FileStamp);
      echo '</div>';
      echo '</div>';
      // Размечаем область изображения с подписью
      echo '<div  id="Proba">';
      ViewProba($c_FileProba);
      //prown\ViewGlobal(avgCOOKIE);
      echo '</div>';
   echo '</div>';
   */
   // Размечаем область управления загрузкой и подписанием
   /*
   echo '<div  id="Lead">';
   LoadImg();
   LoadStamp();
   Subscribe();
   Tunein();
   echo '</div>';
   */
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
