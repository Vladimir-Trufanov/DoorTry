<?php
// PHP7                   *** opredelit-obshchie-konstanty-i-peremennye.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown          Страница вспомогательного модуля iniConstMem- *
// *                       определить общие константы и переменные библиотеки *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  16.12.2019
// Copyright © 2019 tve                              Посл.изменение: 20.12.2019

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName", "opredelit-obshchie-konstanty-i-peremennye"); 
// FuncName="No", так как на странице должна быть только описательная часть
define ("FuncName",    "iniConstMem"); 
define ("Pattern",     "/\/\/\sМодуль([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)-:,=&;]+)\/\/\s---/u");
define ("Replacement", "// ---");
define ("Testing", "No");

function SeoTags()
{
// Определяем SEO-теги
   echo '<title>iniConstMem - определить общие константы и переменные библиотеки</title>';
   echo '<meta name="description" content=
"iniConstMem определяет общие константы и переменные библиотеки TPhpPrown: для 
указания режимов вывода сообщений, определения типов переменных, используемых 
в библиотеке">';
   echo '<meta name="keywords" content=
"iniConstMem,определить общие константы и переменные библиотеки,
принцип DO-or-TRY,делай или пробуй,TPhpPrown">';
}

function DescriptPart()
{
?>
<div class="TPhpPrown">
<h4 id="iniconstmem">iniConstMem - определить общие константы и переменные библиотеки.</h4>
<h5><span class="letter">М</span>одуль определяет общие константы (а также переменные), которые используются в различных функциях библиотеки и в вызывающих их внешних программах, и сценариях.</h5>
<h5><span class="letter">П</span>ервая группа констант используются для указания режимов вывода сообщений библиотеки. TPhpPrown позволяет выводить сообщения четырьмя способами:</h5>
<h5>в текущей позиции сайта,</h5>
<h5>через исключение с пользовательской ошибкой,</h5>
<h5>в дополнительном блоке для сообщения (в дополнительном div-е),</h5>
<h5>в диалоговом окне с помощью jQueryUi.</h5>
<h5><span class="letter">В</span>торая группа констант определяет семь типов переменных, используемых в библиотеке.</h5>
<br>
</div>
<?php
}

// <!-- --> ***************** opredelit-obshchie-konstanty-i-peremennye.php ***
