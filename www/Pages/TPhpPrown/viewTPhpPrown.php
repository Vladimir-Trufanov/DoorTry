<?php
// PHP7                                               *** viewTPhpPrown.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown         Вывод в браузер управляемой страницы TPhpPrown *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.12.2019
// Copyright © 2019 tve                              Посл.изменение: 03.02.2020

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
SeoTags();

/*
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
<h4 id="findes">Findes - выбрать из строки подстроку, соответствующую регулярному выражению.</h4>
<h5><span class="letter">Ф</span>ункция выполняет конкретную и часто возникающую задачу - выбрать из строки подстроку по заданному регулярному выражению и узнать её начальную позицию в этой строке.</h5> 
<h5><span class="letter">F</span>indes возвращает первое или единственное вхождение подстроки в исходной строке, а в случае неудачи возвращает пустую строку.</h5>
<h5><span class="letter">Ч</span>ерез третий параметр функция по ссылке возвращает позицию найденного фрагмента, начиная с нулевого значения, или -1, если фрагмент не найден.</h5>
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
$Result  - найденный фрагментов после работы регулярного выражения или пустая строка, если фрагмент не найден.
</pre>
</div>
<?php
// Загружаем в страницу код функции
echo '<div class="CodeText">';
$FileSpec=$TPhpPrown.'/TPhpPrown/Findes.php';
$FileContent=file_get_contents($FileSpec);
//echo mb_detect_encoding($FileContent).'<br>';
//echo '---<br>'.$FileContent.'<br>---<br>';
// Вырезаем комментарий, который уже представлен
$pattern="/\/\/\sФункция([0-9a-zA-Zа-яёА-ЯЁ\s\.\$\n\r\(\)-:,=&;]+)function/u";
$replacement='function';
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
      require_once($SiteRoot.'/TPhpPrown/Findes.php');
      require_once($SiteRoot.'/TPhpPrownTests/Findes_test.php');
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
*/
// <!-- --> ********************************************* viewTPhpPrown.php ***
