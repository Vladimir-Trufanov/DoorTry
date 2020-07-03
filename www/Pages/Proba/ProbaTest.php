<?php
// PHP7                                               *** dispTPhpPrown.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown                            Диспетчер страниц TPhpPrown *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.12.2019
// Copyright © 2019 tve                              Посл.изменение: 02.02.2020

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

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
echo '<title>Подключение обработчика ошибок/исключений</title>';
echo '<meta name="description" '.
     'content="Сайт используется для обработки ошибок/исключений и их '.
     'комментирования в PHP5-PHP7. Показан способ для подключения этой '.
     'возможности к Вашим сайтам.">';
echo '<meta name="keywords" '.
     'content="универсальная обработка ошибок и исключений PHP5-7, '.
     'принцип DO-or-TRY, Делай или Пробуй, #doortry">';

//echo '<script src="../../TJsPrown/jquery.min.js">'.'</script>';
//echo '<script src="https://doortry.ru/TJsPrown/jquery.min.js">'.'</script>';


echo '<script type="text/javascript" src="jquery-1.6.4.min.js"></script>';
echo '<script type="text/javascript" src="jquery.cookie.js"></script>';
echo '<script type="text/javascript" src="TJsPrown.js"></script>';



/*
      // Подключаем jquery/jquery-ui
echo '<link rel="stylesheet" type="text/css" '. 
     'href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">';
echo '<script '.
     'src="https://code.jquery.com/jquery-3.3.1.min.js" '.
     'integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" '.
     'crossorigin="anonymous">'.
     '</script>';
echo '<script '.
     'src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" '.
     'integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" '.
     'crossorigin="anonymous">'.
     '</script>';
*/
      
?>

<?php
echo '</head>';
echo '<body>';
/*
?>
<script>
$(document).ready(function()
{
   console.log(window.innerHeight);
   console.log(window.innerWidth);
   setcookie('name1','value1',100) 
});
setcookie('name2','value2',100) 
//Получение cookie
$.cookie('cookie_name1', 'Значение кука1');
var test = $.cookie('cookie_name1');
//Проверка. существует ли кук
if($.cookie('cookie_name1')) console.log('***'+test+'***');
//Получение cookie
//var test = $.cookie('cookie_name1');
//Проверка. существует ли кук
//if($.cookie('cookie_name1')) alert(test);
//Удаление cookie
//$.cookie('cookie_name2', null);
</script>
<?php
*/
echo '<div class="info">';
echo '***<br>';
echo 'Всем привет!<br>';
echo '***<br>';
echo '</div>';

?>

<div>
   <img class="imgCard" id="Rocary" 
   src="https://3.downloader.disk.yandex.ru/preview/72929e9c7c66f597b4f92c15b812cc3dbf08221c0e969a6663f79a4ece7ef206/inf/DhLO1VNSy6snhnvOdCmJUcSnXDlNO2C_9P8eTvVJCRrdN8LxBBo8Z_Uz8bPLQj88iGyLe-r0UBJ9MmzptJzqSw%3D%3D?uid=195746226&filename=IMG_2548.JPG&disposition=inline&hash=&limit=0&content_type=image%2Fjpeg&owner_uid=195746226&tknv=v2&size=1578x762"
   <!-- 
   src="https://3.downloader.disk.yandex.ru/preview/72929e9c7c66f597b4f92c15b812cc3dbf08221c0e969a6663f79a4ece7ef206/inf/DhLO1VNSy6snhnvOdCmJUcSnXDlNO2C_9P8eTvVJCRrdN8LxBBo8Z_Uz8bPLQj88iGyLe-r0UBJ9MmzptJzqSw==?uid=195746226&filename=IMG_2548.JPG&disposition=inline&hash=&limit=0&content_type=image%2Fjpeg&tknv=v2&owner_uid=195746226&size=1600x762"
   src="/Images/nasampo.jpg" 
   -->
   alt="Хочешь кваску">
</div>
<?php



echo '<div id="res"></div>';
echo '</body>';
echo '</html>';
?>
<?php
//prown\ViewGlobal(avgSERVER);
//prown\ViewGlobal(avgCOOKIE);
// <!-- --> ********************************************* dispTPhpPrown.php ***
