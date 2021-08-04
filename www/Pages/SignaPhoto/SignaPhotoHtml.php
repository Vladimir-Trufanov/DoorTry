<?php
// PHP7/HTML5, EDGE/CHROME                           *** SignaPhotoHtml.php ***

// ****************************************************************************
// * SignaPhoto                         Вспомогательные функции сайтостраницы *
// *                                              для подписывания фотографий *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.06.2021
// Copyright © 2021 tve                              Посл.изменение: 01.08.2021

// ****************************************************************************
// *                            Начать HTML-страницу сайта                    *
// ****************************************************************************
function IniPage(&$c_SignaPhoto,&$UrlHome,&$c_FileImg,&$c_FileStamp,&$c_FileProba)
{
   $Result=true;
   // Инициируем или изменяем счетчик числа запросов страницы
   $c_SignaPhoto=prown\MakeCookie('SignaPhoto',0,tInt,true);  
   $c_SignaPhoto=prown\MakeCookie('SignaPhoto',$c_SignaPhoto+1,tInt);  
   
   $c_Orient=prown\MakeCookie('Orient','landscape',tStr,true);

   $c_FileImg=prown\MakeCookie('FileImg','images/iphoto.jpg',tStr,true);
   $c_FileStamp=prown\MakeCookie('FileStamp','images/istamp.png',tStr,true);
   $c_FileProba=prown\MakeCookie('FileProba','images/iproba.png',tStr,true);

   // Определяем Url домашней страницы
   $UrlHome='https://doortry.ru';
   if ($_SERVER["SERVER_NAME"]=='kwinflatht.nichost.ru') $UrlHome='http://kwinflatht.nichost.ru';
   
   // Загружаем заголовочную часть страницы
   echo '<!DOCTYPE html>';
   echo '<html lang="ru">';
   echo '<head>';
   echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
   echo '<title>Подписать фотографию</title>';
   echo '<meta name="description" content="Проба Img">';
   echo '<meta name="keywords"    content="Проба Img">';
   // Подключаем межязыковые определения для PHP и JavaScript
   require_once 'SignaPhotoDef.php';
   echo $define;
   // Подключаем jquery/jquery-ui
   echo '
      <link rel="stylesheet" href="/Jsx/jquery-ui.min.css"/> 
      <script src="/Jsx/jquery-1.11.1.min.js"></script>
      <script src="/Jsx/jquery-ui.min.js"></script>
   ';
   //
   echo '<link rel="stylesheet" type="text/css" href="StyleReset.css">';
   echo '<link rel="stylesheet" type="text/css" href="SignaPhoto.css">';
   echo '<link rel="stylesheet" type="text/css" href="SignaMenu.css">';
   echo '<script src="SignaPhoto.js"></script>';
   //echo '<script src="ajaxLead.js"></script>';
   // Подключаем скрипт изменения заголовка "input file"
   echo '<script src="jquery-input-file-text.js"></script>';
   echo '</head>';
   return $Result;
}

// *** <!-- --> **************************************** SignaPhotoHtml.php ***
