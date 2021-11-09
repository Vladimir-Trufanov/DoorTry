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
   </style>
   <!-- 
   <ul>
      <li><a href="acsLoadStamp.php">Загрузить и подписать</a></li>
      <li><a href="acsToСonfigure.php">Настроить</a></li>
   </ul>
   -->
   <?php
   // Выводим див управления и сообщений
   echo '
      <div id="InfoLead">
         <div id="LoadStamp" class="BtnLeft">
            <form class="LoadForm" enctype="multipart/form-data" action="frmPhotoUpload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="2400000" />
            <!-- <label id="labeli" for="InputFile" >Выбрать файл</label> -->
            <input id="InputFile" class="InputAll" name="userfile" type="file" />
            <input  class="InputAll" type="submit" value="Подпишите файл" />
            <!-- <div>Здесь могло быть имя файла</div> -->
            </form>
         </div>
         <div id="ImgButtons" class="BtnRight" >
            <button>
               <img class="BtnImg" src="Images/LeftRight.png" alt="LeftRight.png" 
               title="По ширине">
            </button>
            <button>
               <img class="BtnImg" src="Images/AsIs.png" alt="AsIs.png" 
               title="Разместить изображение по центру">
            </button>
            <button id="BtnQuant" form="frmQuant" class="InputAll">
            <form class="LoadForm" action="SignaPhoto.php" id="frmQuant">
               <input id="Quant" class="InputAll" type="number" name="quantity" min="10" max="500" step="10" value="50">
               %
            </form>
            </button>
            <button>
               <a href="acsToСonfigure.php">
               <img class="BtnImg" src="Images/UpDown.png" alt="UpDown.png" 
               title="По высоте">
            </button>
         </div>
      </div>
   ';
   // Выводим див с изображением
   echo '
      <div id="Photo">
      <img id="Pic" src="'.$c_FileImg.'" alt="Фотография">
      </div>
   ';
   // Выводим див настройки и статистики
   echo '
      <div id="CtrlStat">
         <div id="Messages">
            CtrlStat'.$c_FileImg.'
         </div>
         <div class="BtnRight"> 
         <button>
            <img class="BtnImg" src="Images/Options.png" alt="LeftRight.png"
            href="acsToСonfigure.php" 
            title="Настроить параметры подписи">
         </button>
         </div>
      </div>
   ';
   
   echo '<div id="ViewGlobal">';
   //prown\ViewGlobal(avgCOOKIE);
   //prown\ViewGlobal(avgSERVER);
   prown\ViewGlobal(avgREQUEST);
   echo '</div>'; 
   echo '</body>';
   echo '</html>';
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
?> <?php // *** <!-- --> *** ******************************* SignaPhoto.php ***
