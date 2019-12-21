<?php
// PHP7                 *** opredelit-obshchie-soobshcheniya-biblioteki.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown        Страница вспомогательного модуля iniErrMessage- *
// *                                    определить общие сообщения библиотеки *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  20.12.2019
// Copyright © 2019 tve                              Посл.изменение: 21.12.2019

// Определяем страничные константы
define ("Script", "opredelit-obshchie-soobshcheniya-biblioteki"); 
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
<title>iniErrMessage-определить общие сообщения библиотеки</title>
<meta name="description" content=
"iniErrMessage определяет ошибочные сообщения и предупреждения всех 
функций библиотеки">
<meta name="keywords" content=                                          
"iniErrMessage,общие сообщения библиотеки,TPhpPrown,
принцип DO-or-TRY,делай или пробуй">
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
     'src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"'.
     'integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" '.
     'crossorigin="anonymous">'.
     '</script>';
// Обеспечиваем двойной скролл для кода;
echo '<script type="text/javascript" src="/JS/jquery.doubleScroll.js"></script>';
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
// Инициируем двойную прокрутку представленного кода
?>
<script>
$(document).ready(function(){
   $(".CodeText").doubleScroll({resetOnWindowResize:true});
});
</script>
</head>
<body>
<div class="TPhpPrown">
<h4 id="inierrmessage">iniErrMessage - Определить общие сообщения библиотеки.</h4>
<h5><span class="letter">М</span>одуль собирает в одном файле константы, соответствующие пользовательским ошибочным сообщениям и предупреждениям со всех функций библиотеки.</h5>
<?php
// Загружаем в страницу код функции
echo '<div class="CodeText">';
$FileSpec=$SiteRoot.'/TPhpPrown/iniErrMessage.php';
$FileContent=file_get_contents($FileSpec);
$pattern="/\/\/\sМодуль([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)-:,=&;]+)\/\/\sisCalcInBrowser/u";
$replacement='// isCalcInBrowser';
$FileItog=preg_replace($pattern,$replacement,$FileContent);
// Преобразуем текст в раскрашенный код и показываем его
$FileCode=highlight_string($FileItog,true);
echo $FileCode;
echo '</div>';
?>
<?php
// <!-- --> *************** opredelit-obshchie-soobshcheniya-biblioteki.php ***
