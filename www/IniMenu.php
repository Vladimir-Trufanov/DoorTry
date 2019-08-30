<?php
// PHP7/HTML5, EDGE/CHROME                                  *** IniMenu.php ***

// ****************************************************************************
// * doortry.ru                                        Отработать пункты меню *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 30.08.2019

/**
 *  Список новостных лент
 *  
 *  Столица на онего
 *    "http://www.stolica.onego.ru/rss.php/feed.xml";
 *  Информационное агенство России ТАСС
 *    "http://www.itar-tass.com/rss/all.xml";
 *  "Ведомости". Ежедневная деловая газета
 *    "http://www.vedomosti.ru/newsline/out/rss.xml";
 *  Яндекс.Новости: Общество
 *    "http://news.yandex.ru/society.rss";
 *  АМИ Trend - Все новости
 *    "http://ru.trend.az/rss/trend_all_ru.rss";
 *  Вести.Ru
 *    "http://www.vesti.ru/vesti.rss";
 *  Lenta.ru : Новости
 *    "http://img.lenta.ru/r/EX/import.rss";
 *  Google Новости
 *    "http://news.google.com/news?hl=ru&um=1&q=%D0%D2%C1%D7%C1+%C9%CE%D7%C1%CC%C9%C4%CF%D7&ie=windows-1251&output=rss";
 *  RT на русском
 *    "http://russian.rt.com/rss/";
 *  Российская газета
 *    "http://www.rg.ru/xml/index.xml";
 *  Новости Украины
 *    "http://uaport.net/cgi-bin/infostream.rss?rubr15";
 *  Новости Mail.ru
 *    "http://news.mail.ru/rss/";
 *  ИноСМИ - Все, что достойно перевода
 *    "http://www.inosmi.ru/misc/export/xml/rss/translation.xml";
 *  Яндекс.Новости: Интернет
 *    "http://feeds.feedburner.com/yandex/MAOo";
 *  Луганские новости сегодня
 *    "http://www.citynews.net.ua/news/rss.pl?15";
 *  Новости Украины и мира
 *    "http://export.for-ua.com/ru_allnews.rss";
 *  Хакер
 *    $urlNews="http://www.xakep.ru/articles/rss/default.asp?rss_cat=hack";
**/
$aNews=array
(            
   'Столица на Онего' => 'http://www.stolica.onego.ru/rss.php/feed.xml',   
   'Ведомости России' => 'http://www.vedomosti.ru/newsline/out/rss.xml',   
   'Абвгде ёжзийк лмнопрстуф хцчш щьыъэюя'  => 'http://news.yandex.ru/society.rss',   
   'Яндекс Общество'  => 'http://news.yandex.ru/society.rss',   
   'Новости Украины'  => 'http://uaport.net/cgi-bin/infostream.rss?rubr15',
   'Яндекс Интернет'  => 'http://feeds.feedburner.com/yandex/MAOo',
   'Журнал Хакер'     => 'http://www.xakep.ru/articles/rss/default.asp?rss_cat=hack',
   'Google Новости'   => 'http://news.google.com/news?hl=ru&um=1&q='.
      '%D0%D2%C1%D7%C1+%C9%CE%D7%C1%CC%C9%C4%CF%D7&ie=windows-1251&output=rss',
   '"Что достойно перевода"' => 'http://www.inosmi.ru/misc/export/xml/rss/translation.xml',
   'Новости Mail.ru'  => 'http://news.mail.ru/rss/',
);
// ****************************************************************************
// *                       Вывести пункты новостного меню                     *
// ****************************************************************************
function NewsMenu()
{
   global $aNews;
   $Result = true;
   foreach($aNews as $k=>$v)
   {
      $s='<li class="menuli">'.
         '<a href="index.php?Novosti='.prown\getTranslit($k).'"'.
         '>'.$k.'</a></li>';
      echo $s;
   }
   return $Result;
}
$aStihi=array
(            
   'Соревнование с хакерами' => '*',   
);
// ****************************************************************************
// *                       Вывести пункты новостного меню                     *
// ****************************************************************************
function StihiMenu()
{
   global $aStihi;
   $Result = true;
   foreach($aStihi as $k=>$v)
   {
      /*
      $s='<li class="menuli">'.
         '<a href="index.php?Stihi='.prown\getTranslit($k).'"'.
         '>'.$k.'</a></li>';
      */
      $s='<li class="menuli">'.
         '<a href="index.php?Stihi='.$k.'"'.
         '>'.$k.'</a></li>';
      echo $s;
   }
   return $Result;
}
// ****************************************************************************
// *                      Отработать пункты верхнего меню                     *
// ****************************************************************************
function TopMenu()
{
   $Result = true;
   echo '<ul>';
   // Переключаем пункты меню главных материалов сайта
   if (isComRequest('Podklyuchit-obrabotchik-oshibok-i-isklyuchenij','List'))
      echo '<li><a href="index.php?List='.
         'Prostoj-princip-programmirovaniya">'.
         'Простой принцип программирования</a></li>';
   else
      echo '<li><a href="index.php?List='.
         'Podklyuchit-obrabotchik-oshibok-i-isklyuchenij">'.
         'Подключить обработчик ошибок/исключений</a></li>';
   // Подключаем показ стихотворения
   echo '<li><a href="">Штрихотворения</a>';
      echo '<ul>';
      StihiMenu();
      echo '</ul>';
   echo '</li>';
   // Подключаем вызов новостей
   echo '<li><a href="">Новости</a>';
      echo '<ul>';
      NewsMenu();
      echo '</ul>';
   echo '</li>';
   //echo '<li><a href="#">SoftШутки</a></li>';
   echo '</ul>';
   return $Result;
}
// ************************************************************ IniMenu.php ***
