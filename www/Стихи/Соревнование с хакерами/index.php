<?php
// PHP7/HTML5, EDGE/CHROME                  *** sorevnovanie-s-hakerami.php ***

// ****************************************************************************
// *          Страница стихотворения "Соревнование с хакерами"                *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.01.2019
// Copyright © 2019 tve                              Посл.изменение: 06.02.2019

define ("Computer", "Computer"); // "Устройство, запросившее сайт - компьютер"  
define ("Mobile", "Mobile");     // "Устройство, запросившее сайт - смартфон"  
define ("Tablet", "Tablet");     // "Устройство, запросившее сайт - планшет"  

// Инициализируем корневой каталог сайта
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
// Инициализируем надсайтовый каталог и каталог хостинга
require_once $SiteRoot."/iGetAbove.php";
$SiteAbove = iGetAbove($SiteRoot);      // Надсайтовый каталог
$SiteHost = iGetAbove($SiteAbove);      // Каталог хостинга
// Подключаем файлы библиотеки прикладных модулей
require_once $SiteHost."/TPhpPrown/getSiteDevice.php";
// Подключаем собственно вкладываемое стихотворение, как функцию
// require_once $SiteRoot."/Stihi/sorevnovanie-s-hakerami/sorevnovanie-s-hakerami.php";   
require_once $SiteRoot."/Стихи/Соревнование с хакерами/sorevnovanie-s-hakerami.php";   
// Формируем страницу окружения стихотворения
$SiteDevice=prown\getSiteDevice();  // 'Computer','Mobile','Tablet'
?>
   <!DOCTYPE html>
   <html lang="ru">
   <head>
      <title>Соревнование с хакерами</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
      <meta name="description" content="
         Бежал ноябрь, работа шла
         В душе кипели страсти
         Жил на работе - чуть дыша
         На улице - ненастье
      ">
      <meta name="keywords" content="
         стихи,всякие,разные,страсти,хакеры,защита,программирование,
         девушки,встречи
      ">
      <!-- 
      <link rel="stylesheet" type="text/css" href="Styles/Styles.css">
      -->
   </head>
   <body>
<?php

// Делаем разметку страницы для смартфона
if ($SiteDevice==Mobile) 
{   
   ?>
   <?php
   SorevnovanieSHakerami();  
}
// Делаем разметку страницы для компьютера
else 
{   
   ?>
   <?php
   SorevnovanieSHakerami();  
}

?>
   </body> 
   </html>
<?php
// <!-- --> *********************************** sorevnovanie-s-hakerami.php ***
