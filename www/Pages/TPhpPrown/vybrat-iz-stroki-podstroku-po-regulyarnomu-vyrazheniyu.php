<?php
// PHP7      *** vybrat-iz-stroki-podstroku-po-regulyarnomu-vyrazheniyu.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown            Страница функции Findes - выбрать из строки *
// *                         подстроку, соответствующую регулярному выражению *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.12.2019
// Copyright © 2019 tve                              Посл.изменение: 14.12.2019

// Определяем страничные константы
define ("Script", "vybrat-iz-stroki-podstroku-po-regulyarnomu-vyrazheniyu"); 
define ("Computer", "Computer"); // "Устройство, запросившее сайт - компьютер"  
define ("Mobile", "Mobile");     // "Устройство, запросившее сайт - смартфон"  
//define ("NotTest", "NotTest");   // "Тест не запускался"  
define ("WasTest", "WasTest");   // "Тест уже запускался"
// Инициализируем корневой, надсайтовый каталог и каталог хостинга
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
//require_once($SiteRoot.'/iGetAbove.php');
//$SiteAbove = iGetAbove($SiteRoot);      // Надсайтовый каталог
//$SiteHost = iGetAbove($SiteAbove);      // Каталог хостинга

function file_get_contents_utf8($fn) 
{
   $content=file_get_contents($fn);
   //return mb_convert_encoding($content,'UTF-8',mb_detect_encoding($content,'UTF-8,ISO-8859-1',true));
   return mb_convert_encoding($content,'UTF-8');
}



// Подгружаем рабочие модули
require_once($SiteRoot.'/TPhpPrown/getSiteDevice.php');
require_once($SiteRoot.'/TPhpPrown/MakeCookie.php');
require_once $SiteRoot.'/TPhpPrown/ViewGlobal.php';
require_once($SiteRoot.'/TPhpPrownTests/FunctionsBlock.php');
// Подключаем задействованные классы
//require_once $SiteHost.'/TPhpTools/TPageStarter/PageStarterClass.php';

$SiteDevice=prown\getSiteDevice();       // 'Computer','Mobile','Tablet'
// Формируем часть страницы с описанием функции
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Findes - выбрать из строки подстроку, соответствующую регулярному выражению</title>
<meta name="description" content=
"Findes выбирает из строки подстроку по заданному регулярному выражению и узнаёт
её начальную позицию в этой строке. Функция возвращает первое или единственное 
вхождение подстроки в исходной строке, а в случае неудачи возвращает пустую строку">
<meta name="keywords" content=
"findes,выбрать соответствующую регулярному выражению подстроку,
принцип DO-or-TRY, делай или пробуй">

<?php
// Инициализируем сессионные переменные
//$c_MakeTest=prown\MakeCookie('MakeTest',NotTest,tStr,true);  // "тест ещё не запускался

if ($SiteDevice==Mobile) 
{   
   //echo '<script>alert("Mobile");</script>';
   echo '<link href="TPhpPrownMobi.css" rel="stylesheet">';
}
else 
{   
   //echo '<script>alert("Computer");</script>';
   echo '<link href="TPhpPrownComp.css" rel="stylesheet">';
}
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
/*
echo 
'<script>'.
'$(document).ready(function(){
   $(".CodeText").doubleScroll({resetOnWindowResize:true});
   $("#submit").button();
});'.
'</script>';
*/
?>

<script>
$(document).ready(function(){
   $(".CodeText").doubleScroll({resetOnWindowResize:true});
   $("#button").button();
});
</script>



<script>
// https://learn.javascript.ru/cookie
function setcookie(name,value,Duration) 
{
   // Определяем параметры кукиса по умолчанию
   options=
   {
      'path':'/',
      'max-age':44236800, // 512д*24ч*60м*60с=44236800с - последняя дата
      'expires':512,      // 512д - число дней использования (вместо max-age)
      //'secure':true,
      'samesite':'strict' // использовать кукисы только своего сайта
   };
   // Выщитываем, когда задан expires, последнюю дату кукиса 
   if (Duration)
   {
      options['expires']=Duration;
      options['max-age']=Duration*24*60*60;
   }
   var last_date=new Date();
   last_date.setDate(last_date.getDate()+options['expires']);
   //
   let updatedCookie=encodeURIComponent(name)+"="+encodeURIComponent(value);
   for (let optionKey in options) 
   {
      //console.log("optionKey="+optionKey);
      updatedCookie+="; "+optionKey;
      var optionValue=options[optionKey];
      // Преобразовываем expires 
      if (optionKey=='expires')
      {
         optionValue=last_date.toUTCString();
      } 
      // Преобразовываем все параметры, кроме secure
      if (optionValue!==true) 
      {
         updatedCookie+="="+optionValue;
      }
      //console.log("optionValue="+optionValue);
   }
   console.log(' ');
   console.log(' ');
   console.log(' ');

   document.cookie=updatedCookie;
   console.log("document.cookie="+updatedCookie);
}

function DeleteCookie(name)
{
   var date = new Date(0);
   document.cookie = name+"=; path=/; expires=" + date.toUTCString();
}


function isClick() 
{
   //alert("isClick");
   DeleteCookie('WasTest');
   location.replace("<?php echo Script;?>"+".php");
}
</script>
</head>
<body>
<div class="TPhpPrown">
<h4 id="findes">Findes - выбрать из строки подстроку, соответствующую 
регулярному выражению.</h4>
<h5>Функция выполняет конкретную и часто возникающую задачу - выбрать из строки 
подстроку по заданному регулярному выражению и узнать её начальную позицию 
в этой строке.</h5> 
<h5>Findes возвращает первое или единственное вхождение подстроки в исходной 
строке, а в случае неудачи возвращает пустую строку.</h5>
<h5>Через третий параметр функция по ссылке возвращает позицию найденного 
фрагмента, начиная с нулевого значения, или -1, если фрагмент не найден.</h5>
<p><strong>Синтаксис</strong></p>
<pre>
$Result=Findes($preg,$string,&amp;$point)
</pre>
<p><strong>Параметры</strong></p>
<pre>
$preg   - текст регулярного выражения;
$string - текст, который должен быть обработан регулярным выражением;
$point  - позиция начала найденного фрагмента после работы регулярного 
выражения (параметр по ссылке). $point=-1, если фрагмент не найден.
</pre>
<p><strong>Возвращаемое значение</strong></p>
<pre>
$Result  - найденный фрагментов после работы регулярного выражения или
пустая строка, если фрагмент не найден.
</pre>
<p><br><strong>Программный текст</strong></p>
<?php

// Загружаем в страницу код функции
echo '<div class="CodeText">';
$FileSpec=$SiteRoot.'/TPhpPrown/Findes.php';
$FileContent=file_get_contents($FileSpec);
//echo mb_detect_encoding($FileContent).'<br>';
//echo '---<br>'.$FileContent.'<br>---<br>';
$FileCode=highlight_string($FileContent,true);
echo '=1=<br>'.$FileCode.'<br>=1=<br>';

//$pattern="/Автор([a-zA-Z0-9А-Яа-яЁё\s\.-:,]*)Труфанов\s/u";
//$pattern="/\/\/\sФункция([a-zA-Z0-9А-Яа-яЁё\s\.-:,]*)ачу\s/u";
//$pattern="/\/\/\sФункция([a-zA-Z0-9А-Яа-яЁё\s\.\n\r-:,]*)Findes\s/u";
//$pattern="/\/\/\sФункция([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)-:,=&;]+)-qwerty-/u";
//$pattern="/\/\/\sФункция([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)-:,=&;]+)не был найден/u";
$pattern="/\/\/\sФункция([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)-:,=&;]+)function/u";
$replacement='function';
$FileItog=preg_replace($pattern,$replacement,$FileContent);


$FileCode=highlight_string($FileItog,true);
echo '*2*<br>'.$FileCode.'<br>*2*<br>';

//$f2=$SiteRoot.'/TPhpPrown/Fil1.php';
//$f2=$SiteRoot.'/TPhpPrown/Fil.php';
//$string=file_get_contents($f2);
//$string = "The 23quickВИст. brown 23.04.2019 ИКЩЦТ BROWN - fox2019 jumped over the lazy dog.";
//echo mb_detect_encoding($string).'<br>';
//$pattern = "/quick([a-zA-Z0-9А-Яа-яЁё\s\.-]*)fox/u";
//$pattern = "/23([a-zA-Z0-9А-Яа-яЁё\s\.-:]*)2019/u";
//$pattern = "/Автор([a-zA-Z0-9А-Яа-яЁё\s\.-:]*)Труфанов\s/u";
//$replacement = "";
//$itog=preg_replace($pattern,$replacement,$string);
//echo $string.' --> <br>'.$itog.'<br>';

/*
$content="The 23quickВИст. brown 23.04.2019 ИКЩЦТ BROWN - fox2019 jumped over the lazy dog.";
echo mb_detect_encoding($content).'<br>';
echo mb_detect_encoding(highlight_string($content,true)).'<br>';
echo '*1*'.$content.'*1*'.'<br>';

$pattern = "/23([a-zA-Z0-9А-Яа-яЁё\s\.-]*)2019/u";
$replacement = "";
preg_replace($pattern,$replacement,$content).'<br>';
echo '*2*'.$content.'*2*'.'<br>';
*/

/*
echo '*2*'.urlencode($content).'*2*'.'<br>';
*/
//echo '*3*<br>'.highlight_string($itog,true).'<br>*3*'.'<br>';

//echo '***'.$f2.'***';
// Вырезаем комментарий, который уже представлен
//$pattern = "/Функция([a-zA-ZА-Яа-яЁё\s\.\/\n\r\t\v\f-]*)не был найден/u";
//$pattern = "/Функция([a-zA-ZА-Яа-яЁё\s\.\/\n\r\t\v\f-]*)не был найден/u";
// Преобразуем текст в раскрашенный код
/*
$stx=show_source($f2,true);
//preg_replace($pattern,'',$f2);
echo $stx.'<br><br>';
*/
/*
//$pattern = "/\.([a-zA-ZА-Яа-яЁё0-9\s:\.]{0,})\./u";
$pattern = "/\.([a-zA-ZА-Яа-яЁё0-9\s:\.]{0,})\./u";
$replacement = "";
preg_replace($pattern,$replacement,$stx).'<br>';
echo $stx;
*/
echo '</div>';

/*
$string = "The 23quickВИст. brown 23.04.2019 ИКЩЦТ BROWN - fox2019 jumped over the lazy dog.";
echo mb_detect_encoding($string).'<br>';
//$pattern = "/quick([a-zA-Z0-9А-Яа-яЁё\s\.-]*)fox/u";
$pattern = "/23([a-zA-Z0-9А-Яа-яЁё\s\.-]*)2019/u";
$replacement = "";
echo $string.' --> <br>';
echo preg_replace($pattern,$replacement,$string).'<br>';
*/

// Размечаем низ страницы в случае, когда следует запустить тест
// (то есть, когда кукис $_COOKIE['WasTest'] ещё не установлен):
// так как теги </body> и </html> ставятся внутри теста, то закрываем
// только <div class="TPhpPrown"> тегом </div> 
if (!(IsSet($_COOKIE['WasTest'])))
{
   //echo 'Кукиса MakeTest нет';
   ?>
   <p><br><strong>Сообщения выполненного теста функции</strong></p>
   <script>
      setcookie("WasTest","<?php echo WasTest;?>");
   </script>
   </div>
   <?php
   // Запускаем тестирование и трассировку выбранных функций
   require_once($SiteRoot.'/simpletest/autorun.php');
   $ModeError=-1;
   require_once($SiteRoot.'/TPhpPrown/Findes.php');
   require_once($SiteRoot.'/TPhpPrownTests/Findes_test.php');
}
// Размечаем низ страницы в случае, когда устанавливаем кнопку для теста
else
{
   //echo $_COOKIE['WasTest'];
   ?>
   <button id="button" onclick="isClick()">"Протестировать функцию!"</button>
   </div></body></html>
   <?php
}
//\prown\ViewGlobal(avgCOOKIE);
?>
<?php
// <!-- <p><input type="submit"></p> --> **** vybrat-iz-stroki-podstroku-po-regulyarnomu-vyrazheniyu.php ***
