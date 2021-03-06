<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteRoot   = $_WORKSPACE[wsSiteRoot];    // Корневой каталог сайта
$SiteAbove  = $_WORKSPACE[wsSiteAbove];   // Надсайтовый каталог
$SiteHost   = $_WORKSPACE[wsSiteHost];    // Каталог хостинга
$SiteDevice = $_WORKSPACE[wsSiteDevice];  // 'Computer' | 'Mobile' | 'Tablet'
// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
//require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
// Подключаем файлы библиотеки прикладных классов:
//$TPhpTools=$SiteHost.'/TPhpTools';
//require_once $TPhpTools."/TPhpTools/iniErrMessage.php";
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

echo '<script src="SignaPhoto.js"></script>';
echo '<script '.
     'src="https://code.jquery.com/jquery-3.3.1.min.js" '.
     'integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" '.
     'crossorigin="anonymous">'.
     '</script>';
// Как можно раньше (до полной загрузки страницы) определяем
// ориентацию смартфона
echo '
   <script>
   SiteDevice="Computer";
';
   if ($SiteDevice=='Mobile')
   {
   
      console.log(SiteDevice);
      // Определяем защишенность сайта, для того чтобы правильно сформулировать 
      // в запросе "http" или "https"
      $https="<?php echo $_SERVER['HTTPS']; ?>";
      if ($https=='off') $https='http'
      else $https='https'; 
      console.log($https);
      // Готовим вызов страницы c разметкой для режима "мобильный и портретный"
      // и перезапускем страницу
      $page=$https+'://'+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphotoportrait";
      console.log($page);
      window.location = $page;
      //Header("Location: http://".$_SERVER['HTTP_HOST'].$page);




      /*
      //MobiMarkup();
      ?>
      
    	function showLoc() 
      {
         var x = window.location;
         var t = ['Property-Typeof-Value', 'window.location - ' + (typeof x) + ' - ' + x ];
         for (var prop in x)
         {
            t.push(prop + ' - ' + (typeof x[prop]) + ' - ' +  (x[prop] || 'n/a'));
         }
         alert(t.join('\n'));
      }
      
      SiteDevice="<?php echo $SiteDevice; ?>";
      //SiteDevice=MakeSiteDevice("<?php echo $SiteDevice; ?>");
      //doOnOrientationChange();
      <?php
      */
   }
echo '
   </script>
';

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

// Переопределяем стили
if ($SiteDevice=='Mobile') 
   echo '<link rel="stylesheet" type="text/css" href="SignaPhoto_m.css">';
else 
   echo '<link rel="stylesheet" type="text/css" href="SignaPhoto.css">';
// 
// Подключаем скрипты по завершению загрузки страницы
echo '<script>$(document).ready(function() {';
   // Переопределяем разметку
   if ($SiteDevice=='Mobile')
   {
      //MobiMarkup();
      /*
      ?>
      console.log(SiteDevice);
      
      
      $page='http://localhost:82';
      $page='http://'+"<?php echo $_SERVER['HTTP_HOST']; ?>"
      
      $https="<?php echo $_SERVER['HTTPS']; ?>"
      if ($https=='off') $https='http'
      else $https='https'; 
      console.log($https);
      
      $page=$page+'/Pages/SignaPhoto/SignaPhotoPortrait.php';
      $page=$https+'://'+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphotoportrait";
      console.log($page);
      window.location = $page;
      //Header("Location: http://".$_SERVER['HTTP_HOST'].$page);

      
      
      //SiteDevice=MakeSiteDevice("<?php echo $SiteDevice; ?>",true);
      //doOnOrientationChange();
      //showLoc();
      //window.location = "http://localhost:82/Pages/SignaPhoto/SignapPhoto.php";
      //window.location = '<?php echo $_SERVER["HTTP_HOST"]; ?>'+'/index.php?list=signapphoto';
      //console.log('<?php echo $_SERVER["HTTP_HOST"]; ?>'+'/index.php?list=signapphoto');
      //window.location = '<?php echo $_SERVER["HTTP_HOST"]; ?>'+'/index.php?list=signapphoto'; 
      <?php
      */
   }
   else 
   {
      //DescMarkup();
      ?>
      SiteDevice=MakeSiteDevice("<?php echo $SiteDevice; ?>",true);
      <?php
   }
echo '});</script>';

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
echo '$SiteDevice='.$SiteDevice.'<br>';
echo '$SiteHost='.$SiteHost.'<br>';
echo '$_SERVER["SERVER_NAME"]='.$_SERVER["SERVER_NAME"].'<br>';
echo '$_SERVER["QUERY_STRING"]='.$_SERVER["QUERY_STRING"].'<br>';
echo '$_SERVER["DOCUMENT_ROOT"]='.$_SERVER["DOCUMENT_ROOT"].'<br>';
echo '$_SERVER["HTTP_HOST"]='.$_SERVER["HTTP_HOST"].'<br>';
echo '$_SERVER["HTTPS"]='.$_SERVER["HTTPS"].'<br>';
echo '$_SERVER["SCRIPT_FILENAME"]='.$_SERVER["SCRIPT_FILENAME"].'<br>';
echo '$_SERVER["REQUEST_URI"]='.$_SERVER["REQUEST_URI"].'<br>';


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

// <!-- --> ********************************************* dispTPhpPrown.php ***
