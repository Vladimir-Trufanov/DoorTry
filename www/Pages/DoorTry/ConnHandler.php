<?php
// PHP7/HTML5, EDGE/CHROME                              *** ConnHandler.php ***

// ****************************************************************************
// * doortry.ru                       Подключить обработчик ошибок/исключений *
// *                                                 - главный материал сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 02.08.2019

// Переадресация страницы:
// 'Podklyuchit-obrabotchik-oshibok-isklyucheniy'='index.php?Com=ConnHandler'
function SeoTags()
{
    echo "<title>Подключение обработчика ошибок/исключений</title>";
    echo "<meta name=\"description\" content=\"Сайт используется для обработки ошибок/исключений и их комментирования в PHP5-PHP7. Показан способ для подключения этой возможности к Вашим сайтам.\">";
    echo "<meta name=\"keywords\" content=\"универсальная обработка ошибок и исключений PHP5-7, принцип DO-or-TRY, Делай или Пробуй\">";
}
function MakeH1()
{
   echo "<h1>Подключение обработчика ошибок/исключений - Connect error/exception handler</h1>";
}
function PageContent()
{
   $Result = true;
   ?>
   <div class="dAbz">
   Для подключения обработчика ошибок/исключений к сайтам на PHP7-PHP5 следует выполнить всего два шага:
   </div>
   <div class="dAbz">
   <b>1 шаг.&nbsp;</b>Включить в стартовый файл сайта, например index.php, собственно вызов обработчика.
   <br>
   <br>
   </div>
   <div id="dImgSimPri2">
   <img id="ImgSimPri2" src="Images/Index.png" alt="Вызов обработчика">
   </div>
   <div class="dAbz">
   Что будет происходить?<br><br>
   При запуске сайта вначале загрузится оболочка для обработки ошибок. В представленном нами случае - сценарий DoorTryerPage.php из каталога сайта TDoorTryer.<br><br>
   Затем загрузится и запустится собственно пользовательский сайт (в данном примере Main.php).<br><br>
   Запускаемый сайт укрыт в оболочке try - catch для перехода в "открытую дверь"&nbsp;-&nbsp;DoorTryPage к отработке системных или пользовательских исключений.  
   </div>
   <div class="dAbz">
   <b>2 шаг.&nbsp;</b> 
   Включить в состав сайта модуль сценария DoorTryerPage.php, реализующего обработку ошибок/исключений.
   </div>
   <?php

   global $SiteRoot;
   echo '<div class="CodeText">';
   $f2=$SiteRoot."/Pages/DoorTry/DoorTryForSite.php";
   $stx=show_source($f2,true);
   echo $stx;
   echo '</div>';
   
   return $Result;
}
// <!-- --> *********************************************** ConnHandler.php ***
