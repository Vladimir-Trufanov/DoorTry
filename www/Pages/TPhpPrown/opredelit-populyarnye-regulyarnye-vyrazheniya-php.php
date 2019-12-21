<?php
// PHP7           *** opredelit-populyarnye-regulyarnye-vyrazheniya-php.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown            Страница вспомогательного модуля iniRegExp- *
// *                           определить популярные регулярные выражения PHP *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  16.12.2019
// Copyright © 2019 tve                              Посл.изменение: 20.12.2019

// Определяем страничные константы
define ("Script", "opredelit-populyarnye-regulyarnye-vyrazheniya-php"); 
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
<title>iniRegExp - определить популярные регулярные выражения PHP</title>
<meta name="description" content=
"iniRegExp собирает в одном файле часто используемые регулярные выражения в 
библиотеке TPhpPrown и других PHP-сценариях">
<meta name="keywords" content=                                          
"iniRegExp,определить популярные регулярные выражения PHP,
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
// Инициируем двойную прокрутку
?>
<script>
$(document).ready(function(){
   $(".CodeText").doubleScroll({resetOnWindowResize:true});
});
</script>
</head>
<body>
<div class="TPhpPrown">
<h4 id="iniregexp">iniRegExp - определить популярные регулярные выражения PHP.</h4>
<h5><span class="letter">М</span>одуль собирает в одном файле часто используемые регулярные выражения в библиотеке TPhpPrown и других PHP-сценариях.</h5>
<h5><span class="letter">Б</span>ольшинство регулярных выражений не используют модификаторы, так как они  ориентированы на латинские символы и цифры.</h5>
<h5><span class="letter">В</span> тех случаях, когда используется кириллица в тексте поиска и в регулярном выражении (например, при поиске фамилии-инициалов), то употребляется модификатор “/u”.</h5>
<h5><span class="letter">П</span>ри отлавливании и проверке адреса электронной почты в регулярном выражении используется модификатор “/i”, заставляющий проверять и большие (верхнего регистра - прописные) буквы, и малые (нижнего регистра - строчные).</h5>
<?php
// Загружаем в страницу код функции
echo '<div class="CodeText">';
$FileSpec=$SiteRoot.'/TPhpPrown/iniRegExp.php';
$FileContent=file_get_contents($FileSpec);
//$pattern="/\/\/\sМодуль([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)-:,=&;]+)\/\/\s---/u";
//$pattern="/\/\/\sМодуль([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-:,=&;]+)строчные/u";
$pattern="/\/\/\sМодуль([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-:,=&;]+)\/\/\s\"дол/u";
$replacement='// "дол';
$FileItog=preg_replace($pattern,$replacement,$FileContent);
// Преобразуем текст в раскрашенный код и показываем его
$FileCode=highlight_string($FileItog,true);
echo $FileCode;
echo '</div>';
?>
<?php
// <!-- --> ***************** opredelit-obshchie-konstanty-i-peremennye.php ***
