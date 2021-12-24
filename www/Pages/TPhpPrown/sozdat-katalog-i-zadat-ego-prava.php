<?php
// PHP7                            *** sozdat-katalog-i-zadat-ego-prava.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown             Страница функции CreateRightsDir - cоздать *
// *                     каталог (проверить существование) и задать его права *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  24.12.2021
// Copyright © 2019 tve                              Посл.изменение: 24.12.2021

// Статистика ключевых слов:
//    "преобразовать значение к заданному типу" - 4 показа за декабрь 2019
//    "как поменять тип переменной"             - 69
//    "функция преобразования типа переменной"  - 18
//    "преобразовать тип переменной"            - 62

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName", "sozdat-katalog-i-zadat-ego-prava"); 
define ("FuncName",    "CreateRightsDir"); 
define ("Pattern",     "/\/\/\sФу([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-_:,=&;}{]+)Синтаксис/u");
define ("Replacement", "// Синтаксис");
define ("Testing",     "Yes");
// Определяем SEO-теги
function SeoTags()
{
   echo '<title>CreateRightsDir - cоздать каталог и задать его права</title>';
   echo '<meta name="description" content=
"Функция CreateRightsDir создает каталог в файловой системе сервера (сайта) и
определяет права каталога для владельца, для его группы и всех остальных
пользователей. Если каталог уже существует, то функция только выполняет попытку 
переопределить права. В завершение работы функция сравнивает права, которые 
установились, с заявленными правами. Если желание не совпадает с фактом, то 
выдается сообщение об ошибке">';
   echo '<meta name="keywords" content=
"CreateRightsDir, создает каталог в файловой системе, как определить права каталога, 
функция создания каталога и определения прав, восьмеричное число для режима 
доступа к каталогу, TPhpPrown">';
}
// Выводим описательную часть страницы
function DescriptPart()
{
?>
<div class="TPhpPrown">
<h4 id="maketype">CreateRightsDir - создать каталог (проверить существование)
и задать его права</h4>
<div class="TPrownAbz">
<p><span class="letter">Ф</span>ункция CreateRightsDir создает каталог в файловой 
системе сервера (сайта) и определяет права каталога для владельца, для его группы 
и всех остальных пользователей.
</p>
<p>Если каталог уже существует, то функция только 
выполняет попытку переопределить права. В завершение работы функция сравнивает 
права, которые установились, с заявленными правами, а именно с правами, которые 
должны были установиться. Если желание не совпадает с фактом, то выдается 
сообщение об ошибке или формируется исключение.
</p>
<p>Имя каталога задается по спецификации, то есть 
имя задается вместе с относительным или абсолютным путем, например:
</p>
<p><span class="codestring">$imgDir="Gallery"; </span> здесь явно путь не указан, поэтому новый каталог "Gallery"
создается в каталоге из которого запущен текущий PHP-сценарий.<br>
<span class="codestring">$ImgDir=$_SERVER['DOCUMENT_ROOT'].'/Gallery'; </span> здесь новый каталог "Gallery"
создается в корневом каталоге сайта.
</p>
<p><span class="letter">П</span>рава определяются в 
<a href="https://www.php.net/manual/ru/function.chmod.php" title="chmod — Изменяет режим доступа к файлу"> традиционной 
нотации</a> через трех-четырехразрядное восьмеричное число, задающее режим 
доступа к каталогу для владельца каталога, для группы, в которую входит владелец,
и для прочих пользователей.</p>
<p>Права передаются через биты соответствующих 
<a href="http://f9r.ru/dostup.html" title="Права доступа - PHP начинающим">
восьмеричных разрядов числа:</a></p>

<table id="prava">
<tr> <th>OCT</th> <th>BIN</th> <th>Маска</th> <th>Права на каталог</th></tr> 
<tr> <td>0</td>   <td>000</td> <td>- - -</td> <td>доступ к каталогу и его подкаталогам запрещен, ничего нельзя делать</td></tr>
<tr> <td>1</td>   <td>001</td> <td>- - x</td> <td>можно выполнить двоичный файл о существовании которого известно пользователю, зайти или прочитать каталог запрещено</td></tr>
<tr> <td>2</td>   <td>010</td> <td>- w -</td> <td>отсутствие прав</td></tr>
<tr> <td>3</td>   <td>011</td> <td>- w x</td> <td>можно добавить, удалить, изменить файл каталога. Прочитать содержимое каталога невозможно</td></tr>
<tr> <td>4</td>   <td>100</td> <td>r - -</td> <td>можно прочитать содержимое каталога, узнать имена файлов, там лежащих</td></tr>
<tr> <td>5</td>   <td>101</td> <td>r - x</td> <td>можно зайти в каталог, прочитать его содержимое, посмотреть атрибуты файлов, удалять или добавлять файлы нельзя</td></tr>
<tr> <td>6</td>   <td>110</td> <td>r w -</td> <td>можно изменить файл каталога, удалять или добавлять файлы нельзя</td></tr>
<tr> <td>7</td>   <td>111</td> <td>r w x</td> <td>можно читать файлы, удалять их, добавлять новые, изменять файлы, сделать каталог текущим</td></tr>
</table>

<p><span class="letter">Д</span>ля полноценного просмотра каталога, необходимы 
права на чтение каталога и доступ к файлам, а главное к их атрибутам, то есть 
минимальные разумные права на каталог <strong>5 (r-x)</strong>. Прав <strong>4 
(r--)</strong> хватит только на просмотр имен файлов, без атрибутов и не будут 
известны ни размер файла, ни права доступа. На практике для каталогов используется 
только три режима: <strong>7 (rwx), 5 (r-x) и 0 (---)</strong>.
</p>

<p>Например, при вызове функции CreateRightsDir следующим образом:</p>

<span class="codestring"><p>
$ImgDir=$_SERVER['DOCUMENT_ROOT'].'/CreateRightsDir';<br>
$Result=prown\CreateRightsDir($ImgDir,0755,rvsReturn);
</p></span>
<p>установятся права: <span class="codestring">"d rwx r-x r-x".</span></p>

<p>Очень любопытный режим доступа к каталогу - 3 (-wx): 
он позволяет делать в директории все, что угодно, но не позволяет прочитать 
имена объектов. То есть если вам не известны названия объектов в этом каталоге, 
то вы сделать с ними ничего не сможете (даже удалить по маске *, так как маску не 
к чему применять - имена недоступны).
</p>

<p><span class="letter">П</span>ри работе с каталогами сервера, основанного на 
Unix, можно использовать старший четвертый восьмеричный разряд, управляя битами 
<strong><a
title="Права доступа Unix, SUID, SGID, Sticky биты" 
href="https://help.ubuntu.ru/wiki/%D1%81%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82%D0%BD%D1%8B%D0%B5_%D0%BF%D1%80%D0%B0%D0%B2%D0%B0_unix#%D0%BF%D1%80%D0%B0%D0%B2%D0%B0_%D0%B4%D0%BE%D1%81%D1%82%D1%83%D0%BF%D0%B0_unix_suid_sgid_sticky_%D0%B1%D0%B8%D1%82%D1%8B">
SUID, SGID, Sticky</a></strong>. 
</p>

<p>SUID (Set User ID - бит смены идентификатора пользователя) и SGID (Set Group 
ID - бит смены идентификатора группы). Если установить SGID для каталога, 
то все файлы созданные в нем при запуске будут принимать идентификатор группы
каталога, а не группы владельца, который создал файл в этом каталоге. 
Аналогично SUID. Одним словом, если пользователь поместил исполняемый файл в 
такой каталог, запустив его, процесс запустится от имени владельца (группы) 
каталога, в котором лежит этот файл.
</p>

<p>Установка Sticky-бита на каталог означает, что удалить файл из этого каталога 
сможет только владелец файла или суперпользователь. Другие пользователи 
лишаются права удалять файлы.
</p>

<p>Это правило будет действовать и при вызове функции CreateRightsDir с установкой
каждого бита <span class="codestring">"d rws rws rwt"</span> следующим образом:
</p>

<span class="codestring"><p>
$ImgDir=$_SERVER['DOCUMENT_ROOT'].'/CreateRightsDir';<br>
$Result=prown\CreateRightsDir($ImgDir,07777,rvsReturn);
</p></span>
</div>
</div>
<?php
}
// <!-- --> ************************** sozdat-katalog-i-zadat-ego-prava.php ***
