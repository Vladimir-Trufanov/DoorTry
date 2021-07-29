<?php
// Проба GIT 28.07.2021 13:06
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
$SiteRoot     = $_WORKSPACE[wsSiteRoot];     // Корневой каталог сайта
$SiteAbove    = $_WORKSPACE[wsSiteAbove];    // Надсайтовый каталог
$SiteHost     = $_WORKSPACE[wsSiteHost];     // Каталог хостинга
$SiteDevice   = $_WORKSPACE[wsSiteDevice];   // 'Computer' | 'Mobile' | 'Tablet'
$SiteProtocol = $_WORKSPACE[wsSiteProtocol]; // 'HTTP' | 'HTTPS'
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

   echo '</head>';
   echo '<body>';
   // ----Создаем div с идентификатом main для того, чтобы по идентификатору 
   // -----дожидаться полной загрузки изображения перед разворачиванием страницы
   echo '<div id="main">';
   
   // echo 'Привет!<br>';
   // echo '<li><a href="index.php?list=signaphoto">Подписать фотографию</a></li>';
   // <li class="menu-list__item">Загрузить фотографию</li>
   //         <a href="index.php?list=signaphoto&img=loadpic">Загрузить фотографию</a>
   // http://localhost:82/Pages/SignaPhoto/SignaPhoto.php?il=ili
   //         <a href="index.php?list=signaphoto&img=loadpic">Загрузить фотографию</a>
   //         <a href="http://localhost:82/Pages/SignaPhoto/SignaPhoto.php?img=loadpic" 
   //         $SiteProtocol.'://'.$_SERVER['HTTP_HOST'].'/Pages/SignaPhoto/SignaPhoto.php?img=loadpic"'. 
   //         'target="_parent">Загрузить фотографию</a>
   echo '
      <nav class="navigation-menu js-nav-menu">
      <div class="navigation-menu__toggle js-nav-menu-toggle">
         <span class="navigation-menu__bars"></span>
      </div>
      <ul class="menu-list">
         
         <li class="menu-list__item" onclick="FindFileImg()">
            <a href="'.
            $SiteProtocol.'://'.$_SERVER['HTTP_HOST'].'/Pages/SignaPhoto/SignaPhoto.php?img=loadpic"'. 
            '>Загрузить фотографию</a>
         </li>
         
         
         <li class="menu-list__item">Menu Item 2</li>
         <li class="menu-list__item">Menu Item 3</li>
         <li class="menu-list__item">Menu Item 4</li>
         <li class="menu-list__item">Menu Item 5</li>
      </ul>
      </nav>
      <script src="/Jsx/index.js"></script>
   ';


   
   






   // Размечаем области диалога и изображений
   echo '<div id="All">';
      echo '<div  id="Info">';
         DispatchPhoto();
      echo '</div>';
      echo '<div id="Photo">';
         ViewPhoto($c_FileImg);
      echo '</div>';
      echo '<div  id="Stamp">';
         ViewStamp($c_FileStamp);
      echo '</div>';
   echo '</div>';
   // echo 'Пока!<br>';
   
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
   
   // Заготавливаем скрытый фрэйм для обработки загружаемого изображения 
   // (25.06.2021 убираем из кода для осмысления. Делаем по другому)
   //echo '<iframe id="rFrame" name="rFrame" style="display: none"> </iframe>';

   
   
   echo '</div>'; 

   echo '</body>';
   //prown\ViewGlobal(avgSERVER);
   prown\ViewGlobal(avgCOOKIE);
   //prown\ViewGlobal(avgREQUEST);
   echo '</html>';
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// *** <!-- --> ******************************************** SignaPhoto.php ***
