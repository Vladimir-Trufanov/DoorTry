<?php
// PHP7                      *** vyvesti-soobshchenie-ob-oshibke-na-php.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown     Страница функции MakeUserError - вывести сообщение *
// *                      разработчика об ошибке в программируемом модуле или *
// *                                 сформировать пользовательское исключение *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  28.12.2019
// Copyright © 2019 tve                              Посл.изменение: 02.01.2020

// Статистика ключевых слов:
//    "как вывести сообщение об ошибке на PHP" - 11 показов за декабрь 2019
//    "сообщение разработчика об ошибке"       - 134
//    "сообщение разработчика"                 - 3112
//    "сформировать исключение"                - 100

// Определяем страничные константы
define ("Script", "vyvesti-soobshchenie-ob-oshibke-na-php"); 
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
<title>MakeUserError - вывести сообщение разработчика об ошибке или сформировать исключение</title>
<meta name="description" content=
"MakeUserError выводит сообщение об ошибке для сайта на PHP. Функция используется 
в библиотеках прикладных функций и классов TPhpPrown и TPhpTools. Параметры 
функции позволяют разработчику представить текст сообщения в текущей позиции сайта 
либо выбросить текст на отдельной странице с помощью исключения.">
<meta name="keywords" content=
"MakeUserError, как вывести сообщение об ошибке на PHP, сообщение разработчика, 
сформировать исключение, принцип DO-or-TRY, делай или пробуй, TPhpPrown">
<?php
// Подключаем jquery/jquery-ui
if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
{
   echo '<link rel="canonical" '.
   'href="https://doortry.ru/TPhpPrown/vyvesti-soobshchenie-ob-oshibke-na-php"/>';
}
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
   echo '<link href="/Styles/TPhpPrownMobi.css" rel="stylesheet">';
}
else 
{   
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
<h4 id="makeusererror">MakeUserError - вывести сообщение разработчика об ошибке в программируемом модуле или сформировать пользовательское исключение.</h4>
<div class="TPrownAbz">
<p>
<span class="letter">Ф</span>ункция MakeUserError предназначена для того, чтобы вывести сообщение об ошибке при написании сценария для сайта на PHP. Она постоянно используется для сообщений разработчика в текстах библиотек прикладных функций и классов TPhpPrown и TPhpTools. Параметры функции позволяют исполнителю представить текст
информационного сообщения в текущей позиции сайта либо сформировать исключение и выбросить текст в отдельной странице, прервав работу сайта, но оставляя возможность вернуться на исходную страницу.
</p>
<p><span class="letter">И</span>нформационное сообщение из разрабатываемого программного модуля при возникновении ошибочной ситуации выводится в одном из четырёх режимов:</p>
<p>в режиме <span class="letter">rvsCurrentPos</span> просто выводится сообщение в текущей позиции сайта. Данный режим используется при тестировании модулей;</p>
<p>в режиме по умолчанию <span class="letter">rvsTriggerError</span> вызывается исключение с пользовательской ошибкой через trigger_error($Message,$errtype), где $Message - текст сообщения, $errtype может быть одним из значений E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE, E_USER_DEPRECATED. По умолчанию E_USER_ERROR;</p>
<p>в режиме <span class="letter">rvsMakeDiv</span> предполагается, что ошибка произошла в php-коде до разворачивания html-страницы и, в этом случае, формируется дополнительный блок сообщения <strong>div</strong> с идентификатором <strong>id="Ers"</strong>;</p>
<p>в режиме <span class="letter">rvsDialogWindow</span> разворачивается сообщение в диалоговом окне с помощью JQueryUI. В этом случае на вызывающем сайте должны быть подключены модули jquery, jquery-ui, jquery-ui.css, например от Microsoft:</p>
</div>

<pre>
&lt;link rel="stylesheet" type="text/css"
   href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/ui-lightness/jquery-ui.css"&gt;
&lt;script
   src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"&gt;
&lt;/script&gt;
&lt;script
   src="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.11.2/jquery-ui.min.js"&gt;
&lt;/script&gt;
</pre>

<div class="TPrownAbz">
<p><span class="letter">Ф</span>ункция MakeUserError выделяет два вида ошибок (контроллируемые и неконтроллируемые) и определяет их следующим образом:</p>
<p>а) ошибка является <span class="letter">контроллируемой</span> в случае, когда известно в каком месте сайта она может возникнуть и, таким образом, сообщение об ошибке можно вывести на экран по разметке сайта;</p>
<p>б) в остальных случаях ошибка является <span class="letter">неконтроллируемой</span> и вывод сообщения об ошибке выполняется на отдельной странице;</p>
<p>в) по умолчанию функция генерирует неконтроллируемую ошибку/исключение:  <strong>trigger_error ($Message, E_USER_ERROR)</strong>, предполагая на верхнем уровне обработку ошибки через сайт <a href="http://doortry.ru">doortry.ru</a>.</p>
</div>
<p><strong>Синтаксис</strong></p>
<pre>MakeUserError($Mess,$Prefix='TPhpPrown',$Mode=0,$errtype=E_USER_ERROR,$div='Ers')</pre>
<p><strong>Параметры</strong></p>
<pre>
$Mess    - текст сообщения об ошибке/исключении;
$Prefix  - префикс сообщения, указывающий на программную систему, в модуле которой возникла ошибка/исключение;
$Mode    - режим вывода сообщений: rvsCurrentPos, rvsTriggerError, rvsMakeDiv, rvsDialogWindow;
$errtype - тип ошибки/исключения: E_USER_ERROR,E_USER_WARNING,E_USER_NOTICE,E_USER_DEPRECATED;
$div     - имя div-а для сообщения в режимах rvsMakeDiv,rvsDialogWindow. По умолчанию 'Ers'.
</pre>
<p><strong>Возвращаемое значение</strong></p>
<pre>
$Result=true, если сообщение сформировано без ошибок
</pre>
<p><strong>Зарегистрированные ошибки/исключения</strong></p>
<pre>define ("WrongTypeError", "Неверно указан тип ошибки");</pre>
<?php
// Загружаем в страницу код функции
echo '<div class="CodeText">';
$FileSpec=$SiteRoot.'/TPhpPrown/MakeUserError.php';
$FileContent=file_get_contents($FileSpec);
$pattern="/require([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)\"-_:,=&;]+)\*\*\//u";
$replacement='require_once "iniConstMem.php";***';
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
      require_once($SiteRoot.'/TPhpPrown/MakeUserError.php');
      require_once($SiteRoot.'/TPhpPrownTests/MakeUserError_test.php');
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
// <!-- --> ******************** vyvesti-soobshchenie-ob-oshibke-na-php.php ***
