<?php
// PHP7                   *** ustanovit-znachenie-sessionnoj-peremennoj.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown        Страница функции MakeSession - установить новое *
// *                         значение сессионной переменной и вернуть его для *
// *                        изменения глобальной переменной сайтовой страницы *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  22.10.2020
// Copyright © 2020 tve                              Посл.изменение: 22.10.2020

// Статистика ключевых слов:
//    "сессионная переменная"                        - x показов за ноябрь 2020
//    "массив $_SESSION"                             - x
//    "установить новое значение в сессии"           - x
//    "время жизни сессионной переменной"            - x

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName", "ustanovit-znachenie-sessionnoj-peremennoj"); 
// FuncName="No", так как на странице должна быть только описательная часть
define ("FuncName",    "MakeSession"); 
define ("Pattern",     "/\/\*\*([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\*\"-_:,=&;]+)require_once/u");
define ("Replacement", "require_once");
define ("Testing", "No");

function SeoTags()
{
// Определяем SEO-теги
   echo '<title>MakeSession - установить значение сессионной переменной</title>';
   echo '<meta name="description" content=
"MakeSession устанавливает по заданному имени новое значение элемента в массиве 
$_SESSION на сервере и возвращает это значение для записи в локальную 
переменную">';
   echo '<meta name="keywords" content=
"MakeSession,сессионная переменная,массив $_SESSION,установить новое значение
в сессии,время жизни сессионной переменной,
принцип DO-or-TRY,делай или пробуй,TPhpPrown">';
}

function DescriptPart()
{
?>
<div class="TPhpPrown">
<h4 id="makesession">MakeSession - установить по заданному имени новое значение
сессионной переменной на сервере (элемента в массиве $_SESSION) и вернуть это
значение для записи в локальную переменную.</h4>

<div class="TPrownAbz">
<p><span class="letter">Ф</span>ункция установливает по заданному имени новое 
значение соответствующей глобальной сессионной переменной (то есть элемента в 
массиве $_SESSION) и возвращает это значение наружу в модуль, вызвавший 
функцию. Снаружи данное значение записывается в локальную переменную.</p>

<p><span class="letter">С</span>тиль программирования с использованием 
библиотеки TPhpPrown рекомендует в коде использовать локальные сессионные 
переменные, которым назначаются имена с префиксом "s_", предполагая неявное 
хранение их значений на сервере в массиве $_SESSION. Например, по заданному 
имени "Counter" устанавливается локальная переменная $s_Counter и глобальная 
в массиве $_SESSION["Counter"].</p>

<p><span class="letter">И</span>ногда требуется установить значение только для 
несуществующей сессионной переменной для того, чтобы инициировать определенные 
действия. В этом случае функция предлагает параметр $Init с указанием значения 
true.</p>

<p><span class="letter">В</span>ремя жизни сессионной переменной, как правило, 
совпадает со временем, в течение которого у пользователя открыт браузер. Кроме 
этого для каждого сайта включается тайм-аут, по умолчанию равный 24 минутам.
Если в течение этого времени никаких действий на сайте не происходит (а браузер
продолжает быть открытым), то сессия завершается и умирают сессионные 
переменные. Это время может быть изменено на сервере в настройках PHP.</p>
</div>

<p><strong>Синтаксис</strong></p>
<pre>$Result=MakeSession($Name,$Value,$Type,$Init=false);</pre>

<p><strong>Параметры</strong></p>
<pre>
$Name  - имя сессионной переменной (по имени сессионной переменной 
   формируется глобальная переменная сайтовой страницы и соответствующая
   локальная переменная с добавлением префикса "s_"). 
   Например: $Name="Counter" --> $_SESSION["Counter"] --> $s_Counter;

$Value - значение сессионной переменной и соответствующей глобальной
   переменная сайтовой страницы;

$Type  - константа, определяющая тип значения: array, object, integer,
   double, string, boolean, null.

$Init  = true, это означает, что требуется установить указанное значение 
   сессионной переменной, только в том случае, если её еще не было. 
   Обычно (по умолчанию, когда $Init=false) значение переменной меняется 
   всегда.
</pre>

<p><strong>Возвращаемое значение</strong></p>
<pre>
$Result  - установленное значение заданного элемента глобального массива
   $_SESSION на сервере сайта и соответствующей локальной сессионной
   переменной сайтовой страницы;
</pre>
</div>
<?php
}

// <!-- --> ***************** ustanovit-znachenie-sessionnoj-peremennoj.php ***
