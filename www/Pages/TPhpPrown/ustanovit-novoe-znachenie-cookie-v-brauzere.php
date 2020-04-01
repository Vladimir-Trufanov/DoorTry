<?php
// PHP7                 *** ustanovit-novoe-znachenie-cookie-v-brauzere.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown         Страница функции MakeCookie - установить новое *
// *                                     значение COOKIE в браузере, заменить *
// *              этим значением соответствующее данное во внутреннем массиве *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  30.03.2020
// Copyright © 2020 tve                              Посл.изменение: 30.03.2020

// Статистика ключевых слов:
//    "установка COOKIE"                            - x показов за декабрь 2019
//    "замена куки"                                  - x
//    "установить новый cookie"                      - x
//    "использование куки без перезагрузки страницы" - x

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName",  "ustanovit-novoe-znachenie-cookie-v-brauzere"); 
define ("FuncName",    "MakeCookie"); 
define ("Pattern",     "/\/\/\sФункция([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-_:,=&;}{]+)require_once\s\"C/u");
define ("Replacement", 'require_once "C');
//define ("Testing",     "Yes");
define ("Testing",     "No");
// Определяем SEO-теги
function SeoTags()
{
   echo '<title>MakeCookie - установить новое значение COOKIE в браузере</title>';
   echo '<meta name="description" content=
"MakeCookie устанавливает новое значение COOKIE в браузере, заменяет это 
значение во внутреннем массиве $_COOKIE и устанавливает новое значение 
переменной-кукиса в текущем сценарии PHP. Это действие позволяет использовать кукис
без перезагрузки страницы">';
   echo '<meta name="keywords" content=
"MakeCookie, установка COOKIE, замена куки, установить новый cookie, 
использование куки без перезагрузки страницы, принцип DOorTRY, делай или пробуй">';
}

function DescriptPart()
{
?>
<div class="TPhpPrown">
<h4 id="maketype">MakeCookie - установить новое значение COOKIE в браузере, 
заменить это значение во внутреннем массиве $_COOKIE и установить новое значение
переменной-кукиса в сценарии</h4>

<div class="TPrownAbz">

<p><span class="letter">Ф</span>ункция
установливает новое значение кукиса в браузере и синхронизирует это значение еще
с двумя объектами:</p>

<p><strong>а)</strong> обновляет значение данного кукиса в глобальном массиве 
<strong>$_COOKIE</strong>. Это действие позволяет использовать значение уже в 
текущем PHP-сценарии без перезагрузки страницы;</p>
<p><strong>б)</strong> возращает указанное значение по завершении работы для 
передачи его соответствующей переменной-кукису.</p> 
</p>

<p><span class="letter">В</span>озникновение ошибок при выполнении функции или 
отсутствие поддержки кукисов в браузере не влияет на установление значения 
переменой-кукиса на сервере и соответствующего значения в массиве $_COOKIE. 
Эти значения могут быть подтверждены при следующей загрузке страницы</p>
</div>
<p><strong>Синтаксис</strong></p>
<pre>$Result=MakeCookie($Name,$Value=null,$Type=tStr,$Init=false,$Duration=cook512,
   $Options=["path"=>"/","domain"=>"","secure"=>false,"httponly"=>false,"samesite"=>null],
   $ModeError=rvsTriggerError)</pre>

<p><strong>Параметры</strong></p>
<pre>
$Name - имя кукиса в браузере клиента (по имени кукиса можно формировать 
глобальную переменную сайтовой страницы добавлением префикса "с_". 
Например: "BrowEntry" --> "$с_BrowEntry");

$Value - значение кукиса браузера, это же значение во внутреннем массиве 
$_COOKIE и у соответствующей глобальной переменной сайтовой страницы. 
Если $Value=null или неопределено, то функция возвращает установленное 
значение кукиса;

$Type - константа, определяющая тип значения: tInt - integer, целое число 
(из множества {...,-2,-1,0,1,2,...}); tFloat - double, число с плавающей точкой;
tStr - string, набор символов=байт (256 различных значений); tBool - boolean, 
простейший тип, выражающие истинность значения. По умолчанию - tStr;

$Init = true, это означает, что требуется установить указанное значение кукиса, 
только в том случае, если кукиса еще не было. В обычных условиях (по умолчанию, 
когда $Init=false) значение кукиса меняется всегда;

$Duration - время жизни кукиса (по умолчанию 44236800 = 512 дней = 512д*24ч*60м*60с):

cook512=44236800,  время жизни кукиса составляет 512 дней;
cookSession=0,     время жизни кукиса - до завершения сеанса браузера;
cookDelete=-1,     кукис удалить по завершении сеанса браузера

$Options - дополнительные параметры (RFC6265bis), по умолчанию 
$Options = ["path"=>"/","domain"=>"","secure"=>false,"httponly"=>false,"samesite"=>null], где 

"path" - путь к каталогу на сервере, из которого будет доступен кукис; 
"domain" - домен, на котором возникает кукис; "secure" - указывает на то, что 
кукис должен передаваться от клиента по защищенному соединению; 
"httponly" - кукис будет доступен только через HTTP-протокол; 
"samesite" - режим связывания кукиса со сторонними сайтами (должен быть либо 
None, либо Lax, либо Strict)

$ModeError - режим вывода сообщений об ошибке (по умолчанию через исключение с 
пользовательской ошибкой на сайте doortry.ru):

rvsCurrentPos=-1,   в текущей позиции сайта; 
rvsTriggerError=0,  исключение с пользовательской ошибкой на подключенном сайте;  
rvsMakeDiv=1,       в дополнительном div-е для сообщения;   
rvsDialogWindow=2,  в диалоговом окне с помощью JQueryUI
</pre>
<p><strong>Возвращаемое значение</strong></p>
<pre>
$Result - установленное значение COOKIE в браузере, во внутреннем массиве
   $_COOKIE и переменной-кукиса в сценарии сайтовой страницы
</pre>
<p><strong>Зарегистрированные ошибки/исключения</strong></p>
<pre>
CantСookiesToType - "Невозможно привести кукис к указанному типу";
SendCookieFailed  - "Отправка кукиса потерпела неудачу";
</pre>
<p><strong>Замечания</strong></p>
<pre>
1. При изменении кукиса встроенной функцией PHP setcookie меняется только 
   значение кукиса в браузере, а его величина в массиве $_COOKIE в текущем 
   PHP-сценарии остается без изменения. Поэтому для синхронизации значений 
   (на сервере) следует использовать MakeCookie.
   
2. На 05.03.2020 в версии PHP 7.3.8 не удалось проверить действие параметра 
   "samesite". Не обнаруживаются константы None, Lax, Strict.
</pre>
</div>
<?php
}
// <!-- --> *************** ustanovit-novoe-znachenie-cookie-v-brauzere.php ***
