<?php
// PHP7/HTML5, EDGE/CHROME                               *** ajaLoadPic.php ***

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
   // Если установлен массив файлов и загружен переданными данными
   if (isset($_FILES) && isset($_FILES['image']))
   {
      //Переданный массив сохраняем в переменной
      $image = $_FILES['image'];
      // Проверяем размер файла и если он превышает заданный размер
      // завершаем выполнение скрипта и выводим ошибку
      $maxSize=2400000;
      if ($image['size']>$maxSize) 
      {
         echo(prown\makeLabel(ajErrBigFile).prown\makeLabel($maxSize));
      }
      // Максимальный размер не превышен, продолжаем анализ файла
      else
      {
         // Достаем формат изображения
         $imageFormat = explode('.', $image['name']);
         $imageFormat = $imageFormat[1];
         // Генерируем имя для изображения. 
         $imageFullName='./images/photo.'.$imageFormat;
         $filepic='images/photo.'.$imageFormat;
         // Сохраняем тип изображения в переменную
         $imageType = $image['type'];
         // Сверяем доступные форматы изображений, если изображение
         // соответствует, копируем изображение в папку images
         if ($imageType == 'image/jpeg' || $imageType == 'image/png' || $imageType == 'image/gif') 
         {
            // Если переброска файла на сервер произошла успешно, указываем это в сообщении
            if (move_uploaded_file($image['tmp_name'],$imageFullName)) 
            {
               echo(prown\makeLabel(ajSuccessfully));  // 'Файл успешно загружен'
               // Запоминаем в кукисах имена загруженных файлов
               $c_FileImg=prown\MakeCookie('FileImg',$filepic,tStr);
            }
            // Отмечаем ошибочную переброску файла на сервер 
            else {echo(prown\makeLabel(ajErrMoveServer));}
         }
         // Выводим сообщение при неверном расширении файла
         else {echo(prown\makeLabel(ajInvalidType));}
      }
   }
   // Отмечаем, что не установлен массив файлов и не загружены данные
   else {echo(prown\makeLabel(ajNoSetFile));}
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}

// **************************************   **************** ajaLoadPic.php ***
