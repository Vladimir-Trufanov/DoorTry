<?php
// PHP7     *** sformirovat-soobshchenie-ob-oshibke-v-zhyostkoj-sisteme.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown         Страница функции MakeUserError - сгенерировать *
// *                   ошибку/исключение или просто сформировать сообщение об *
// *                              ошибке в "жёсткой" системе обработки ошибок *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  28.12.2019
// Copyright © 2019 tve                              Посл.изменение: 28.12.2019

// Определяем страничные константы
define ("Script", "sformirovat-soobshchenie-ob-oshibke-v-zhyostkoj-sisteme"); 
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
<title>MakeUserError - сгенерировать исключение или просто сформировать сообщение</title>
<meta name="description" content=
"MakeUserError выводит пользовательское сообщение об ошибке в одном из 4 режимов: 
rvsCurrentPos - просто выводится сообщение в текущей позиции сайта (как правило, при тестировании);
rvsTriggerError (по умолчанию) - вызывается исключение с пользовательским сообщением;
rvsMakeDiv - формируется дополнительный div сообщения с id='Ers';
rvsDialogWindow - разворачивается сообщение в диалоговом окне с помощью JQueryUI">
<meta name="keywords" content=
"MakeUserError,сгенерировать ошибку/исключение или просто сформировать сообщение об ошибке в 'жёсткой' системе обработки ошибок, принцип DO-or-TRY, делай или пробуй, TPhpPrown">
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
      //alert("isClick");
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
      //alert("isClick");
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
<h4 id="makeusererror">MakeUserError - cгенерировать ошибку/исключение или просто сформировать сообщение об ошибке в “жёсткой” системе обработки ошибок.</h4>
<h5>"<span class="letter">Ж</span>ёсткой" системой обработки ошибок/исключений называется механизм вывода сообщений с помощью функции MakeUserError и реализующий 4 режима работы:</h5>
<h5><span class="letter">в</span> режиме $Mode = rvsCurrentPos просто выводится сообщение в текущей позиции сайта. Данный режим используется при тестировании модулей;</h5>
<h5><span class="letter">в</span> режиме по умолчанию $Mode = rvsTriggerError вызывается исключение с пользовательской ошибкой через trigger_error($Message,$errtype), где $Message - текст сообщения, $errtype может быть одним из значений E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE, E_USER_DEPRECATED. По умолчанию E_USER_ERROR;</h5>
<h5><span class="letter">в</span> режиме $Mode = rvsMakeDiv предполагается, что ошибка произошла в php-коде до разворачивания html-страницы и, в этом случае, формируется дополнительный div сообщения с id="Ers";</h5>
<h5><span class="letter">в</span> режиме $Mode = rvsDialogWindow разворачивается сообщение в диалоговом окне с помощью JQueryUI. В этом случае на вызывающем сайте должны быть подключены модули jquery, jquery-ui, jquery-ui.css, например от Microsoft:</h5>

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

<h5>"<span class="letter">Ж</span>ёсткая" система обработки ошибок/исключений выделяет два вида ошибок (контроллируемые и неконтроллируемые) и представляется следующим образом:</h5>
<h5><span class="letter">а</span>) ошибка является контроллируемой в случае, когда известно в каком месте сайта она может возникнуть и, таким образом, сообщение об ошибке можно вывести на экран по разметке сайта;</h5>
<h5><span class="letter">б</span>) в остальных случаях ошибка является неконтроллируемой и вывод сообщения об ошибке выполняется на отдельной странице;</h5>
<h5><span class="letter">в</span>) по умолчанию функция генерирует неконтроллируемую ошибку/исключение:  trigger_error ($Message, E_USER_ERROR), предполагая на верхнем уровне обработку ошибки через сайт <a href="http://doortry.ru">doortry.ru</a>, где неконтроллируемая ошибка возникает на странице исключения с трассировкой его всплывания;</h5>
<p><strong>Режимы вывода сообщений</strong></p>
<pre>
define ("rvsCurrentPos",   -1);  // в текущей позиции сайта 
define ("rvsTriggerError",  0);  // исключение с пользовательской ошибкой  
define ("rvsMakeDiv",       1);  // в дополнительном div-е для сообщения   
define ("rvsDialogWindow",  2);  // в диалоговом окне с помощью JQueryUI 
</pre>
<p><strong>Синтаксис</strong></p>
<pre>MakeUserError($Mess,$Prefix='TPhpPrown',$Mode=0,$errtype=E_USER_ERROR)</pre>
<p><strong>Параметры</strong></p>
<pre>
$Mess    - текст сообщения об ошибке/исключении;
$Prefix  - префикс сообщения, указывающий на программную систему, в модуле которой возникла ошибка/исключение;
$Mode   - режим вывода сообщений: rvsCurrentPos, rvsTriggerError, rvsMakeDiv, rvsDialogWindow;
$errtype - тип ошибки/исключения: E_USER_ERROR,E_USER_WARNING,E_USER_NOTICE,E_USER_DEPRECATED;
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
      require_once($SiteRoot.'/TPhpPrown/MakeUserError.php');
      require_once($SiteRoot.'/TPhpPrownTests/MakeUserError_test.php');
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
// <!-- --> *** sformirovat-soobshchenie-ob-oshibke-v-zhyostkoj-sisteme.php ***
