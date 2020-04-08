<?php
// PHP7                  *** otrabotat-regulyarnoe-vyrazhenie-na-tekste.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown    Страница функции MakeRegExp - Отработать регулярное *
// *                             выражение на тексте и оттрассировать разбор. *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  08.04.2020
// Copyright © 2020 tve                              Посл.изменение: 08.04.2020

// Определяем константу вызова страницы, имя файла, регулярку вырезания 
// фрагмента исх.текста, заместитель выреза и команду выполнения теста
define ("ScriptName",  "otrabotat-regulyarnoe-vyrazhenie-na-tekste"); 
define ("FuncName",    "MakeRegExp"); 
define ("Pattern",     "/\/\/\sMakeRegExp([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-_:,=&;}{]+)require_once\s\"iniC/u");
define ("Replacement", 'require_once "iniC');
define ("Testing", "Yes");
// Определяем SEO-теги
function SeoTags()
{
   echo '<title>MakeRegExp - отработать регулярное выражение на тексте и оттрассировать разбор</title>';
   echo '<meta name="description" content=
"Функция запускает указанное регулярное выражение по требуемому тексту и показывает все найденные 
фрагменты текста в соответствии с регулярным выражением. Она надстроена над функцией PHP: preg_match_all.">';
   echo '<meta name="keywords" content=
"makeregexp, отработать регулярное выражение, оттрассировать разбор регулярки,
принцип DOorTRY, делай или пробуй,TPhpPrown">';
}
// Выводим описание функции
function DescriptPart()
{
?>
<div class="TPhpPrown">
<h4 id="makeregexp">MakeRegExp - отработать регулярное выражение на тексте и оттрассировать разбор.</h4>
<div class="TPrownAbz">
<p><span class="letter">M</span>akeRegExp предназначена для проверки и отладки регулярных выражений. Она надстроена над функцией PHP: preg_match_all. Функция запускает указанное регулярное выражение по требуемому тексту и показывает все найденные фрагменты текста в соответствии с регулярным выражением.</p> 
<p><span class="letter">M</span>akeRegExp может использоваться для настройки функции Findes перед встраиваем её в код сценария PHP.</p>
</div>
<p><strong>Синтаксис</strong></p>
<pre>
$Result=MakeRegExp($pattern,$text,&$matches=null,$isTrass=mriIsDeprecated);
</pre>
<p><strong>Параметры</strong></p>
<pre>
$pattern - текст регулярного выражения;
$text    - текст, который должен быть обработан регулярным выражением;
$matches - массив найденных фрагментов и позиций их начала после работы
регулярного выражения (параметр по ссылке);
$isTrass - режим трассировки найденных соответствий регулярному выражению:

mriStandTracing - трассировка результатов стандартным выводом;
mriInstallTrace - установленная трассировка MakeRegExp;
mriTracingBlock - трассировка заблокирована;
mriIsDeprecated - разбор и сообщение устаревшего использования (по умолчанию).
</pre>
<p><strong>Возвращаемое значение</strong></p>
<pre>
$Result  - количество найденных соответствий регулярному выражению. 
$Result=0, если соответствий не найдено.
</pre>
<p><strong>Зарегистрированные ошибки/исключения</strong></p>
<pre>
FetchStrObsolete - "Устарела функция выборки подстроки MakeRegExp".
</pre>
</div>
<?php
}

// <!-- -->              *** otrabotat-regulyarnoe-vyrazhenie-na-tekste.php ***
