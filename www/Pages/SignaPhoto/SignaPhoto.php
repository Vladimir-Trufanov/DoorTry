<?php
// PHP7/HTML5, EDGE/CHROME                               *** SignaPhoto.php ***

// ****************************************************************************
// * SignaPhoto                                              Главный модуль - *
// *                                сайтостраница для подписывания фотографий *
// ****************************************************************************

// v3.1, 05.08.2021                                   Автор:      Tруфанов В.Е. 
// Copyright © 2021 tve                               Дата создания: 13.06.2021

// Инициируем рабочее пространство страницы
require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteRoot     = $_WORKSPACE[wsSiteRoot];     // Корневой каталог сайта
$SiteAbove    = $_WORKSPACE[wsSiteAbove];    // Надсайтовый каталог
$SiteHost     = $_WORKSPACE[wsSiteHost];     // Каталог хостинга
$SiteDevice   = $_WORKSPACE[wsSiteDevice];   // 'Computer'|'Mobile'|'Tablet'
$SiteProtocol = $_WORKSPACE[wsSiteProtocol]; // 'HTTP'|'HTTPS'
// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteHost."/TDoorTryer/DoorTryerPage.php";
try 
{

   // Подключаем файлы библиотеки прикладных модулей:
   $TPhpPrown=$SiteHost.'/TPhpPrown';
   require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
   require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
   require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";
   // Подключаем файлы библиотеки прикладных классов:
   $TPhpTools=$SiteHost.'/TPhpTools';
   //require_once $TPhpTools."/TPhpTools/iniErrMessage.php";
   // Подключаем модули страницы "Подписать фотографию"
   require_once 'SignaPhotoHtml.php';
   
   // Готовим начало страницы для подписывания фотографий
   IniPage($c_SignaPhoto,$UrlHome,$c_FileImg,$c_FileStamp,$c_FileProba);
   echo '<body>';
  
   echo '<div id="main">';
      echo '
      <nav class="navigation-menu js-nav-menu">
      <div class="navigation-menu__toggle js-nav-menu-toggle">
         <span class="navigation-menu__bars"></span>
      </div>
      <ul class="menu-list">
         <li class="menu-list__item" onclick="clickLoadPic()">Загрузить фотографию</li>
         <li class="menu-list__item" onclick="clickMakeStamp()">Наложить подпись на изображение</li>
         <li class="menu-list__item">Переопределить параметры</li>
         <li class="menu-list__item">Загрузить новую подпись</li>
      </ul>
      </nav>
      <script src="/Jsx/index.js"></script>
      ';
      echo '
         <div  id="InfoLead">
            1234567890 First  <br>
            1234567890 Second <br>
            1234567890 Third  <br>
         </div>
      ';
      echo '
         <div id="Stamp">
         <img id="stamp" src="'.$c_FileStamp.'" alt="Изображение подписи">
         </div>
      ';
      echo '
         <div id="Photo">
         <img id="pic" src="'.$c_FileImg.'" alt="Фотография без подписи">
         </div>
      ';
      echo '
         <div id="Proba">
         <img id="proba" src="'.$c_FileProba.'" alt="Подписанная фотография">
         </div>
      ';
   echo '</div>'; 
   echo '<div id="ViewGlobal">';
   prown\ViewGlobal(avgCOOKIE);
   //prown\ViewGlobal(avgSERVER);
   //prown\ViewGlobal(avgREQUEST);
   echo '</div>'; 
   
   echo '</body>';
   echo '</html>';
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// *** <!-- --> ******************************************** SignaPhoto.php ***
