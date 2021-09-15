<?php
// PHP7                  *** bajty-v-kilo-kibi-mega-mebibajty-i-obratno.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown       Изменить представление информации о размерности, *
// *            то есть пересчитать число байт в число килобайт или кибибайт, *
// *            мегабайт или мебибайт, ... или пересчитать в обратную сторону *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  14.09.2021
// Copyright © 2019 tve                              Посл.изменение: 14.09.2021

// Статистика ключевых слов:
//    "преобразовать значение к заданному типу" - 4 показа за декабрь 2019
//    "как поменять тип переменной"             - 69
//    "функция преобразования типа переменной"  - 18
//    "преобразовать тип переменной"            - 62

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName","bajty-v-kilo-kibi-mega-mebibajty-i-obratno"); 
define ("FuncName","RecalcSizeInfo"); 
define ("Pattern","/\/\/\sИнформация о ([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-_:,=&;}{]+)require_once 'iniC/u");
define ("Replacement","require_once 'iniC");
define ("Testing","Yes");
define ("SpecInfo","RecalcSizeInfo - изменить представление информации о размерности");
// Определяем SEO-теги
function SeoTags()
{
   echo '<title>'.SpecInfo.'</title>';
   echo '<meta name="description" content=
"Функция RecalcSizeInfo пересчитывает байты в килобайты, мегабайты, гигабайты и т.д.
согласно Международной системы единиц СИ (SI), а также в кибибайты и т.д. по 
стандарту Международной электротехнической комиссии - МЭК (IEC) или 
пересчитывает обратно в байты ">';
   echo '<meta name="keywords" content=
"RecalcSizeInfo,килобайт,мегабайт,гигабайт,терабайт,петабайт,эксабайт,зеттабайт,йоттабайт,
кибибайт,мебибайт,гибибайт,тебибайт,пебибайт,эксбибайт,зебибайт,йобибайт,TPhpPrown">';
}
// Выводим описательную часть страницы
function DescriptPart()
{
echo '<div class="TPhpPrown">';
echo '<h4 id="maketype">'.SpecInfo.'</h4>';
?>
<div class="TPrownAbz">
<p><span class="letter">И</span>нформация о размерности, заданная в байтах, 
может быть указана в других единицах. Стандарт Международной системы единиц СИ 
(SI) позволяет пересчитать размер, заданный в байтах, в другие единицы с учетом 
десятичной степени по следующей схеме:
</p>
<pre>
B    байт                 10^0 = 2^0
KB   килобайт   (Кбайт)   10^3      байт/1000
MB   мегабайт   (Mбайт)   10^6      байт/1000000
GB   гигабайт   (Гбайт)   10^9
TB   терабайт   (Tбайт)   10^12
PB   петабайт   (Пбайт)	  10^15
EB   эксабайт   (Эбайт)	  10^18
ZB   зеттабайт  (Збайт)   10^21	
YB   йоттабайт  (Ибайт)   10^24
</pre>
<p><span class="letter">И</span>нформация размерности, указанная в байтах, в 
соответствии со стандартами Международной электротехнической комиссии - МЭК 
(IEC) может быть указана в других единицах с учетом двоичной степени:
</p>
<pre>
KiB  кибибайт             2^10      байт/1024
MiB  мебибайт             2^20      байт/1048576
GiB  гибибайт             2^30           
TiB  тебибайт             2^40
PiB  пебибайт             2^50
EiB  эксбибайт            2^60
ZiB  зебибайт             2^70	
YiB  йобибайт             2^80
</pre>
<p><span class="letter">Ф</span>ункция RecalcSizeInfo изменяет представление 
информации о размерности, то есть пересчитывает число байт в число килобайт или 
кибибайт, мегабайт или мебибайт и так далее или пересчитывает размер в обратную 
сторону. 
</p>
</div>

<p><strong>Синтаксис</strong></p>
<pre>$Result=RecalcSizeInfo($Direct,$Unit,$Size,$Dim=0,$ModeError=rvsTriggerError);</pre>
<p><strong>Параметры</strong></p>
<pre>
$Direct - направление пересчета заданного значения: 
   cdiToBytes=1 - пересчитать килобайты или кибибайты и т.д. в байты; 
   cdiFromBytes=2 - пересчитать байты в килобайты или кибибайты, ...;
$Unit - единица измерения, от которой нужно произвести расчет в байтах или 
   к которой нужно привести исходную величину, заданную в байтах. Всего
   определено 17 единиц B,KB,MB,GB,TB,PB,EB,ZB,YB,KiB,MiB,GiB,TiB,PiB,EiB,ZiB,YiB;
$Size - исходная величина, которая требует пересчета;
$Dim - точность (количество десятичных разрядов) с которой должен быть 
   представлен результат (по умолчанию целочисленный результат);
$ModeError - режим вывода сообщений об ошибке (по умолчанию через 
   исключение с пользовательской ошибкой на сайте doortry.ru)
</pre>
<p><strong>Возвращаемое значение</strong></p>
<pre>
$Result - пересчитанное значение размерности (float); текст сообщения об ошибке 
(string) при $ModeError=rvsReturn или true/false в случае успешного/неуспешного 
выполнения функции при $ModeError<>rvsReturn
</pre>
<p><strong>Зарегистрированные ошибки/исключения</strong></p>
<pre>
RecalcDirectIncorrect - "Неверно указано направление пересчета";
UnitMeasureIncorrect  - "Неверно указана единица измерения"
</pre>
</div>
<?php
}
// <!-- --> **************** bajty-v-kilo-kibi-mega-mebibajty-i-obratno.php ***
