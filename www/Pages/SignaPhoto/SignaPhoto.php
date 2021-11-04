<?php
// PHP7/HTML5, EDGE/CHROME                               *** SignaPhoto.php ***

// ****************************************************************************
// * SignaPhoto                                              Главный модуль - *
// *                                сайтостраница для подписывания фотографий *
// ****************************************************************************

// v4.0, 04.11.2021                                   Автор:      Tруфанов В.Е. 
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
   
   //
   ?> 
   <style type="text/css">
    a {
      text-decoration: none; /*убираем подчеркивание текста ссылок*/
      background:#30A8E6; /*добавляем фон к пункту меню*/
      color:#fff; /*меняем цвет ссылок*/
      padding:10px; /*добавляем отступ*/
      font-family: arial; /*меняем шрифт*/
      border-radius:4px; /*добавляем скругление*/
      -moz-transition: all 0.3s 0.01s ease; /*делаем плавный переход*/
      -o-transition: all 0.3s 0.01s ease;
      -webkit-transition: all 0.3s 0.01s ease;
    }
    a:hover {
      background:#1C85BB;/*добавляем эффект при наведении*/
    }
    li {
      float:left; /*Размещаем список горизонтально для реализации меню*/
      margin-right:5px; /*Добавляем отступ у пунктов меню*/
      
    } 
    
    
    
   </style>

   
   <ul>
      <li><a href="acsLoadStamp.php">Загрузить и подписать</a></li>
      <li><a href="acsToСonfigure.php">Настроить</a></li>
   </ul>

   <?php
   //
   echo '
     <div  id="InfoLead">
     <form enctype="multipart/form-data" action="SignaPhotoUpload.php" method="POST">
     <input type="hidden" name="MAX_FILE_SIZE" value="2400000" />
     <input name="userfile" type="file" />
     <input type="submit" value="Отправить файл" />
     </form>
     </div>
   ';
   
   echo '<div id="ViewGlobal">';
   // prown\ViewGlobal(avgCOOKIE);
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
?> <?php // *** <!-- --> *** ******************************* SignaPhoto.php ***
