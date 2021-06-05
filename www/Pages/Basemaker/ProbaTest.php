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
// Подключаем файлы библиотеки прикладных классов:
$TPhpTools=$SiteHost.'/TPhpTools';
require_once $TPhpTools."/TPhpTools/iniErrMessage.php";
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
echo '<meta name="description" content="Проба Img">';
echo '<meta name="keywords"    content="Проба Img">';

/*
echo '
   <script>
   function sizePic() 
   {
       size = document.getElementById("size").value;
       img = document.getElementById("pic");
       img.width = 60 + 20*size;
   }
   function sizeStamp() 
   {
       size = document.getElementById("sizeStamp").value;
       img = document.getElementById("picStamp");
       img.width = 60 + 20*size;
   }
   </script>
';
*/
echo '<link rel="stylesheet" type="text/css" href="Styles.css">';

echo '</head>';
echo '<body>';
echo '<div id="All">';

// Размечаем область загруженного изображения и подписи
echo '<div  id="View">';
echo '<div  id="Photo">';
ViewPhoto();
echo '</div>';
echo '<div  id="Stamp">';
ViewStamp();
echo '</div>';
echo '</div>';

// Размечаем область изображения с подписью
echo '<div  id="Proba">';
ViewProba();
echo '</div>';


echo '</div>';
// Размечаем область управления загрузкой и подписанием
echo '<div  id="Lead">';
ViewLead();
echo '</div>';


/*
echo '***<br>';
echo 'Всем привет!<br>';
echo '<pre>';
print_r(gd_info());
echo '</pre>';
echo '***<br>';
*/

//MakeStamp();



/*
echo '
  <p>Размер подписи: <input type="range" min="1" max="5" id="sizeStamp" 
     oninput="sizeStamp()" value="3"></p>
  <p><img src="images/stamp.png" alt="" id="picStamp"></p>
';
echo '
  <p>Размер рисунка: <input type="range" min="1" max="5" id="size" 
     oninput="sizePic()" value="3"></p>
  <p><img src="images/photo.jpg" alt="" id="pic"></p>
';




$im = imagecreatefrompng('sean.png');

if($im && imagefilter($im, IMG_FILTER_BRIGHTNESS, 70))
{
    echo 'Яркость изображения изменена.';

    imagepng($im, 'sean1.png');
    imagedestroy($im);
}
else
{
    echo 'Изменить яркость не удалось.';
}



$im = imagecreatefrompng('dave.png');

if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
{
    echo 'Изображение преобразовано к градациям серого.';

    imagepng($im, 'dave1.png');
}
else
{
    echo 'Преобразование не удалось.';
}

imagedestroy($im);


*/
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



function MakeStamp()
{
   // Загрузка штампа и фото, для которого применяется водяной знак (называется штамп или печать)
   $stamp = imagecreatefrompng('stamp.png');
   $im = imagecreatefromjpeg('photo.jpeg');
   // Установка полей для штампа и получение высоты/ширины штампа
   $marge_right = 10;
   $marge_bottom = 10;
   $sx = imagesx($stamp);
   $sy = imagesy($stamp);
   // Копирование изображения штампа на фотографию с помощью смещения края
   // и ширины фотографии для расчёта позиционирования штампа.
   imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
   // Вывод и освобождение памяти
   //header('Content-type: image/png');
   imagepng($im, 'proba.png');
   imagedestroy($im);
   echo 'Сделано!';
}
// Вывести изображение последнего загруженного фото
function ViewPhoto()
{
   echo 'Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo ';
   //echo '<img src="images/photo.jpg" alt="" id="pic">';
}
// Вывести изображение подписи последних размеров
function ViewStamp()
{
   echo 'Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp ';
   //echo '<p><img src="images/stamp.png" alt="" id="picStamp"></p>';
}
// Вывести изображение c подписью
function ViewProba()
{
   //echo '<img src="images/proba.png" alt="" id="picProba">';
   echo 'Proba - Подписанная фотография';
}
// Вывести область управления
function ViewLead()
{
   echo 'Lead Управление';
}

// <!-- --> ********************************************* dispTPhpPrown.php ***
