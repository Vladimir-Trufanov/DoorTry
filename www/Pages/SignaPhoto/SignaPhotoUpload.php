<?php
// PHP7/HTML5, EDGE/CHROME                               *** SignaPhoto.php ***

// ****************************************************************************
// * SignaPhoto                                              Главный модуль - *
// *                                сайтостраница для подписывания фотографий *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  01.06.2021
// Copyright © 2021 tve                              Посл.изменение: 25.06.2021

// Выполнить callback функцию основного окна,
// которой вернем ответ по окончанию загрузки 
function jsOnResponse($obj)  
{  
   echo '<script type="text/javascript"> window.parent.onResponse("'.$obj.'"); </script> ';  
}  
// Выделить расширение в имени файла
function get_file_extension($file_name)
{
   return substr(strrchr($file_name,'.'),1);
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
   require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
   require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
   require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";

   if (prown\isComRequest('photo','img')) 
   {
      // Определяем каталог для сохранения изображений 
      $dir = 'images/';  
      $exti= get_file_extension(basename($_FILES['loadfile']['name']));
      // Переносим в загрузочный каталог начальный файл изображения
      $name = 'photo'; // basename($_FILES['loadfile']['name']);  
      $file = $dir . $name.'.'.$exti;  
      $c_FileImg=prown\MakeCookie('FileImg',$file,tStr);  
      // Копируем файл и получаем результат
      $success = move_uploaded_file($_FILES['loadfile']['tmp_name'],$file); 
      if ($success)
      {
         // Копируем оригинал на подписанную фотографию
         $newfile = $dir.'proba.png';
         if (!copy($file,$newfile)) 
         {
            echo "не удалось скопировать $file...\n";
         }
         // Выходим на вторую страницу
         // $page='/Pages/SignaPhoto/SignaPhotoPortrait.php#page2';
         $page='/Pages/SignaPhoto/SignaPhotoPortrait.php';
         Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
      }
      else
      {
         //echo '$file:                       '.$file.'<br>'; 
         //echo '$SiteRoot:                   '.$SiteRoot.'<br>'; 
         //echo '$_FILES["loadfile"]["name"]: '.$_FILES['loadfile']['name'].'<br>'; 
         echo "Ошибка: файл ".$_FILES['loadfile']['name']." не загружен!<br>";  
      }
      // Вызываем callback функцию и передаем ей результат
      // (25.06.2021 убираем из кода для осмысления. Делаем по другому)
      // jsOnResponse("{'filename':'" . $name . "', 'success':'" . $success . "'}");  
      //prown\ViewGlobal(avgGET);
   }
   else 
   {
      // Определяем каталог для сохранения изображений 
      $dir = 'images/';  
      $exti= get_file_extension(basename($_FILES['loadfile']['name']));
      $name = 'stamp'; // basename($_FILES['loadfile']['name']);  
      $file = $dir . $name.'.'.$exti;  
      $c_FileStamp=prown\MakeCookie('FileStamp',$file,tStr);  
      // Копируем файл и получаем результат
      $success = move_uploaded_file($_FILES['loadfile']['tmp_name'], $file); 
      if ($success)
      {
         // Обновляем страницу
         $page='/Pages/SignaPhoto/SignaPhotoPortrait.php';
         Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
      }
      else
      {
         //echo '$file:                       '.$file.'<br>'; 
         //echo '$SiteRoot:                   '.$SiteRoot.'<br>'; 
         //echo '$_FILES["loadfile"]["name"]: '.$_FILES['loadfile']['name'].'<br>'; 
         echo "Ошибка: файл ".$_FILES['loadfile']['name']." не загружен!<br>";  
      }
      // Вызываем callback функцию и передаем ей результат
      // (25.06.2021 убираем из кода для осмысления. Делаем по другому)
      // jsOnResponse("{'filename':'" . $name . "', 'success':'" . $success . "'}");  
      //prown\ViewGlobal(avgGET);
   }
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
