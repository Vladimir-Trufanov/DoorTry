<?php
// PHP7/HTML5, EDGE/CHROME                                *** ProbaTest.php ***

// ****************************************************************************
// * DoorTry                                   Заготовка для пробной страницы *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 07.12.2019

// Инициализируем корневой каталог сайта, надсайтовый каталог и каталог хостинга
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
require_once $SiteRoot."/iGetAbove.php";
$SiteAbove = iGetAbove($SiteRoot);      // Надсайтовый каталог
$SiteHost = iGetAbove($SiteAbove);      // Каталог хостинга


?>
<!DOCTYPE html>
<html>
<head>
<title>Findes - выбрать из строки подстроку, соответствующую регулярному выражению</title>
<meta charset="utf-8">
</head>
<body>
<h4 id="findes">Findes - выбрать из строки подстроку, соответствующую регулярному выражению.</h4>
<h5>Функция выполняет конкретную и часто возникающую задачу - выбрать из строки подстроку по заданному регулярному выражению и узнать её начальную позицию в этой строке.</h5>
<h5>Функция возвращает первое или единственное вхождение подстроки в исходной строке, а в случае неудачи возвращает пустую строку.</h5>
<h5 id="vers">v1.1, 02.04.2019-23.05.2019</h5>
<p><strong>Синтаксис</strong></p>
<pre><code>$Result=Findes($preg,$string,&amp;$point)
</code></pre>
<p><strong>Параметры</strong></p>
<pre><code>$preg   - текст регулярного выражения;
$string - текст, который должен быть обработан регулярным выражением;
$point  - позиция начала найденного фрагмента после работы регулярного 
выражения (параметр по ссылке). $point=-1, если фрагмент не найден.
</code></pre>
<p><strong>Возвращаемое значение</strong></p>
<pre><code>$Result  - найденный фрагментов после работы регулярного выражения или
пустая строка, если фрагмент не найден.
</code></pre>

<?php
echo '<div id="CodeFunction"';
$f2=$SiteRoot.'/TPhpPrown/Findes.php';
$stx=show_source($f2,true);
echo $stx;
echo '</div>';
?>
<?php
// Запускаем тестирование и трассировку выбранных функций
require_once($SiteRoot.'/simpletest/autorun.php');
require_once($SiteRoot.'/TPhpPrown/Findes.php');
require_once($SiteRoot.'/TPhpPrownTests/FunctionsBlock.php');
$ModeError=-1;
require_once($SiteRoot.'/TPhpPrownTests/Findes_test.php');
?>
<!-- 
</body> 
</html>
-->
<?php
// <!-- --> ************************************************* ProbaTest.php ***