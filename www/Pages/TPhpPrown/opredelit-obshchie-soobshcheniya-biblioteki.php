<?php
// PHP7                 *** opredelit-obshchie-soobshcheniya-biblioteki.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown        Страница вспомогательного модуля iniErrMessage- *
// *                                    определить общие сообщения библиотеки *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  20.12.2019
// Copyright © 2019 tve                              Посл.изменение: 20.02.2020

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName", "opredelit-obshchie-soobshcheniya-biblioteki"); 
define ("FuncName",    "iniErrMessage"); 
define ("Pattern",     "/\/\/\sМодуль([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)-:,=&;]+)\/\/\sisCalcInBrowser/u");
define ("Replacement", "// isCalcInBrowser");
define ("Testing",     "No");

function SeoTags()
{
// Определяем SEO-теги
   echo '<title>iniErrMessage-определить общие сообщения библиотеки</title>';
   echo '<meta name="description" content=
"iniErrMessage определяет ошибочные сообщения и предупреждения всех 
функций библиотеки">';
   echo '<meta name="keywords" content=
"iniErrMessage,общие сообщения библиотеки,TPhpPrown,
принцип DO-or-TRY,делай или пробуй">';
}

function DescriptPart()
{
?>
<div class="TPhpPrown">
<h4 id="inierrmessage">iniErrMessage - определить общие сообщения библиотеки.</h4>
<h5><span class="letter">М</span>одуль собирает в одном файле константы, 
соответствующие пользовательским ошибочным сообщениям и предупреждениям 
со всех функций библиотеки.</h5><br>
</div>
<?php
}
// <!-- --> *************** opredelit-obshchie-soobshcheniya-biblioteki.php ***
