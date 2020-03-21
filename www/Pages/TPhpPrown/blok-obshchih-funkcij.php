<?php
// PHP7                                   *** blok-obshchih-funkcij.php.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown       Страница модуля CommonPrown - блок общих функций *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  21.03.2020
// Copyright © 2020 tve                              Посл.изменение: 21.03.2020

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName", "blok-obshchih-funkcij"); 
// FuncName="No", так как на странице должна быть только описательная часть
define ("FuncName", "CommonPrown"); 
define ("Pattern", "/\r\n\/\*\*([0-9a-zA-Zа-яёА-ЯЁ\[\]\*\s\.\$\n\r\(\)\"-:,=&;?]+)\*\*\/\r\n/u");
define ("Replacement", "");
define ("Testing", "No");

function SeoTags()
{
// Определяем SEO-теги
   echo '<title>CommonPrown - блок общих функций</title>';
   echo '<meta name="description" content=
"CommonPrown включает небольшие технологические функции, которые могут быть 
использованы при написании и отладке сайта на PHP.">';
   echo '<meta name="keywords" content=
"CommonPrown, вывод сообщений в браузере, выборка и проверка значений параметров 
GET и POST, вывод маленьких околонулевых чисел, определение версии PHP, 
TPhpPrown">';
}

function DescriptPart()
{
?>
<div class="TPhpPrown">
<h4 id="commonprown">CommonPrown - блок общих функций.</h4>
<div class="TPrownAbz">
<p>Программный модуль CommonPrown содержит в себе небольшие функции, которые могут быть использованы при написании сайта на PHP или в backend-разработке проекта.</p>

<p>Функции <span class="letter">Alert</span> и <span class="letter">ConsoleLog</span> выводят сообщения на странице в браузере. Alert выводит сообщение на экран и приостанавливает работу сайта. ConsoleLog может быть использована при динамической отладке сервера сайта. Она выводит сообщение в консоли браузера, не останавливая вывод на странице.</p>

<p>Функция <span class="letter">getAbove</span> по абсолютному пути каталога выделяет вышестоящий каталог. Как правило, используется для технического подъема по каталогам хостинга сайта, построенного на Windows IIS, Apache, Linux.</p>

<p>Две функции <span class="letter">getComRequest</span>, <span class="letter">isComRequest</span> позволяют выбирать или проверять значения параметров в GET или POST запросах, направляемых к сайту. По умолчанию предполагаются для проверки или выборки, так называемые команды в запросе к сайту, то есть параметры с именем "Com". Например, в запросе для сайта kwinflat.ru "показать справочник услуг", который выглядит следующим  образом: <strong><a href='https://kwinflat.ru/Main.php?Com=Uslugi' target='_blank'>https://kwinflat.ru/Main.php?Com=Uslugi</a></strong>, параметр "Com" имеет  значение "Uslugi".</p>

<p>Функция <span class="letter">getPhpVersion</span> формирует пятиразрядное число, указывающее на текущую версию интерпретатора PHP. Используется для управления кодом проекта на PHP в зависимости от версии.</p>

<p>Функции <span class="letter">NoSpace</span> и <span class="letter">NoZero</span> заменяют вывод околонулевых значений, то есть маленьких чисел в диапазоне [-0.0001, 0.0001] на пробел. Функция NoSpace дополнительно выводит указанное сообщение, если число вне диапазона околонулевых значений.</p>
</div>
</div>
<?php
}

// <!-- --> ************************************* blok-obshchih-funkcij.php ***
