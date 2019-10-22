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
// Подключаем задействованные классы
require_once $SiteHost."/TPhpTools/TPageStarter/PageStarterClass.php";
// Подключаем собственно вкладываемое стихотворение, как функцию
require_once $SiteRoot."/stihi/sorevnovanie-s-hakerami/sorevnovanie-s-hakerami.php";   
// Выполняем запуск сессии и начальную инициализацию
//session_start();
$oStihiStarter = new PageStarter('Stihi');
// Формируем страницу окружения стихотворения
$SiteDevice=prown\getSiteDevice();  // 'Computer','Mobile','Tablet'
echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
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
//
echo '<title>Соревнование с хакерами</title>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
echo '<meta name="description" content="'.
         'Бежал ноябрь, работа шла '.
         'В душе кипели страсти '.
         'Жил на работе - чуть дыша '.
         'На улице - ненастье '.
     '">';
echo '<meta name="keywords" content="'.
         'стихи,всякие,разные,страсти,хакеры,защита,программирование,'.
         'девушки,встречи'.
     '">';
echo '<link href="Stihi.css"  rel="stylesheet" type="text/css">';
echo '<link href="Styles.css" rel="stylesheet" type="text/css">';
echo '</head>';
echo '<body>';
// Делаем разметку страницы для смартфона
if ($SiteDevice==Mobile) 
{   
   SorevnovanieSHakerami();  
}
// Делаем разметку страницы для компьютера
else 
{   
   SorevnovanieSHakerami();  
}
echo '</body>'; 
echo '</html>';
// <!-- --> *********************************** sorevnovanie-s-hakerami.php ***
