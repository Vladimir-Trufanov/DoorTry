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

function MakeH1(){
    echo "<h1>Подключить обработчик ошибок/исключений - Connect error/exception handler</h1>";}

function PageContent()
{
   global $f1;
   echo  '2'.$f1;

   $Result = true;
   ?>
   <br>
   <p>
   Для подключения обработчика ошибок/исключений к сайтам следует выполнить несколько шагов:
   </p>
   <br>
   <p>
   1 шаг. Включить в стартовый файл сайта, например index.php, собственно вызов обработчика.
   </p>
   <p>
   <img src="Images/Index.png" alt="Вызов обработчика">
   </p>
   <br>
   <p>
   Что будет происходить? При запуске сайта вначале загрузится оболочка для обработки ошибок. В представленном случае - сценарий DoorTryerPage.php из каталога сайта TDoorTryer. Затем загрузится и запустится собственно пользовательский сайт (в данном примере Main.php). Запускаемый сайт укрыт в оболочке try - catch для перехода в "открытую дверь"-DoorTryPage к отработке системных или пользовательских исключений.  
   </p>
   <br>
   <p>
   2 шаг. Включить в состав сайта два модуля сценариев (DoorTryerPage.php, DoorTryerMessage.php), реализующих обработку ошибок/исключений.
   </p>
   <br>
   <p>
   <pre>
   </pre>
   </p>
   <?php
   
   //echo '<br>- - -<br>';
   //echo '<pre>';
   //echo htmlspecialchars(file_get_contents(__FILE__));
   //highlight_string(file_get_contents(__FILE__));
   //show_source (__FILE__);
   show_source ($f1);

   
   
   //echo '</pre>';
   //echo '<br>- - -<br>';
   
   global $SiteRoot;
   $f2=$SiteRoot."/TDoorTryer/DoorTryerMessage.php";
   show_source ($f2);
   
   return $Result;
}
// <!-- --> *********************************************** ConnHandler.php ***
