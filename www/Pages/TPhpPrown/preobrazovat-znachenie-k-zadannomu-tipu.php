<?php
// PHP7                     *** preobrazovat-znachenie-k-zadannomu-tipu.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown              Страница функции MakeType - преобразовать *
// *                                                значение к заданному типу *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  08.01.2020
// Copyright © 2019 tve                              Посл.изменение: 20.02.2020

// Статистика ключевых слов:
//    "преобразовать значение к заданному типу" - 4 показа за декабрь 2019
//    "как поменять тип переменной"             - 69
//    "функция преобразования типа переменной"  - 18
//    "преобразовать тип переменной"            - 62

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName", "preobrazovat-znachenie-k-zadannomu-tipu"); 
define ("FuncName",    "MakeType"); 
define ("Pattern",     "/\/\/\sВ([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-_:,=&;}{]+)require_once 'iniC/u");
define ("Replacement", "require_once 'iniC");
define ("Testing",     "Yes");
// Определяем SEO-теги
function SeoTags()
{
   echo '<title>MakeType - преобразовать значение к заданному типу</title>';
   echo '<meta name="description" content=
"Функция MakeType преобразует переданное значение к заданному типу и 
возвращает его в соответствии с указанной константой типа. Функция унифицирует 
способ преобразования для четырех типов данных:
tInt - integer, целое число (из множества {...,-2,-1,0,1,2,...});
tFloat - double, число с плавающей точкой;
tStr - string, набор символов=байт (256 различных значений);
tBool - boolean, простейший тип, выражающие истинность значения.">';
   echo '<meta name="keywords" content=
"MakeType, преобразовать значение к заданному типу, как поменять тип переменной, 
функция преобразования типа переменной, преобразовать тип переменной, TPhpPrown">';
}
// Выводим описательную часть страницы
function DescriptPart()
{
?>
<div class="TPhpPrown">
<h4 id="maketype">MakeType - преобразовать переданное значение к заданному типу</h4>
<div class="TPrownAbz">
<p><span class="letter">В</span> PHP не требуется строгого определения типа переменной.
Каждая переменная может поменять свой тип в зависимости от контекста кода. Это 
и плохо и хорошо. Хорошо то, что в большинстве случаев можно не думать о типе 
переменной, но существуют ситуации, когда такая универсальность вызывает 
многозначные толкования и может быть источником ошибок. Это плохо. Например: при 
формировании упорядоченных списков или массивов, или когда требуется работа с 
размерностями в числах с плавающей точкой (и в других случаях, когда PHP требует
точного указания типа переменной).
</p>
<p><span class="letter">В</span> этих случаях можно воспользоваться 
<a href="https://www.php.net/manual/ru/language.types.type-juggling.php#language.types.typecasting">
процедурой приведения типов</a> или употребить функцию <strong>MakeType</strong>. Что применять
определяется требованиями Вашего стиля программирования.</p>
<p><span class="letter">Ф</span>ункция MakeType унифицирует способ преобразования 
для четырех типов данных: <strong>tInt</strong> - integer, целое число 
(из множества {...,-2,-1,0,1,2,...}); <strong>tFloat</strong> - double, число с
плавающей точкой; <strong>tStr</strong> - string, набор символов=байт (256 
различных значений); <strong>tBool</strong> - boolean, простейший тип, 
выражающий истинность значения.</p>
<p><span class="letter">З</span>десь переданное значение приводится к заданному 
типу и возвращается в соответствии с указанной константой типа. Если преобразование
невозможно, то возвращается null вместе с сообщением о неблагоприятном исходе 
преобразования.</p>
</div>
<p><strong>Синтаксис</strong></p>
<pre>$Result=MakeType($Value,$Type,$ModeError=rvsTriggerError);</pre>
<p><strong>Параметры</strong></p>
<pre>
$Value - значение переменной, которое следует привести к заданному типу;
$Type - константа, определяющая тип значения: integer, double, string,
   boolean.
$ModeError - режим вывода сообщений об ошибке (по умолчанию через 
   исключение с пользовательской ошибкой на сайте doortry.ru)
</pre>
<p><strong>Возвращаемое значение</strong></p>
<pre>
$Result - значение, переданное функции и преобразованное к заданному типу
   или null, если тип значения указан неверно или преобразование невозможно
</pre>
<p><strong>Зарегистрированные ошибки/исключения</strong></p>
<pre>
ConversNotPossible - "Тип значения указан неверно или преобразование невозможно";
</pre>
</div>
<?php
}
// <!-- --> ******************* preobrazovat-znachenie-k-zadannomu-tipu.php ***
