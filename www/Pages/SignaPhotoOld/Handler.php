<?php

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
   //require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
   //require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";

   // Проверяем установлен ли массив файлов и массив с переданными данными
   if(isset($_FILES) && isset($_FILES['image'])) 
   {
      //Переданный массив сохраняем в переменной
      $image = $_FILES['image'];
      // Проверяем размер файла и если он превышает заданный размер
      // завершаем выполнение скрипта и выводим ошибку
      if ($image['size'] > 400000) {die('Большой файл!');}
      // Достаем формат изображения
      $imageFormat = explode('.', $image['name']);
      $imageFormat = $imageFormat[1];
      // Генерируем новое имя для изображения. Можно сохранить и со старым
      // но это не рекомендуется делать
      //$imageFullName='./images/'.hash('crc32',time()).'.'.$imageFormat;
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
            echo 'Успешно!';
            // Запоминаем в кукисах имена загруженных файлов
            $c_FileImg=prown\MakeCookie('FileImg',$filepic,tStr);
         }
         // Отмечаем ошибочную переброску 
         else {echo 'Ошибка переброса!';}
      }
      else echo 'Не изображение!';
   }
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}

