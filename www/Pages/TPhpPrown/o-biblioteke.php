<?php
// PHP7                                                *** o-biblioteke.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown     Страница общего представления библиотеки TPhpPrown *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
// v1.0                                              Дата создания:  24.12.2019
// Copyright © 2019 tve                              Посл.изменение: 26.12.2019

// Определяем страничные константы
define ("Script", "o-biblioteke"); 
define ("Computer", "Computer"); // "Устройство, запросившее сайт - компьютер"  
define ("Mobile", "Mobile");     // "Устройство, запросившее сайт - смартфон"  
// Инициализируем корневой каталог 
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
// Подгружаем рабочие модули
require_once($SiteRoot.'/TPhpPrown/getSiteDevice.php');
require_once $SiteRoot."/TPhpPrown/getTranslit.php";
require_once $SiteRoot."/IniTPhpPrown.php";
$SiteDevice=prown\getSiteDevice();       // 'Computer','Mobile','Tablet'
// Формируем часть страницы с описанием функции
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Общее представление библиотеки TPhpPrown</title>
<meta name="description" content=
"Библиотека TPhpPrown - результат практического программирования сайтов на PHP. Каждая функция библиотеки выполняет свою прикладную задачу: проверяет какое-либо условие в свершившемся событии или какую-нибудь возможность для предстоящего действия, или выполняет само это действие, проверяет определенные характеристики или устанавливает некоторые значения.">
<meta name="keywords" content=                                          
"принцип программирования DO-or-TRY, делай или пробуй, TPhpPrown">

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(56869024, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56869024" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

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
   //$(".CodeText").doubleScroll({resetOnWindowResize:true});
});
</script>
</head>
<body>
<div id="AboutTPhpPrown">
<p><span class="letter">Б</span>иблиотека TPhpPrown возникла из практической работы - из вопросов и необходимостей, которые появлялись при программировании сайтов на PHP; из различий между 5 и 7 версиями, которые необходимо было обыгрывать.</p>
<p><span class="letter">К</span>аждая функция библиотеки выполняет свою прикладную задачу: проверяет какое-либо условие в свершившемся событии или какую-нибудь возможность для предстоящего действия и выполняет само это действие, проверяет определенные характеристики или устанавливает некоторые значения.</p>
<p><span class="letter">В</span> состав библиотеки кроме функций, выполняющих определенные задачи входят и вспомогательные модули - инициализации, которые содержат в себе, как на складе, общие для всех функций константы, переменные, сообщения и другие сущности.</p>
<blockquote>
<p>«Под прикладной задачей следует понимать сюжетную задачу, сформулированную в виде задачи-проблемы и удовлетворяющую следующим условиям:</p>
<p>вопрос должен быть поставлен в таком виде, в каком он обычно ставится на практике (решение имеет практическую значимость);</p>
<p>все величины (если они заданы) должны быть реальными, взятыми из жизни»</p>
<p>М.В. Крутихина</p>  
</blockquote>
<p><span class="letter">Ф</span>ункции разбиты на группы в зависимости от своего назначения, каждая группа выделяется префиксом в своем имени (префикс может и отсутствовать “по жизни” - в той ситуации, когда функция возникала, префикс не был очевиден).</p>
<h3>1. Общие (необязательные) префиксы и назначения функций:</h3>
<p><strong>is</strong> - функция проверяет некоторое условие и возвращает true или false (например: <span class="letter">isSubstrInUri</span> - проверяет присутствие фрагмента в поступившем запросе сайта; <span class="letter">isCalcInBrowser</span> - проверяет возможность выполнения функции Calc в CSS текущего браузера);</p>
<p><strong>get</strong> - функция возвращает характеристику некоторого объекта или получает значение в результате заданного действия (например: <span class="letter">getSiteDevice</span> - определяет тип устройства, с которого запрошен сайт; <span class="letter">getTranslit</span> - выполняет прикладную транслитерацию (tve) русских букв);</p>
<p><strong>Make</strong> - функция выполняет заданное действие и возвращает целочисленный признак состояния после этого действия (например: <span class="letter">MakeCookie</span> - устанавливает новое значение COOKIE в браузере и заменяет значение во внутреннем массиве $_COOKIE; <span class="letter">MakeRegExp</span> - отрабатывает регулярное выражение на тексте и трассирует разбор);</p>
<p><strong>View</strong> - функция представляет на экране сайта значения некоторого объекта (например: <span class="letter">ViewArray</span> - показывает содержимое простого массива; <span class="letter">ViewGlobal</span> - показывает значения глобальных переменных);</p>

<h3>2. Алфавитный список функций библиотеки и вспомогательных модулей/инициализаций:</h3>
<?php
TPhpPrownList();
?>
<h4 id="iscalcinbrowser"><a href="#iscalcinbrowser">isCalcInBrowser</a> - проанализировать UserAgent браузера по версиям родительских браузеров и определить работает ли функция Calc для CSS</h4>
<h4 id="makecookie"><a href="#makecookie">MakeCookie</a> - установить новое значение COOKIE в браузере, заменить это значение во внутреннем массиве $_COOKIE и установить новое значение переменной-кукиса в сценарии</h4>
<h4 id="makeregexp"><a href="#makeregexp">MakeRegExp</a> - отработать регулярное выражение на тексте и оттрассировать разбор. Рекомендуется использовать только для трассировки. Для выборки подстроки по регулярному выражению следует пользоваться другими функциями (например, Findes)</h4>
<h4 id="makesession"><a href="#makesession">MakeSession</a> - установить новое значение сессионной переменной и вернуть его для изменения глобальной переменной сайтовой страницы</h4>
<h4 id="maketype"><a href="#maketype">MakeType</a> - преобразовать значение к заданному типу</h4>
</div>
<?php
// <!-- --> ********************************************** o-biblioteke.php ***
