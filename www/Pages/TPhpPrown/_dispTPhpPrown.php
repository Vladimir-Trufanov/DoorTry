<?php
// PHP7                                              *** _dispTPhpPrown.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown                            Диспетчер страниц TPhpPrown *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.12.2019
// Copyright © 2019 tve                              Посл.изменение: 02.04.2020

// Определяем страничные константы
define ("WasTest", "WasTest");   // "Тест уже запускался"

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
// ----------------------------------------------------------------------------
// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
require_once $TPhpPrown."/TPhpPrown/getTranslit.php";
require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
require_once $TPhpPrown."/TPhpPrown/MakeSession.php";
require_once $TPhpPrown."/TPhpPrown/MakeUserError.php";
require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";
   
require_once($TPhpPrown.'/TPhpPrownTests/MakeCookie_test_D.php');
require_once($TPhpPrown.'/TPhpPrownTests/MakeCookie_test_I.php');





// Подгружаем рабочие модули
require_once $SiteRoot."/Common.php";
require_once $SiteRoot."/iniErrDoorTry.php";
require_once $SiteRoot."/iniTPhpPrown.php";

// Определяем переданный параметр
$Parm=prown\getComRequest('list');
prown\ConsoleLog('$Parm='.$Parm);

// Если параметр в запросе не был указан, то выводим сообщение 
// "Страница из библиотеки не указана в параметре!"
if (!IsSet($Parm)) 
{
   prown\MakeUserError(PageLibraryIsNot,'DoorTry',$ModeError);
}
// Если параметр запроса к сайту не соответствует массиву функций библиотеки, 
// то выдаем сообщение "Страница из библиотеки указана неверно!"
else if (!isTPhpPrownFunc($Parm,$aTPhpPrown))
{
   prown\MakeUserError(InvalidLibraryPage,'DoorTry',$ModeError);
}
// Когда параметр запроса соответствует библиотеке, то через обработчик ошибок
// подключаем страницу библиотеки
else
{
   prown\ConsoleLog($_SERVER['DOCUMENT_ROOT'].$_SERVER['SCRIPT_NAME']);
   prown\ViewGlobal(avgREQUEST);
 
   // Загружаем контент выбранной страницы
   require_once($SiteRoot.'/Pages/TPhpPrown/'.$Parm.'.php');
   require_once $SiteRoot."/Pages/TPhpPrown/_CodePart.php";
   require_once $SiteRoot."/Pages/TPhpPrown/_TestPart.php";

   if (defined("FuncName")&&(FuncName=='MakeCookie')) 
   {
      //prown\ConsoleLog('Поймали MakeCookie');
      if (FuncName=='MakeCookie') 
      {
         if (!IsSet($_COOKIE['WasTest']))
         {
            MakeCookieTest(entryDoorTry);
         }
      }

   }  
   
   require_once($TPhpPrown.'/TPhpPrownTests/FunctionsBlock.php');
   // Формируем и выводим страницу
   require_once $SiteRoot."/Pages/TPhpPrown/_viewTPhpPrown.php";
}


// ----------------------------------------------------------------------------
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// <!-- --> ******************************************** _dispTPhpPrown.php ***
