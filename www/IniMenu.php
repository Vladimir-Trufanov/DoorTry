<?php
// PHP7/HTML5, EDGE/CHROME                                  *** iniMenu.php ***

// ****************************************************************************
// * doortry.ru                                        Отработать пункты меню *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 26.11.2019

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
// ****************************************************************************
// *                       Вывести пункты новостного меню                     *
// ****************************************************************************
function NewsMenu()
{
   global $aNews;
   $Result = true;
   foreach($aNews as $k=>$v)
   {
      echo '<li><a href="';
      if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {
         //echo 'novosti=';
      }
      else
      {
         echo 'index.php?novosti=';
      }
      echo prown\getTranslit($k).'"'.
         ' rel="nofollow">'.      // исключили ссылку из индексирования
         $k.'</a></li>';
   }
   return $Result;
}
// ****************************************************************************
// *                       Вывести пункты меню стихотворений                  *
// ****************************************************************************
function StihiMenu()
{
   global $aStihi;
   $Result = true;
   foreach($aStihi as $k=>$v)
   {
      echo '<li><a href="';
      echo 'index.php?stihi=';
      echo prown\getTranslit($k).'"'.'>'.$k.'</a></li>';
   }
   return $Result;
}
// ****************************************************************************
// *                      Отработать пункты верхнего меню                     *
// ****************************************************************************
function TopMenu()
{
   $Result = true;
   // Формируем кнопку гамбургера (в компьютерном варианте она скрыта)
   echo '<input id="main-menu-state" type="checkbox"/>';
   echo '<label class="main-menu-btn" for="main-menu-state">';
      echo '<span class="main-menu-btn-icon"></span>'; // Кнопка меню-гамбургера
   echo '</label>';
   // Формируем смарт-меню
   echo '<ul id="main-menu" class="sm sm-doortry">';
   // Переключаем пункты меню главных материалов сайта
   if (prown\isComRequest(prown\getTranslit(ConnHandler),'list'))
   {
      echo '<li>';
      // Для основного и контрольного сайтов выводим краткий URL
      if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {
         echo '<a href="'.prown\getTranslit(SimPrincip).'">'.SimPrincip.'</a>';
      }
      else
      {
         echo '<a href="index.php?list='.prown\getTranslit(SimPrincip).'">'.SimPrincip.'</a>';
      }
      echo '</li>';
   }
   else
   {                                               
      echo '<li>';
      if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {
         echo '<a href="'.prown\getTranslit(ConnHandler).'">'.ConnHandler.'</a>';
      }
      else
      {
         echo '<a href="index.php?list='.prown\getTranslit(ConnHandler).'">'.ConnHandler.'</a>';
      }
      echo '</li>';
   }
   // Подключаем сведения о библиотеке TPhpPrown                                                    
   echo '<li><a href="#">TPhpPrown</a>';
      echo '<ul>';
      TPhpPrownMenu();
      echo '</ul>';
   echo '</li>';
   // Подключаем показ стихотворения
   echo '<li><a href="#">Штрихотворения</a>';
      echo '<ul>';
      StihiMenu();
      echo '</ul>';
   echo '</li>';
   // Подключаем пробную страницу
   //echo '<li><a href="index.php?list=proba">Пробная страница</a></li>';
   // Подключаем пробную  по BaseMaker
   //echo '<li><a href="index.php?list=basemaker">Пробная BaseMaker страница</a></li>';
   echo '<li><a href="index.php?list=signaphoto">Подписать фотографию</a></li>';
   // Подключаем страницы для проверки FsbProba
   /*
   echo '<li><a href="index.php?fsb=probaPolityConfident">probaPolityConfident</a></li>';
   echo '<li><a href="index.php?fsb=probaPolzoSogl">probaPolzoSogl</a></li>';
   echo '<li><a href="index.php?fsb=FsbProba">FsbProba</a></li>';
   */
   // Подключаем вызов новостей                                                    
   echo '<li><a href="#">Новости</a>';
      echo '<ul>';
      NewsMenu();
      echo '</ul>';
   echo '</li>';
   // Подключаем страницу с инструментами и документацией
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
   {
      echo '<li><a href="instrumenty">Инструменты</a></li>';
   }
   else
   {
      echo '<li><a href="index.php?list=instrumenty">Инструменты</a></li>';
   }
   //echo '<li><a href="#">SoftШутки</a></li>';
   echo '</ul>';
   return $Result;
}
// ************************************************************ iniMenu.php ***
