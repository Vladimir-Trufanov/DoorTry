<?php
// PHP7/HTML5, EDGE/CHROME                         *** SignaPhotoUpload.php ***

// ****************************************************************************
// * SignaPhoto                                              Главный модуль - *
// *                                сайтостраница для подписывания фотографий *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  01.06.2021
// Copyright © 2021 tve                              Посл.изменение: 25.06.2021


function ImgMakeStamp($FileImg,$FileExt)
{
   // Загрузка штампа и фото, для которого применяется водяной знак (называется штамп или печать)
   $stamp = @imagecreatefrompng('images/istamp.png');
   $fname=$FileImg;
   if ($FileExt=='gif')
   {
      $im = @imagecreatefromgif($FileImg);
   }
   elseif ($FileExt=='jpeg')
   {
      $im = @imagecreatefromjpeg($FileImg);
   }
   elseif ($FileExt=='jpg')
   {
      $im = @imagecreatefromjpeg($FileImg);
   }
   elseif ($FileExt=='png')
   {
      $im = @imagecreatefrompng($FileImg);
   }
   else 
   {
     $fname='images/iphoto.jpg';
     $im = @imagecreatefromjpeg($fname);
   }
    /* Если не удалось */
    if(!$im)
    {
         prown\Alert('Ошибка загрузки '.$fname.'!');
    }   
   
   
   // Установка полей для штампа и получение высоты/ширины штампа
   $marge_right = 10;
   $marge_bottom = 10;
   $sx = imagesx($stamp);
   $sy = imagesy($stamp);
   // Копирование изображения штампа на фотографию с помощью смещения края
   // и ширины фотографии для расчёта позиционирования штампа.
   imagecopy($im,$stamp,
      imagesx($im)-$sx-$marge_right,
      imagesy($im)-$sy-$marge_bottom,0,0,
      imagesx($stamp),imagesy($stamp));
   // Вывод и освобождение памяти
   imagepng($im, 'images/proba.png');
   imagedestroy($im);
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
   
   $c_Orient=prown\MakeCookie('Orient');
   if (prown\isComRequest('photo','img')) 
   {
      // Определяем каталог для сохранения изображений 
      $dir = 'images/';  
      $exti= get_file_extension(basename($_FILES['loadfile']['name']));
      // Переносим в загрузочный каталог начальный файл изображения
      $name = 'photo'; 
      $file = $dir . $name.'.'.$exti;  
      // Копируем файл и получаем результат
      $success = move_uploaded_file($_FILES['loadfile']['tmp_name'],$file); 
      if ($success)
      {
         // Копируем оригинал на подписанную фотографию
         
         $newfile = $dir.'proba.'.$exti;
         if (!copy($file,$newfile)) 
         {
            prown\Alert('Не удалось скопировать '.$file);
         }
         
         ImgMakeStamp($newfile,get_file_extension($newfile));
         
         // Запоминаем в кукисах имена загруженных файлов
         $c_FileImg=prown\MakeCookie('FileImg',$file,tStr);
         //$c_FileProba=prown\MakeCookie('FileProba',$newfile,tStr);
         $subsfile = $dir.'proba.png';
         $c_FileProba=prown\MakeCookie('FileProba',$subsfile,tStr);
         // Делаем задержку 2 секунды, чтобы загрузилась фотография
         //sleep(2);
         // Переходим на страницу
         prown\Alert('Изображение загружено!');
         $page='/Pages/SignaPhoto/SignaPhoto.php';
         echo "<script>window.location.replace('".$page."');</script>";
      }
      else
      {
         //echo '$file:                       '.$file.'<br>'; 
         //echo '$SiteRoot:                   '.$SiteRoot.'<br>'; 
         //echo '$_FILES["loadfile"]["name"]: '.$_FILES['loadfile']['name'].'<br>'; 
         prown\Alert("Файл ".$_FILES['loadfile']['name']." не загружен! Большой размер");  
      }
   }
   else 
   {
      /*
      // Определяем каталог для сохранения изображений 
      $dir = 'images/';  
      $exti= get_file_extension(basename($_FILES['loadfile']['name']));
      $name = 'stamp'; // basename($_FILES['loadfile']['name']);  
      $file = $dir . $name.'.'.$exti;  
      //$c_FileStamp=prown\MakeCookie('FileStamp',$file,tStr);  
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
      */
   }
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// *************************************************** SignaPhotoUpload.php ***