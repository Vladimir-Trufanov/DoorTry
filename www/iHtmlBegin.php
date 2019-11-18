<?php
// PHP7/HTML5, EDGE/CHROME                               *** iHtmlBegin.php ***

// ****************************************************************************
// * doortry.ru                                         Загрузить начало HTML * 
// *                              c подключением основного или мобильного CSS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.01.2019
// Copyright © 2019 tve                              Посл.изменение: 18.11.2019

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
// Указываем на используемую фавиконку
echo '<link rel="icon" href="https://doortry.ru/favicon.ico" type="image/x-icon">';
echo '<link rel="shortcut icon" href="https://doortry.ru/favicon.ico" type="image/x-icon">';
// Добавляем Google аналитику
echo '<!-- Global site tag (gtag.js) - Google Analytics -->';
echo '<script async src="https://www.googletagmanager.com/gtag/js?id=UA-36748654-2"></script>';
echo '<script>';
echo '  window.dataLayer = window.dataLayer || [];';
echo '  function gtag(){dataLayer.push(arguments);}';
echo "  gtag('js', new Date());";
echo '';
echo "  gtag('config', 'UA-36748654-2');";
echo '</script>';
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
// Подключаем SmartMenus
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
echo '<link rel="stylesheet" href="SmartMenus/sm-core-css.css">';
echo '<link rel="stylesheet" href="SmartMenus/sm-doortry.css">';
echo '<script src="SmartMenus/jquery.smartmenus.min.js"></script>';
//
SeoTags();
// Делаем страницу для смартфона
if ($SiteDevice==Mobile) 
{   
   echo '<link href="Styles/MobiStyles.css" rel="stylesheet">';
   echo '<link href="Styles/Stihi.css" rel="stylesheet">';
}
// Делаем страницу для компьютера
else 
{   
   echo '<link href="Styles/Styles.css" rel="stylesheet">';
   echo '<link href="Styles/Stihi.css" rel="stylesheet">';
   // Определяем заданную ленту новостей
   getNews();
   if (isNews($s_NameNews)) 
      echo '<link href="Styles/IsColNews.css" rel="stylesheet">'; 
   else
      echo '<link href="Styles/NoColNews.css" rel="stylesheet">';
   ?> 
   <script>
   /* 
   */
   </script>
   <?php
}
// Подключаем вспомогательные JS
echo '<link href="JS/TJsPrown.css" rel="stylesheet" type="text/css">'; 
echo '<script src="/JS/TJsPrown.js"></script>';
echo '<script src="/JS/DoorTry.js"></script>';
echo '<script src="/JS/FixLoadTimer.js"></script>';

// Разворачиваем смартменю
?> 
<script>
$(document).ready(function() 
{
   $('.sm').smartmenus
   ({
      showFunction: function($ul,complete) 
      {
         $ul.slideDown(250,complete);
      },
      hideFunction: function($ul,complete) 
      {
         $ul.slideUp(250,complete);
      }
   });
      
      $('#main-menu').on('click.smapi', function(e,item)
      {
         // check namespace if you need to differentiate from a regular DOM
         // event fired inside the menu tree
         if (e.namespace == 'smapi')
         { 
            // your handler code
            //alert('smapi');
            var $arr='Oppa';
            
            $.ajax({
               url: 'save.php',
               type: 'POST',
               data: {masiv:$arr},
               error: function()
               {
                  $('#res').text("Ошибка!");
               },
               success: function()
               {
                  $('#res').show().text("Сохранено!").fadeOut(1000);
               }
			   });
         }
      });
      
   /*
   $(function()
   {
      var $mainMenuState = $('#main-menu-state');
      alert('arr');
      if ($mainMenuState.length)
      {
         // animate mobile menu
         $mainMenuState.change
         (function(e){
            var $menu=$('#main-menu');
            if (this.checked)
            {
               $menu.hide().slideDown(250,function(){$menu.css('display','');});
            } 
            else
            {
               $menu.show().slideUp(250,function(){$menu.css('display','');});
            }
         });
         // hide mobile menu beforeunload
         $(window).on('beforeunload unload',
         function(){
            if ($mainMenuState[0].checked)
            {
               $mainMenuState[0].click();
            }
         });
      }
   });
   */
}); // end ready
</script>
<?php

echo '</head>';
echo '<body>';


?> 
<!-- Mobile menu toggle button (hamburger/x icon) -->

<div class="gambur">

<!-- 
<input id="main-menu-state" type="checkbox"/>
<label class="main-menu-btn" for="main-menu-state">
   <span class="main-menu-btn-icon"></span> Кнопка меню-гамбургера
</label>
-->

<ul id="main-menu" class="sm sm-doortry">
   <li><a href="index.php?list=podklyuchenie-obrabotchika-oshibok-i-isklyuchenij">
      Подключение обработчика ошибок и исключений</a>
   </li>
   <li><a href="#">Штрихотворения</a>
      <ul>
         <li class="menuli"><a href="index.php?stihi=sorevnovanie-s-hakerami">Соревнование с хакерами</a></li>
      </ul>
   </li>
   <li><a href="#">Новости</a>
      <ul>
         <li><a href="index.php?novosti=stolica-na-onego" rel="nofollow">Столица на Онего</a></li>
         <li><a href="index.php?novosti=vedomosti-rossii" rel="nofollow">Ведомости России</a></li>
         <li><a href="index.php?novosti=yandeks-obshchestvo" rel="nofollow">Яндекс Общество</a></li>
         <li><a href="index.php?novosti=novosti-ukrainy" rel="nofollow">Новости Украины</a></li>
         <li><a href="index.php?novosti=yandeks-internet" rel="nofollow">Яндекс Интернет</a></li>
         <li><a href="index.php?novosti=zhurnal-haker" rel="nofollow">Журнал Хакер</a></li>
         <li><a href="index.php?novosti=google-novosti" rel="nofollow">Google Новости</a></li>
         <li><a href="index.php?novosti=chto-dostojno-perevoda" rel="nofollow">Что достойно перевода!</a></li>
         <li><a href="index.php?novosti=novosti-mailru" rel="nofollow">Новости Mail.ru</a></li>
      </ul>
   </li>
</ul>
</div>

<br><br><br><br>
<div id="res">Сообщение</div>
<br><br><br>

<?php

// ********************************************************* iHtmlBegin.php ***
