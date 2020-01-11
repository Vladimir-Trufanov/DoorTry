<?php
// PHP7                   *** opredelit-obshchie-konstanty-i-peremennye.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown          Страница вспомогательного модуля iniConstMem- *
// *                       определить общие константы и переменные библиотеки *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  16.12.2019
// Copyright © 2019 tve                              Посл.изменение: 20.12.2019

// Определяем страничные константы
define ("Script", "opredelit-obshchie-konstanty-i-peremennye"); 
define ("Computer", "Computer"); // "Устройство, запросившее сайт - компьютер"  
define ("Mobile", "Mobile");     // "Устройство, запросившее сайт - смартфон"  
// Инициализируем корневой каталог 
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
// Подгружаем рабочие модули
require_once($SiteRoot.'/TPhpPrown/getSiteDevice.php');
$SiteDevice=prown\getSiteDevice();       // 'Computer','Mobile','Tablet'
// Формируем часть страницы с описанием функции
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>iniConstMem - определить общие константы и переменные библиотеки</title>
<meta name="description" content=
"iniConstMem определяет общие константы и переменные библиотеки TPhpPrown: для 
указания режимов вывода сообщений, определения типов переменных, используемых 
в библиотеке">
<meta name="keywords" content=                                          
"iniConstMem,определить общие константы и переменные библиотеки,
принцип DO-or-TRY,делай или пробуй,TPhpPrown">
<?php
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
// Обеспечиваем двойной скролл для кода;
echo '<script src="/JS/jquery.doubleScroll.js"></script>';
// Подключаем особенности стиля для компьютерной и мобильной версий
if ($SiteDevice==Mobile) 
{   
   //echo '<script>alert("Mobile");</script>';
   echo '<link href="/Styles/TPhpPrownMobi.css" rel="stylesheet">';
}
else 
{   
   //echo '<script>alert("Computer");</script>';
   echo '<link href="/Styles/TPhpPrownComp.css" rel="stylesheet">';
}
// Подключаем JS-библиотеку
echo '<link href="/TJsPrown/TJsPrown.css" rel="stylesheet" type="text/css">'; 
echo '<script src="/TJsPrown/TJsPrown.js"></script>';
// Инициируем двойную прокрутку и реакцию кнопки
?>
<script>
$(document).ready(function(){
   $(".CodeText").doubleScroll({resetOnWindowResize:true});
});
</script>
</head>
<body>
<div class="TPhpPrown">
<h4 id="iniconstmem">iniConstMem - определить общие константы и переменные библиотеки.</h4>
<h5><span class="letter">М</span>одуль определяет общие константы (а также переменные), которые используются в различных функциях библиотеки и в вызывающих их внешних программах, и сценариях.</h5>
<h5><span class="letter">П</span>ервая группа констант используются для указания режимов вывода сообщений библиотеки. TPhpPrown позволяет выводить сообщения четырьмя способами:</h5>
<h5>в текущей позиции сайта,</h5>
<h5>через исключение с пользовательской ошибкой,</h5>
<h5>в дополнительном блоке для сообщения (в дополнительном div-е),</h5>
<h5>в диалоговом окне с помощью jQueryUi.</h5>
<h5><span class="letter">В</span>торая группа констант определяет семь типов переменных, используемых в библиотеке.</h5>
<?php
// Загружаем в страницу код функции
echo '<br> <div class="CodeText">';
$FileSpec=$SiteRoot.'/TPhpPrown/iniConstMem.php';
$FileContent=file_get_contents($FileSpec);
//echo mb_detect_encoding($FileContent).'<br>';
//echo '---<br>'.$FileContent.'<br>---<br>';
// Вырезаем комментарий, который уже представлен
//$pattern="/\/\/\sМодуль([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)-:,=&;]+)библиотеке./u";
$pattern="/\/\/\sМодуль([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)-:,=&;]+)\/\/\s---/u";
$replacement='// ---';
$FileItog=preg_replace($pattern,$replacement,$FileContent);
// Преобразуем текст в раскрашенный код и показываем его
$FileCode=highlight_string($FileItog,true);
echo $FileCode;
echo '</div></div>';
?>
<?php
// <!-- --> ***************** opredelit-obshchie-konstanty-i-peremennye.php ***
