<?php
// PHP7           *** opredelit-populyarnye-regulyarnye-vyrazheniya-php.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown            Страница вспомогательного модуля iniRegExp- *
// *                           определить популярные регулярные выражения PHP *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  16.12.2019
// Copyright © 2019 tve                              Посл.изменение: 20.02.2020

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName", "opredelit-populyarnye-regulyarnye-vyrazheniya-php"); 
define ("FuncName",    "iniRegExp"); 
define ("Pattern",     "/\/\/\sМодуль([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-:,=&;]+)\/\/\s\"дол/u");
define ("Replacement", '// "дол');
define ("Testing",     "No");

function SeoTags()
{
// Определяем SEO-теги
   echo '<title>iniRegExp - определить популярные регулярные выражения PHP</title>';
   echo '<meta name="description" content=
"iniRegExp собирает в одном файле часто используемые регулярные выражения в 
библиотеке TPhpPrown и других PHP-сценариях">';
   echo '<meta name="keywords" content=
"iniRegExp,определить популярные регулярные выражения PHP,
принцип DO-or-TRY,делай или пробуй,TPhpPrown">';
}

function DescriptPart()
{
?>
<div class="TPhpPrown">
<h4 id="iniregexp">iniRegExp - определить популярные регулярные выражения PHP.</h4>
<h5><span class="letter">М</span>одуль собирает в одном файле часто используемые
   регулярные выражения в библиотеке TPhpPrown и других PHP-сценариях.</h5>
<h5><span class="letter">Б</span>ольшинство регулярных выражений не используют 
   модификаторы, так как они  ориентированы на латинские символы и цифры.</h5>
<h5><span class="letter">В</span> тех случаях, когда используется кириллица в 
   тексте поиска и в регулярном выражении (например, при поиске фамилии-инициалов), 
   то употребляется модификатор “/u”.</h5>
<h5><span class="letter">П</span>ри отлавливании и проверке адреса электронной 
   почты в регулярном выражении используется модификатор “/i”, заставляющий 
   проверять и большие (верхнего регистра - прописные) буквы, 
   и малые (нижнего регистра - строчные).</h5>
</div>
<br>
<?php
}
// <!-- --> ***************** opredelit-obshchie-konstanty-i-peremennye.php ***
