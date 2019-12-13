<?php
// PHP7/HTML5, EDGE/CHROME                                  *** _Findes.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown            Страница функции Findes - выбрать из строки *
// *                         подстроку, соответствующую регулярному выражению *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.12.2019
// Copyright © 2019 tve                              Посл.изменение: 11.12.2019

// Подгружаем рабочие модули
define ("Computer", "Computer"); // "Устройство, запросившее сайт - компьютер"  
define ("Mobile", "Mobile");     // "Устройство, запросившее сайт - смартфон"  
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
require_once($SiteRoot.'/simpletest/autorun.php');
require_once($SiteRoot.'/TPhpPrown/getSiteDevice.php');
require_once($SiteRoot.'/TPhpPrownTests/FunctionsBlock.php');
$SiteDevice=prown\getSiteDevice();       // 'Computer','Mobile','Tablet'
// Формируем часть страницы с описанием функции
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Findes - выбрать из строки подстроку, соответствующую регулярному выражению</title>
<meta name="description" content=
"Findes выбирает из строки подстроку по заданному регулярному выражению и узнаёт
её начальную позицию в этой строке. Функция возвращает первое или единственное 
вхождение подстроки в исходной строке, а в случае неудачи возвращает пустую строку">
<meta name="keywords" content=
"findes,выбрать соответствующую регулярному выражению подстроку,
принцип DO-or-TRY, делай или пробуй">

<?php
if ($SiteDevice==Mobile) 
{   
   //echo '<script>alert("Mobile");</script>';
   echo '<link href="TPhpPrownMobi.css" rel="stylesheet">';
}
else 
{   
   //echo '<script>alert("Computer");</script>';
   echo '<link href="TPhpPrownComp.css" rel="stylesheet">';
}
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
echo '<script>'.'$(document).ready(function(){
   $(".CodeText").doubleScroll({resetOnWindowResize:true});
});'.'</script>';

?>
</head>
<body>
<div class="TPhpPrown">
<h4 id="findes">Findes - выбрать из строки подстроку, соответствующую 
регулярному выражению.</h4>
<h5>Функция выполняет конкретную и часто возникающую задачу - выбрать из строки 
подстроку по заданному регулярному выражению и узнать её начальную позицию 
в этой строке.</h5> 
<h5>Findes возвращает первое или единственное вхождение подстроки в исходной 
строке, а в случае неудачи возвращает пустую строку.</h5>
<h5>Через третий параметр функция по ссылке возвращает позицию найденного 
фрагмента, начиная с нулевого значения, или -1, если фрагмент не найден.</h5>
<p><strong>Синтаксис</strong></p>
<pre>
$Result=Findes($preg,$string,&amp;$point)
</pre>
<p><strong>Параметры</strong></p>
<pre>
$preg   - текст регулярного выражения;
$string - текст, который должен быть обработан регулярным выражением;
$point  - позиция начала найденного фрагмента после работы регулярного 
выражения (параметр по ссылке). $point=-1, если фрагмент не найден.
</pre>
<p><strong>Возвращаемое значение</strong></p>
<pre>
$Result  - найденный фрагментов после работы регулярного выражения или
пустая строка, если фрагмент не найден.
</pre>
<p><br><strong>Программный текст</strong></p>
<?php
// Загружаем в страницу код функции
echo '<div class="CodeText">';
$f2=$SiteRoot.'/TPhpPrown/Findes.php';
$stx=show_source($f2,true);
echo $stx;
echo '</div>';
?>
<p><br><strong>Сообщения выполненного теста функции</strong></p>
<?php
// Запускаем тестирование и трассировку выбранных функций
$ModeError=-1;
require_once($SiteRoot.'/TPhpPrown/Findes.php');
require_once($SiteRoot.'/TPhpPrownTests/Findes_test.php');
?>
</div>
<!-- 
</body> 
</html>
-->
<?php
// <!-- --> ************************************************* ProbaTest.php ***
