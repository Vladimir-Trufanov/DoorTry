<?php
// PHP7/HTML5, EDGE/CHROME                                *** Subscribe.php ***

// ****************************************************************************
// * SignaPhoto                                Наложить подпись на фотографию *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  01.06.2021
// Copyright © 2021 tve                              Посл.изменение: 26.06.2021

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
   require_once 'SignaPhotoHtml.php';
   
   
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
   MakeStamp();
   echo '
      </body>
      </html>
   ';
   
   // Перезагружакм 2 страницу
   //$page='/Pages/SignaPhoto/SignaPhotoPortrait.php#page2';
   //Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// ********************************************************** Subscribe.php ***
