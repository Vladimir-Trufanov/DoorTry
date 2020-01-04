<?php
// PHP7   *** po-useragent-opredelit-rabotaet-li-funkciya-calc-dlya-css.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown    Страница функции isCalcInBrowser - проанализировать *
// *                   UserAgent браузера по версиям родительских браузеров и *
// *                              определить работает ли функция Calc для CSS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  03.01.2020
// Copyright © 2020 tve                              Посл.изменение: 03.01.2020

// Определяем страничные константы
define ("Script", "po-useragent-opredelit-rabotaet-li-funkciya-calc-dlya-css"); 
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
<title>isCalcInBrowser - по UserAgent определить работает ли функция Calc для CSS</title>
<meta name="description" content=
"Функция isCalcInBrowser указывает о возможности работы функция Calc в CSS, 
просматривая содержимое строки UserAgent, перебирая названия браузеров и 
проверяя их версии">
<meta name="keywords" content=
"isCalcInBrowser, определить работает ли функция Calc в CSS, принцип DO-or-TRY, 
делай или пробуй, TPhpPrown">
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
     'src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"'.
     'integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" '.
     'crossorigin="anonymous">'.
     '</script>';
// Обеспечиваем двойной скролл для кода;
echo '<script type="text/javascript" src="/JS/jquery.doubleScroll.js"></script>';
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
<h4 id="iscalcinbrowser">isCalcInBrowser - проанализировать UserAgent браузера 
по версиям родительских браузеров и определить работает ли функция Calc для CSS.</h4>

<h5><span class="letter">Ф</span>ункция isCalcInBrowser указывает о возможности работы функция Calc в CSS, просматривая содержимое строки UserAgent, перебирая имена всех родительских браузеров и проверяя их версии.</h5> 
<blockquote>
<p>Родительскими браузерами в функции isCalcInBrowser называются наименования браузеров, которые упоминает разработчик в строке UserAgent текущего браузера, то есть того, который показывает в текущий момент страницу сайта.</p>
</blockquote>

<h5><span class="letter">П</span>осле приоритетного анализа версий браузеров принимается решение о наличии функции Calc в CSS  по следующему правилу:</h5>
<h5>а) вначале проверяем по браузеру Chrome. Если он указан и версия больше 55, то Calc работает, иначе смотрим дальше;</h5>
<h5>б) проверяем по браузеру Safari. Если он указан и версия больше 537.35, то Calc работает, иначе смотрим дальше;</h5>
<h5>в) проверяем по браузеру Firefox. Если он есть и версия больше 30, то Calc работает;</h5>
<h5>г) в остальных случаях считаем, что Calc не работает.</h5>
<h5><span class="letter">В</span> случае противоречивой информации, например для UserAgent: <em><strong>Mozilla/5.0 (Windows NT 6.1; Win64; x86) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36</strong></em> определится, что функция Calc работает по Safari/537.36  (хотя по Chrome/55.0.2883.87 этого не следует).</h5>
<p><strong>Синтаксис</strong></p>
<pre>
$Result=isCalcInBrowser($UserAgent,$ModeError=rvsCurrentPos);
</pre>
<p><strong>Параметры</strong></p>
<pre>
$UserAgent - UserAgent браузера.
$ModeError - режим вывода сообщений об ошибке (по умолчанию в текущей позиции сайта)
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
<p><strong>Фрагменты содержимого UserAgent некоторых браузеров на 13.02.2019 и возможность работы функция Calc в CSS:</strong></p>
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
<?php
// Загружаем в страницу код функции
echo '<div class="CodeText">';
$FileSpec=$SiteRoot.'/TPhpPrown/isCalcInBrowser.php';
$FileContent=file_get_contents($FileSpec);
//echo mb_detect_encoding($FileContent).'<br>';
//echo '---<br>'.$FileContent.'<br>---<br>';
// Вырезаем комментарий, который уже представлен
$pattern="/\/\/\sСинтаксис:([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-:,=&;]+)require/u";
$replacement='require';
$FileItog=preg_replace($pattern,$replacement,$FileContent);
// Преобразуем текст в раскрашенный код и показываем его
$FileCode=highlight_string($FileItog,true);
echo $FileCode;
echo '</div>';
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
      require_once($SiteRoot.'/TPhpPrown/isCalcInBrowser.php');
      require_once($SiteRoot.'/TPhpPrownTests/isCalcInBrowser_test.php');
   }
   // Размечаем низ страницы в случае, когда устанавливаем кнопку для теста
   else
   {
      //echo $_COOKIE['WasTest'];
      ?>
      <button id="button" onclick="isClick()">Протестировать функцию!</button> 
      </div></body></html>
      <?php
   }
}
?>
<?php
// <!-- --> ***** po-useragent-opredelit-rabotaet-li-funkciya-calc-dlya-css.php
