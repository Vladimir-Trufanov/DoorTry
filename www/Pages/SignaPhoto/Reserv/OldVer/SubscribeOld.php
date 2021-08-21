<?php
// PHP7/HTML5, EDGE/CHROME                                *** Subscribe.php ***

// ****************************************************************************
// * SignaPhoto                                Наложить подпись на фотографию *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  01.06.2021
// Copyright © 2021 tve                              Посл.изменение: 26.06.2021

// Выделить расширение в имени файла
function get_file_extension($file_name)
{
   return substr(strrchr($file_name,'.'),1);
}


function ImgMakeStamp($FileImg,$FileExt)
{
   // Загрузка штампа и фото, для которого применяется водяной знак (называется штамп или печать)
   $stamp = imagecreatefrompng('images/istamp.png');
   if ($FileExt=='gif')
   {
      $im = imagecreatefromgif($FileImg);
   }
   elseif ($FileExt=='jpeg')
   {
      $im = imagecreatefromjpeg($FileImg);
   }
   elseif ($FileExt=='jpg')
   {
      $im = imagecreatefromjpeg($FileImg);
   }
   elseif ($FileExt=='png')
   {
      $im = imagecreatefrompng($FileImg);
   }
   else $im = imagecreatefromjpeg('images/iphoto.jpg');
   // Установка полей для штампа и получение высоты/ширины штампа
   $marge_right = 10;
   $marge_bottom = 10;
   $sx = imagesx($stamp);
   $sy = imagesy($stamp);
   // Копирование изображения штампа на фотографию с помощью смещения края
   // и ширины фотографии для расчёта позиционирования штампа.
   imagecopy($im,$stamp,imagesx($im)-$sx-$marge_right,imagesy($im)-$sy-$marge_bottom,0,0,imagesx($stamp),imagesy($stamp));
   // Вывод и освобождение памяти
   //header('Content-type: image/png');
   imagepng($im, 'images/proba.png');
   imagedestroy($im);
}


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
   require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
   require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
   require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";
   // Подключаем модули страницы "Подписать фотографию"
   $c_Orient=prown\MakeCookie('Orient');
   $c_FileImg=prown\MakeCookie('FileImg');
   
   /*
   $FileExt=get_file_extension($c_FileImg);
   ImgMakeStamp($c_FileImg,$FileExt);
   $c_FileProba=prown\MakeCookie('FileProba','images/proba.png',tStr);
   */
   
   // По ориентации устройства определяем и перезагружаем страницу
   if ($c_Orient=='landscape') 
   {
      $page='/Pages/SignaPhoto/SignaPhoto.php';
   }
   else
   {
      $page='/Pages/SignaPhoto/SignaPhotoPortrait.php#page2';
   }
   echo "<script>window.location.replace('".$page."');</script>";

   
   /*
   echo '
      <!DOCTYPE HTML>
      <html>
      <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex"/>
      <title>Подписать</title>
      </head>
      <body>
   ';
   echo "Subscribe!";
   echo '<br>'.$FileExt.'- расширение<br>';
   echo '<br>'.$c_FileImg.'- сделано<br>';
   echo '
      </body>
      </html>
   ';
   
   // Перезагружакм 2 страницу
   //$page='/Pages/SignaPhoto/SignaPhotoPortrait.php#page2';
   //Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
   */
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// ********************************************************** Subscribe.php ***
