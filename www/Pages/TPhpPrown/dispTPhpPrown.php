<?php
// PHP7                                               *** dispTPhpPrown.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown                            Диспетчер страниц TPhpPrown *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.12.2019
// Copyright © 2019 tve                              Посл.изменение: 04.02.2020
require_once $_SERVER['DOCUMENT_ROOT']."/TDoorTryer/DoorTryerPage.php";
try 
{
// ----------------------------------------------------------------------------
// Инициализируем рабочее пространство: корневой каталог сайта и т.д.
require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteRoot   = $_WORKSPACE[wsSiteRoot];    // Корневой каталог сайта
$SiteAbove  = $_WORKSPACE[wsSiteAbove];   // Надсайтовый каталог
$SiteHost   = $_WORKSPACE[wsSiteHost];    // Каталог хостинга
$SiteDevice = $_WORKSPACE[wsSiteDevice];  // 'Computer' | 'Mobile' | 'Tablet'
$UserAgent  = $_WORKSPACE[wsUserAgent];   // HTTP_USER_AGENT
// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
require_once $TPhpPrown."/TPhpPrown/getTranslit.php";
require_once $TPhpPrown."/TPhpPrown/MakeUserError.php";
// Определяем страничные константы
define ("WasTest", "WasTest");   // "Тест уже запускался"
// Подгружаем рабочие модули
require_once $SiteRoot."/Common.php";
require_once $SiteRoot."/iniErrDoorTry.php";
require_once $SiteRoot."/iniTPhpPrown.php";
// Определяем переданный параметр
$Parm=prown\getComRequest('list');
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
   // Загружаем контент выбранной страницы
   require_once($SiteRoot.'/Pages/TPhpPrown/'.$Parm.'.php');
   require_once($TPhpPrown.'/TPhpPrownTests/FunctionsBlock.php');
   require_once $SiteRoot."/Pages/TPhpPrown/viewTPhpPrown.php";
   //echo $Parm;
}
// ----------------------------------------------------------------------------
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// <!-- --> ********************************************* dispTPhpPrown.php ***
