<?php
// PHP7                                            *** indexInstrumenty.php ***

// ****************************************************************************
// * DoorTry-Instrumenty              Информационная страница об инструментах *
// *                                       разработчика сайтов и документации *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.05.2020
// Copyright © 2019 tve                              Посл.изменение: 13.05.2020

// Определяем страничные константы
// define ("WasTest", "WasTest");   // "Тест уже запускался"

session_start();
// Инициализируем рабочее пространство: корневой каталог сайта и т.д.
require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();

$SiteRoot    = $_WORKSPACE[wsSiteRoot];     // Корневой каталог сайта
$SiteAbove   = $_WORKSPACE[wsSiteAbove];    // Надсайтовый каталог
$SiteHost    = $_WORKSPACE[wsSiteHost];     // Каталог хостинга
$SiteDevice  = $_WORKSPACE[wsSiteDevice];   // 'Computer' | 'Mobile' | 'Tablet'
/*
$UserAgent   = $_WORKSPACE[wsUserAgent];    // HTTP_USER_AGENT
$TimeRequest = $_WORKSPACE[wsTimeRequest];  // Время запроса сайта
$Ip          = $_WORKSPACE[wsRemoteAddr];   // IP-адрес запроса сайта
$SiteName    = $_WORKSPACE[wsSiteName];     // Доменное имя сайта
*/
// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteHost."/TDoorTryer/DoorTryerPage.php";
try 
{
   // Подключаем файлы библиотеки прикладных модулей:
   $TPhpPrown=$SiteHost.'/TPhpPrown';
   require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
   // Подгружаем рабочие модули
   require_once $SiteRoot."/Common.php";
   require_once $SiteRoot."/iniErrDoorTry.php";
   // Выводим разметку страницы
   echo '<!DOCTYPE html>';
   echo '<html lang="ru">';
   echo '<head>';
   echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
   //SeoTags();
   // Подключаем jquery/jquery-ui
   echo '<link rel="stylesheet" type="text/css" '. 
     'href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">';
   echo '<script '.
     'src="https://code.jquery.com/jquery-3.3.1.min.js" '.
     'integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" '.
     'crossorigin="anonymous">'.
     '</script>';
   echo '<script '.
     'src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" '.
     'integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" '.
     'crossorigin="anonymous">'.
     '</script>';
   // Подключаем JS-библиотеки
   //echo '<script src="/JS/DoorTry.js"></script>';
   //echo '<link href="/TJsPrown/TJsPrown.css" rel="stylesheet" type="text/css">'; 
   //echo '<script src="/TJsPrown/TJsPrown.js"></script>';
   // Подключаем особенности стиля для компьютерной и мобильной версий
   if ($SiteDevice==Mobile) 
   {   
      //echo '<link href="/Styles/InstrumentyMobi.css" rel="stylesheet">';
   }
   else 
   {   
      //echo '<link href="/Styles/InstrumentyComp.css" rel="stylesheet">';
   }
   echo '</head>';
   echo '<body>';
   echo '<div class="Instrumenty">';

   // Загружаем контент страницы
   require_once($SiteRoot.'/Pages/Instrumenty/Instrumenty.php');
   
   echo '</div>';
   echo '</body>'; 
   echo '</html>';
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// <!-- --> ****************************************** indexInstrumenty.php ***
