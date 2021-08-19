<?php
// PHP7/HTML5, EDGE/CHROME                               *** SignaPhoto.php ***

// ****************************************************************************
// * SignaPhoto                                              Главный модуль - *
// *                                сайтостраница для подписывания фотографий *
// ****************************************************************************

// v3.1, 05.08.2021                                   Автор:      Tруфанов В.Е. 
// Copyright © 2021 tve                               Дата создания: 13.06.2021

function proba()
{
$size = 300;
$image=imagecreatetruecolor($size, $size);

// создадим белый фон с чёрной рамкой
$back = imagecolorallocate($image, 255, 255, 255);
$border = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, $size - 1, $size - 1, $back);
imagerectangle($image, 0, 0, $size - 1, $size - 1, $border);

$yellow_x = 100;
$yellow_y = 75;
$red_x    = 120;
$red_y    = 165;
$blue_x   = 187;
$blue_y   = 125;
$radius   = 150;

// создание цветов с альфа компонентом

$yellow = imagecolorallocatealpha($image, 255, 255, 0, 50);
$red    = imagecolorallocatealpha($image, 255, 0, 0, 50);
$blue   = imagecolorallocatealpha($image, 0, 0, 255, 50);
/*
$yellow = imagecolorallocate($image, 255, 255, 0);
$red    = imagecolorallocate($image, 255, 0, 0);
$blue   = imagecolorallocate($image, 0, 0, 255);
*/
// рисование 3-х пересекающихся окружностей
imagefilledellipse($image, $yellow_x, $yellow_y, $radius, $radius, $yellow);
imagefilledellipse($image, $red_x, $red_y, $radius, $radius, $red);
imagefilledellipse($image, $blue_x, $blue_y, $radius, $radius, $blue);

// не забудьте вывести правильный заголовок!
header('Content-Type: image/png');

// и наконец, вывод
imagepng($image);
imagedestroy($image);

}

function proba1()
{

$photoImage = ImageCreateFromJPEG('photo.jpg');
$logoImage = ImageCreateFromPNG('logo.png');
ImageAlphaBlending($photoImage, true);
$logoW = ImageSX($logoImage);
$logoH = ImageSY($logoImage);
ImageCopy($photoImage, $logoImage, 0, 0, 0, 0, $logoW, $logoH);
header('Content-Type: image/png');
ImageJPEG($photoImage); // output to browser
/*



*/
ImageDestroy($photoImage);
ImageDestroy($logoImage);
//echo('Привет!');
}




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

   //proba();

   
   
   echo '<div id="main">';
      echo '
      <nav class="navigation-menu js-nav-menu">
      <div class="navigation-menu__toggle js-nav-menu-toggle">
         <span class="navigation-menu__bars"></span>
      </div>
      <ul class="menu-list">
         <li class="menu-list__item" onclick="clickLoadPic()">Загрузить фотографию</li>
         <li class="menu-list__item" onclick="clickMakeStamp()">Наложить подпись на изображение</li>
         <li class="menu-list__item">Menu Item 3</li>
         <li class="menu-list__item">Menu Item 4</li>
         <li class="menu-list__item">Menu Item 5</li>
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
         <div id="Photo">
         <img id="pic" src="'.$c_FileImg.'" alt="FileImg">
         </div>
      ';
      echo '
         <div id="Proba">
         <!-- <img id="proba" src="'.$c_FileProba.'" alt="FileProba"> -->
         <img id="proba" src="images/proba1.gif" alt="FileProba">
         </div>
      ';
      echo '
         <div id="Stamp">
         <img id="stamp" src="'.$c_FileStamp.'" alt="FileStamp">
         </div>
      ';
   echo '</div>'; 
   echo '<div id="ViewGlobal">';
   echo 'prown\ViewGlobal(avgCOOKIE)';
   
   //prown\ViewGlobal(avgSERVER);
   //prown\ViewGlobal(avgCOOKIE);
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
