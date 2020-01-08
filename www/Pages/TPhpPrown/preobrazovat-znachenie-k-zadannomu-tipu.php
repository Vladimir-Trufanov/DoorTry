<?php
// PHP7                     *** preobrazovat-znachenie-k-zadannomu-tipu.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown              Страница функции MakeType - преобразовать *
// *                                                значение к заданному типу *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  08.01.2020
// Copyright © 2019 tve                              Посл.изменение: 08.01.2020

// Статистика ключевых слов:
//    "преобразовать значение к заданному типу" - 4 показа за декабрь 2019
//    "как поменять тип переменной"             - 69
//    "функция преобразования типа переменной"  - 18
//    "преобразовать тип переменной"            - 62

// Определяем страничные константы
define ("Script", "preobrazovat-znachenie-k-zadannomu-tipu"); 
define ("Computer", "Computer"); // "Устройство, запросившее сайт - компьютер"  
define ("Mobile", "Mobile");     // "Устройство, запросившее сайт - смартфон"  
define ("WasTest", "WasTest");   // "Тест уже запускался"
// Инициализируем корневой каталог 
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
// Подгружаем рабочие модули
require_once($SiteRoot.'/TPhpPrown/getSiteDevice.php');
require_once($SiteRoot.'/TPhpPrownTests/FunctionsBlock.php');
$SiteDevice=prown\getSiteDevice();       // 'Computer','Mobile','Tablet'
// Формируем часть страницы с описанием функции
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>MakeType - преобразовать значение к заданному типу</title>
<meta name="description" content=
"Функция MakeType преобразует переданное значение к заданному типу и 
возвращает его в соответствии с указанной константой типа как массив или 
объект, как набор символов, как целое или десятичное число, как логический тип 
или как переменная без значения">
<meta name="keywords" content=
"MakeType, преобразовать значение к заданному типу, как поменять тип переменной, 
функция преобразования типа переменной, преобразовать тип переменной, TPhpPrown">
<?php
// Подключаем jquery/jquery-ui
echo '<link rel="stylesheet" type="text/css" '. 
     'href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">';
echo '<script '.
     'src="https://code.jquery.com/jquery-3.3.1.min.js" '.
     'integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" '.
     'crossorigin="anonymous">'.
     '</script>';
echo '<script '.
     'src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" '.
     'integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" '.
     'crossorigin="anonymous">'.
     '</script>';
// Обеспечиваем двойной скролл для кода;
echo '<script src="/JS/jquery.doubleScroll.js"></script>';
// Подключаем особенности стиля для компьютерной и мобильной версий
if ($SiteDevice==Mobile) 
{   
   //echo '<script>alert("Mobile");</script>';
   echo '<link href="/Styles/TPhpPrownMobi.css" rel="stylesheet">';
}
else 
{   
   //echo '<script>alert("Computer");</script>';
   echo '<link href="/Styles/TPhpPrownComp.css" rel="stylesheet">';
}
// Подключаем JS-библиотеку
echo '<link href="/TJsPrown/TJsPrown.css" rel="stylesheet" type="text/css">'; 
echo '<script src="/TJsPrown/TJsPrown.js"></script>';
// Обрабатываем клик по кнопке для перезагрузки страницы с учетом .htaccess
if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
{
   ?><script>
   function isClick() 
   {
      DeleteCookie('WasTest');
      location.replace("<?php echo Script; ?>");
   }
   </script><?php
} 
else 
{
   ?><script>
   function isClick() 
   {
      DeleteCookie('WasTest');
      location.replace("<?php echo Script;?>"+".php");
   }
   </script><?php
}
// Инициируем двойную прокрутку и реакцию кнопки
?>
<script>
$(document).ready(function(){
   $(".CodeText").doubleScroll({resetOnWindowResize:true});
   $("#button").button();
});
</script>
</head>
<body>
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
</div>
<pre>
Функция MakeType преобразует переданное значение к заданному типу и 
возвращает его в соответствии с указанной константой типа:

tArr   - array, массив (упорядоченное соответствия значений и ключей);
tObj   - object, объект (представитель определённого класса);
tInt   - integer, целое число (из множества {...,-2,-1,0,1,2,...});
tFloat - double, число с плавающей точкой
tStr   - string, набор символов=байт (256 различных значений)
tBool  - boolean, простейший тип, выражающие истинность значения
tNull  - null, переменные без значения
</pre>
<p><strong>Синтаксис</strong></p>
<pre>$Result=MakeType($Value,$Type);</pre>
<p><strong>Параметры</strong></p>
<pre>
$Value  - значение переменной, которое следует привести к заданному типу;
$Type   - константа, определяющая тип значения: array, object, integer,
          double, string, boolean, null.
</pre>
<p><strong>Возвращаемое значение</strong></p>
<pre>
$Result - переданное значение функции заданного типа или null, если тип
          значения указан неверно
</pre>
<?php
// Загружаем в страницу код функции
echo '<div class="CodeText">';
$FileSpec=$SiteRoot.'/TPhpPrown/MakeType.php';
$FileContent=file_get_contents($FileSpec);
$pattern="/\/\/\sВ([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-_:,=&;}{]+)require/u";
$replacement='require';
$FileItog=preg_replace($pattern,$replacement,$FileContent);
// Преобразуем текст в раскрашенный код и показываем его
$FileCode=highlight_string($FileItog,true);
echo $FileCode;
echo '</div></div>';
// В компьютерной версии даем возможность запускать тест
if ($SiteDevice==Computer) 
{   
   // Размечаем низ страницы в случае, когда следует запустить тест
   // (то есть, когда кукис $_COOKIE['WasTest'] ещё не установлен):
   // так как теги </body> и </html> ставятся внутри теста, то закрываем
   // только <div class="TPhpPrown"> тегом </div> 
   if (!(IsSet($_COOKIE['WasTest'])))
   {
      //echo 'Кукиса WasTest нет';
      ?>
      <p><br><strong>Сообщения выполненного теста функции</strong></p>
      <script>
         setcookie("WasTest","<?php echo WasTest;?>");
      </script>
      <?php
      // Запускаем тестирование и трассировку выбранных функций
      require_once($SiteRoot.'/simpletest/autorun.php');
      require_once($SiteRoot.'/TPhpPrown/MakeType.php');
      require_once($SiteRoot.'/TPhpPrownTests/MakeType_test.php');
   }
   // Размечаем низ страницы в случае, когда устанавливаем кнопку для теста
   else
   {
      //echo $_COOKIE['WasTest'];
      ?>
      <button id="button" onclick="isClick()">Протестировать функцию!</button> 
      </body></html>
      <?php
   }
}
?>
<?php
// <!-- --> ******************* preobrazovat-znachenie-k-zadannomu-tipu.php ***
