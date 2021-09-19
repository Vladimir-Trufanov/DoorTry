<?php
// PHP7/HTML5, EDGE/CHROME                  *** index.php ()***

// ****************************************************************************
// *                 Страница стихотворения ""                *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  16.09.2021
// Copyright © 2021 tve                              Посл.изменение: 16.09.2021

// Инициализируем рабочее пространство: корневой каталог сайта и т.д.
require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteRoot   = $_WORKSPACE[wsSiteRoot];    // Корневой каталог сайта
$SiteAbove  = $_WORKSPACE[wsSiteAbove];   // Надсайтовый каталог
$SiteHost   = $_WORKSPACE[wsSiteHost];    // Каталог хостинга
$SiteDevice = $_WORKSPACE[wsSiteDevice];  // 'Computer' | 'Mobile' | 'Tablet'
// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
require_once $TPhpPrown."/TPhpPrown/iniConstMem.php";
// Подключаем задействованные классы
require_once $SiteHost."/TPhpTools/TPhpTools/TPageStarter/PageStarterClass.php";
// Подключаем собственно вкладываемое стихотворение, как функцию
require_once $SiteRoot."/stihi/kapriznyj-starik/kapriznyj-starik.php";   
// Выполняем запуск сессии и начальную инициализацию
//session_start();
$oStihiStarter = new PageStarter('Stihi');
// Формируем страницу окружения стихотворения
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
echo '<title>Капризный старик</title>';
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
   Proba();  
}
// Делаем разметку страницы для компьютера
else 
{ 
   Proba();  
}
echo '</body>'; 
echo '</html>';

function proba()
{
   echo '<div id="divTop">';
   divTop();
   echo '</div>';
   
   echo '<div id="divStrip">';
   divStrip('utrennee-ozero_1280x420.jpg','Утреннее озеро в Реускула');
   echo '</div>';
   
   echo '<div id="divBottom">';
   model11('60%','40%');
   echo '</div>';
}
function divTop()
{
   echo 'divTop! '; 
   echo 
      'divTop! divTop! divTop! divTop! divTop! divTop! divTop! divTop! '.
      'divTop! divTop! divTop! divTop! divTop! divTop! divTop! divTop! '.
      'divTop! divTop! divTop! divTop! divTop! divTop! divTop! divTop! '; 
}
// ****************************************************************************
// *       Вывести разделительную панораму между верхней и нижней частью      *
// ****************************************************************************
function divStrip($src,$alt)
{
   echo 
      '<img id="imgStrap" src="'.$src.'" alt="'.$alt.'">'.
      '<p class="pStrap">'.$alt.'</p>';
   /*
   echo 'divStripi! '; 
   echo 
      'divStrip! divStrip! divStrip! divStrip! divStrip! divStrip! '. 
      'divStrip! divStrip! divStrip! divStrip! divStrip! divStrip! '. 
      'divStrip! divStrip! divStrip! divStrip! divStrip! divStrip! '; 
   */
}
function model11($widthLeft,$widthRight)
{
   // Определяем ширины колонок
   echo '<style type="text/css">
   .blo1left {width:'.$widthLeft.';}
   .blo1right{width:'.$widthRight.';}
   </style>';
   // Выводим левый блок
   echo '<div class="blo1left">';
   blockImg("za-dva-mesyaca_1800x1300.jpg","За два месяца");
   echo '</div>';
   // Выводим правый блок
   echo '<div class="blo1right">';
   blockTxt();
   echo '</div>';
}
function blockImg($src,$alt)
{
   echo '<img class="bImg" src="'.$src.'" alt="'.$alt.'">';
   echo '<p class="pStrap">'.$alt.'</p>';
}
function blockTxt()
{
   echo '<div class="stihabz">';
   echo '<p class="stihstr">Cranky Old Man</p>';
   echo '</div>';
   echo '<div class="stihabz">';
   echo '<p class="stihstr">What do you see nurses? What do you see?</p>';
   echo '<p class="stihstr">What are you thinking when you’re looking at me?</p>';
   echo '<p class="stihstr">A cranky old man, not very wise,</p>';
   echo '<p class="stihstr">Uncertain of habit with faraway eyes?</p>';
   echo '<p class="stihstr">Who dribbles his food and makes no reply.</p>';
   echo '<p class="stihstr">When you say in a loud voice ’I do wish you’d try!’</p>';
   echo '<p class="stihstr">Who seems not to notice the things that you do.</p>';
   echo '<p class="stihstr">And forever is losing. A sock or shoe?</p>';
   echo '<p class="stihstr">Who, resisting or not lets you do as you will,</p>';
   echo '<p class="stihstr">With bathing and feeding. The long day to fill?</p>';
   echo '<p class="stihstr">Is that what you’re thinking? Is that what you see?</p>';
   echo '<p class="stihstr">Then open your eyes, nurse you’re not looking at me.</p>';
   echo '<p class="stihstr">I’ll tell you who I am. As I sit here so still,</p>';
   echo '<p class="stihstr">As I do at your bidding, as I eat at your will.</p>';
   echo '<p class="stihstr">I’m a small child of Ten with a father and mother,</p>';
   echo '<p class="stihstr">Brothers and sisters who love one another</p>';
   echo '<p class="stihstr">A young boy of Sixteen with wings on his feet</p>';
   echo '<p class="stihstr">Dreaming that soon ... now a lover he’ll meet.</p>';
   echo '<p class="stihstr">A groom soon at Twenty, my heart gives a leap.</p>';
   echo '<p class="stihstr">Remembering, the vows that I promised to keep.</p>';
   echo '<p class="stihstr">At Twenty-Five, now. I have young of my own.</p>';
   echo '<p class="stihstr">Who need me to guide. And a secure happy home.</p>';
   echo '<p class="stihstr">A man of Thirty. My young now grown fast,</p>';
   echo '<p class="stihstr">Bound to each other. With ties that should last.</p>';
   echo '<p class="stihstr">At Forty, my young sons have grown and are gone,</p>';
   echo '<p class="stihstr">But my woman is beside me to see I don’t mourn.</p>';
   echo '<p class="stihstr">At Fifty, once more, Babies play ‘round my knee,</p>';
   echo '<p class="stihstr">Again, we know children. My loved one and me.</p>';
   echo '<p class="stihstr">Dark days are upon me. My wife is now dead.</p>';
   echo '<p class="stihstr">I look at the future. I shudder with dread.</p>';
   echo '<p class="stihstr">For my young are all rearing young of their own.</p>';
   echo '<p class="stihstr">And I think of the years. And the love that I’ve known.</p>';
   echo '<p class="stihstr">I’m now an old man and nature is cruel.</p>';
   echo '<p class="stihstr">It’s jest to make old age look like a fool.</p>';
   echo '<p class="stihstr">The body, it crumbles grace and vigour, depart.</p>';
   echo '<p class="stihstr">There is now a stone where I once had a heart.</p>';
   echo '<p class="stihstr">But inside this old carcass. A young man still dwells,</p>';
   echo '<p class="stihstr">And now and again my battered heart swells</p>';
   echo '<p class="stihstr">I remember the joys. I remember the pain.</p>';
   echo '<p class="stihstr">And I’m loving and living life over again.</p>';
   echo '<p class="stihstr">I think of the years, all too few gone too fast.</p>';
   echo '<p class="stihstr">And accept the stark fact that nothing can last.</p>';
   echo '<p class="stihstr">So open your eyes, people open and see.</p>';
   echo '<p class="stihstr">Not a cranky old man.</p>';
   echo '<p class="stihstr">Look closer see ME!</p>';
   echo '</div>';
   echo '<div class="stihabzPdp">';
   echo '<p class="stihstr">https://rg.ru/2013/02/28/starik.html</p>';
   echo '<p class="stihstr">https://vk.com/@geniuspub-sumei-uvidet-to-chto-za</p>';
   echo '<p class="stihstr">https://stihi.ru/2014/01/26/2454</p>';
   echo '</div>';
}

// <!-- --> ****************************** index.php ().php ***
