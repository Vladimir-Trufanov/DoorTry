<?php
// PHP7/HTML5, EDGE/CHROME                         *** SignaPhotoUpload.php ***

// ****************************************************************************
// * SignaPhoto        Выполнить окончательную переброску файла, загруженного *
// *          во временный каталог, на целевое место; провести контроль файла *        
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.11.2021
// Copyright © 2021 tve                              Посл.изменение: 06.11.2021

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

function echol($line)
{
   echo '<pre>';
   echo $line;
   echo '</pre>';
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
   //require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
   require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
   // Подключаем межязыковые определения
   require_once 'SignaPhotoDef.php';

   // Готовим окончательную переброску файла, загруженного во временный каталог,
   // в целевой каталог "TempServer" на хостинге под первоначальным именем
   $uploaddir = 'Temp/'; 
   $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
   //  
   if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
   {
       $c_FileImg=prown\MakeCookie('FileImg',$uploadfile,tStr);
       echol("Файл корректен и был успешно загружен.\n");
   } 
   else 
   {
      echol("Возможная атака с помощью файловой загрузки!\n");
   }

   print "<pre>";
   echo 'Некоторая отладочная информация:';
   print_r($_FILES);
   echo '$c_FileImg='.$c_FileImg;
   print "</pre>";

   // Отмечаем, что не установлен массив файлов и не загружены данные
   // else {echo(prown\makeLabel(ajNoSetFile));}
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}

// *** <!-- --> ************************************** SignaPhotoUpload.php ***
