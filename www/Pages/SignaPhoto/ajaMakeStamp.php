<?php
// PHP7/HTML5, EDGE/CHROME                             *** ajaMakeStamp.php ***

// ****************************************************************************
// * SignaPhoto             Перебросить и проконтроллировать файл изображения *
// *                               из временного хранилища на сайт через аякс *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.07.2021
// Copyright © 2021 tve                              Посл.изменение: 03.08.2021

/*
$_FILES['loadfile']=Array(
   [name]     => MyFile.txt (comes from the browser, so treat as tainted)
   [type]     => text/plain  (not sure where it gets this from - assume the browser, so treat as tainted)
   [tmp_name] => /tmp/php/php1h4j1o (could be anywhere on your system, depending on your config settings, 
                 but the user has no control, so this isn't tainted)
   [error]    => UPLOAD_ERR_OK  (= 0)
   [size]     => 123   (the size in bytes)
)
*/

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
   require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
   // Подключаем межязыковые определения
   require_once 'SignaPhotoDef.php';

   // Отмечаем, что на фотографию наложена свежая подпись
   echo(prown\makeLabel(ajIsFreshStamp));  
   // Отмечаем, что произошла ошибка при наложении подписи на изображение
   echo(prown\makeLabel(ajErrFreshStamp));  

}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}

// ******************************************************* ajaMakeStamp.php ***
