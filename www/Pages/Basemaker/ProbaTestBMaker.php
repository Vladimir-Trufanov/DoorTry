<?php

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
require_once $TPhpPrown."/TPhpPrown/Findes.php";
require_once $TPhpPrown."/TPhpPrown/getTranslit.php";
require_once $TPhpPrown."/TPhpPrown/iniConstMem.php";
require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
require_once $TPhpPrown."/TPhpPrown/MakeParm.php";
require_once $TPhpPrown."/TPhpPrown/MakeSession.php";
require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";

// Подключаем модуль обеспечения тестов
require_once $TPhpPrown."/TPhpPrownTests/FunctionsBlock.php";

// Подключаем файлы библиотеки прикладных классов:
$TPhpTools=$SiteHost.'/TPhpTools';
require_once $TPhpTools."/TPhpTools/iniErrMessage.php";
require_once $TPhpTools."/TPhpTools/TBaseMaker/BaseMakerClass.php";

// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteHost."/TDoorTryer/DoorTryerPage.php";
try 
{
// Запускаем сценарий сайта
echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
echo '<title>Проба BaseMaker</title>';
echo '<meta name="description" content="Проба BaseMaker">';
echo '<meta name="keywords"    content="Проба BaseMaker">';
echo '</head>';

echo '<body>';
echo '<div>';

/*
echo '***<br>';
echo 'Всем привет!<br>';
echo '***<br>';
*/

$classTT='BaseMaker';

require_once $TPhpTools."/TPhpToolsTests/T_ToolsTestCommon.php";
if ($classTT=='BaseMaker')
{
   require_once $TPhpTools."/TPhpToolsTests/TBaseMaker_CreateBaseTest.php";
   require_once $TPhpTools."/TPhpToolsTests/TBaseMaker_PragmaTest.php";
   require_once $TPhpTools."/TPhpToolsTests/TBaseMaker_ValueRow.php";
   require_once $TPhpTools."/TPhpToolsTests/TBaseMaker_Query.php";
   require_once $TPhpTools."/TPhpToolsTests/TBaseMaker_UpdateInsert.php";
}
$shellTest=NULL; require_once $TPhpTools."/TPhpToolsTests/T".$classTT."__test.php";

echo '</div>';
echo '</body>';
echo '</html>';
//prown\ViewGlobal(avgSERVER);
//prown\ViewGlobal(avgCOOKIE);

// Выполняем обработку исключений на верхнем уровне
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// <!-- --> ********************************************* dispTPhpPrown.php ***
