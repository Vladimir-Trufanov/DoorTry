<?php
// PHP7                *** opredelit-rabotaet-li-funkciya-calc-dlya-css.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown         Страница функции MakeCookie - проанализировать *
// *                               UserAgent браузера по версиям родительских *
// *                  браузеров и определить работает ли функция Calc для CSS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  03.01.2020
// Copyright © 2020 tve                              Посл.изменение: 20.02.2020

// Статистика ключевых слов:
//    "какие браузеры поддерживают функцию calc" - 0 показов за декабрь 2019
//    "функция calc для css"                     - 18
//    "поддержка функции Calc"                   - 7
//    "возможности функции Calc"                 - 14

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName", "opredelit-rabotaet-li-funkciya-calc-dlya-css"); 
define ("FuncName",    "isCalcInBrowser"); 
define ("Pattern",     "/\/\/\sСинтаксис:([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-:,=&;]+)require/u");
define ("Replacement", "require");
define ("Testing",     "Yes");
// Определяем SEO-теги
function SeoTags()
{
   echo '<title>isCalcInBrowser - по UserAgent определить работает ли функция Calc для CSS</title>';
   echo '<meta name="description" content=
"isCalcInBrowser определяет возможность использования в браузере функция Calc 
для CSS. Для этого функция анализирует номера версий браузеров, указанные в UserAgent">';
   echo '<meta name="keywords" content=
"isCalcInBrowser, какие браузеры поддерживают функцию calc, функция calc для css, 
поддержка функции Calc, возможности функции Calc, TPhpPrown">';
}
// Выводим описательную часть страницы
function DescriptPart()
{
?>
<div class="TPhpPrown">
<h4 id="iscalcinbrowser">isCalcInBrowser - проанализировать UserAgent браузера 
по версиям родительских браузеров и определить работает ли функция Calc для CSS.</h4>

<h5><span class="letter">I</span>sCalcInBrowser указывает о возможности работы
   функция Calc в CSS, просматривая содержимое строки UserAgent, перебирая 
   список родительских браузеров и анализируя их версии.</h5> 
<blockquote>
<p>Родительскими браузерами в функции isCalcInBrowser называются наименования
   браузеров, которые упоминает разработчик в строке UserAgent текущего
   браузера, то есть того, который показывает в текущий момент страницу сайта.</p>
</blockquote>
<h5><span class="letter">П</span>осле приоритетного анализа версий браузеров
   принимается решение о наличии функции Calc в CSS  по следующему правилу:</h5>
<h5>а) вначале проверяем по браузеру Chrome. Если он указан и версия больше 55, 
   то Calc работает, иначе смотрим дальше;</h5>
<h5>б) проверяем по браузеру Safari. Если он указан и версия больше 537.35, 
   то Calc работает, иначе смотрим дальше;</h5>
<h5>в) проверяем по браузеру Firefox. Если он есть и версия больше 30, 
   то Calc работает;</h5>
<h5>г) в остальных случаях считаем, что Calc не работает.</h5>
<h5><span class="letter">В</span> случае противоречивой информации, например 
   для UserAgent: <em><strong>Mozilla/5.0 (Windows NT 6.1; Win64; x86) 
   AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36</strong></em> 
   определится, что функция Calc работает по Safari/537.36  
   (хотя по Chrome/55.0.2883.87 этого не следует).</h5>
<p><strong>Синтаксис</strong></p>
<pre>
$Result=isCalcInBrowser($UserAgent,$ModeError=rvsCurrentPos);
</pre>
<p><strong>Параметры</strong></p>
<pre>
$UserAgent - UserAgent браузера.
$ModeError - режим вывода сообщений об ошибке (по умолчанию - в текущей позиции сайта)
</pre>
<p><strong>Возвращаемое значение</strong></p>
<pre>
$Result=true, если версии UserAgent показывают о возможности работы функция Calc в CSS.
</pre>
<p><strong>Зарегистрированные ошибки/исключения:</strong></p>
<pre>
ManyBrowsersRec - "В UserAgent присутствует несколько браузеров";
InverBrowsers   - "Неверная или отсутствует версия браузера".
</pre>
<p><strong>Фрагменты содержимого UserAgent некоторых браузеров на 13.02.2019 
   и возможность работы функция Calc в CSS:</strong></p>
<pre>
Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML,like Gecko)	

Chrome/56.0.2924.92  Safari/537.36                                   Орбитум  +
Сhrome/61.0.3163.69  Safari/537.36 Freeu/61.0.3163.69                  Freeu  +
Chrome/61.0.3163.79  Safari/537.36 Maxthon/5.2.6.1000                Maxthon  +
Chrome/61.0.3163.125 Safari/537.36 Amigo/61.0.3163.125                 Amigo  +
Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134                        Edge  +
Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.116                   Opera  +
Chrome/71.0.3578.98  Safari/537.36                                    Chrome  +
Chrome/71.0.3578.99  Safari/537.36 YaBrowser/19.1.0.2644              Yandex  +
		
Safari/534.57.2                                                       Safari  -
Safari/537.21        QupZilla/1.8.6                                 QupZilla  -
		
Firefox/31.0         K-Meleon/75.1                                  K-Meleon  +
Firefox/65.0                                                         Firefox  +

Trident/7.0                                                            Avant  -
</pre>
</div>
<?php
}
// <!-- --> ************** opredelit-rabotaet-li-funkciya-calc-dlya-css.php ***
