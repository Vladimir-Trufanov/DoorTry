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

$classTT='BaseMaker';
require_once $TPhpTools."/TPhpToolsTests/T".$classTT."_CreateBaseTest.php";
require_once $TPhpTools."/TPhpToolsTests/T".$classTT."_PragmaTest.php";
require_once $TPhpTools."/TPhpToolsTests/T".$classTT."_ValueRow.php";
require_once $TPhpTools."/TPhpToolsTests/T".$classTT."_Query.php";
require_once $TPhpTools."/TPhpToolsTests/T".$classTT."_UpdateInsert.php";



// ****************************************************************************
// *            Проверить существование и удалить файл базы данных            *
// ****************************************************************************
function UnlinkFileBase($filename)
{
   if (file_exists($filename)) 
   {
      if (!unlink($filename))
      {
         // Выводим сообщение о неудачном удалении файла базы данных в случаях:
         // а) база данных подключена к стороннему приложению;
         // б) база данных еще привязана к другому объекту класса;
         // в) прочее
         throw new Exception("Не удалось удалить тестовую базу данных $filename!");
      } 
   } 
}

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
echo '***<br>';
echo 'Всем привет!<br>';
echo '***<br>';

      //filemtime('генерируем отладочное исключение'); 

      // Проверяем существование и удаляем файл базы данных 
      $filename=$_SERVER['DOCUMENT_ROOT'].'/basemaker.db3';
      echo 'Проверяется существование и удаляется старый файл базы данных: ';  
      UnlinkFileBase($filename);
      echo 'Ok<br>';

      echo 'Создается объект PDO и файл тестовой базы данных: ';
      $pathBase='sqlite:'.$filename; 
      $username='tve';
      $password='23ety17';     
      // Подключаем PDO к базе
      $pdo = new PDO(
      $pathBase, 
      $username,
      $password,
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
      );
      echo 'Ok<br>';

      PointMessage('Проверяются настройки целостности по внешним ключам:'); 
      // (по запросу PRAGMA:foreign_keys)                                    
      PragmaBaseTest($pdo);
      OkMessage();

      PointMessage('Через PDO строятся таблицы и объект PDO уничтожается');                                    
      CreateBaseTest($pdo);
      unset($pdo); // удалили объект класса
      OkMessage();
      
      // Заново создаем базу данных и подключаем к ней TBaseMaker
      $db = new ttools\BaseMaker($pathBase,$username,$password);
      // Тестируем Values, Rows методы
      test_ValueRow($db);










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
