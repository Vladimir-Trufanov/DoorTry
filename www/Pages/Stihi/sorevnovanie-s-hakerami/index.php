<?php
// PHP7/HTML5, EDGE/CHROME                  *** sorevnovanie-s-hakerami.php ***

// ****************************************************************************
// *                                                                          *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.01.2019
// Copyright © 2019 tve                              Посл.изменение: 06.02.2019

global $SiteDevice;
//global $SiteRoot;
//require_once $SiteRoot."/Pages/Stihi/Stih.php";   

//require_once "Stih.php";   


define ("Computer", "Computer"); // "Устройство, запросившее сайт - компьютер"  
define ("Mobile", "Mobile");     // "Устройство, запросившее сайт - смартфон"  
define ("Tablet", "Tablet");     // "Устройство, запросившее сайт - планшет"  

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
//echo $SiteDevice.'<br>';

if ($SiteDevice==Mobile) 
{   
   ?>
   <?php
}
else 
{   
   ?>
  <?php
}
?>
   Здравствуй, DoorTry!
   </body> 
   </html>
<?php
// <!-- --> *********************************** sorevnovanie-s-hakerami.php ***
