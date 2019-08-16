<?php
// PHP7/HTML5, EDGE/CHROME                                 *** NewsView.php ***

// ****************************************************************************
// * doortry.ru                          Показать в колонке выбранные новости *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 05.06.2019

function NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt)
{
   $Result = true;
   if ($p_NewsView)
   {
      ?>
      <h2>Столица на онего</h2>
      <p>
      <?php
      
      // Фиксируем начало загрузки новостей
      echo '<script>';
      //echo 'BeginNews();';
      echo '</script>';
      // Выводим новости
      //echo '$p_FormNews='.$p_FormNews.'<br>';
      //echo '$p_AmtNews ='.$p_AmtNews.'<br>';
      //$urlNews="http://www.stolica.onego.ru/rss.php/feed.xml";
      // ИНФОРМАЦИОННОЕ АГЕНТСТВО РОССИИ ТАСС
      //$urlNews="http://www.itar-tass.com/rss/all.xml";
      // "Ведомости". Ежедневная деловая газета
      //$urlNews="http://www.vedomosti.ru/newsline/out/rss.xml";
      // Яндекс.Новости: Общество
      //$urlNews="http://news.yandex.ru/society.rss";
      // АМИ Trend - Все новости
      //$urlNews="http://ru.trend.az/rss/trend_all_ru.rss";
      // Вести.Ru
      //$urlNews="http://www.vesti.ru/vesti.rss";
      // *** Lenta.ru : Новости
      //$urlNews="http://img.lenta.ru/r/EX/import.rss";
      // Google Новости
      //$urlNews="http://news.google.com/news?hl=ru&um=1&q=%D0%D2%C1%D7%C1+%C9%CE%D7%C1%CC%C9%C4%CF%D7&ie=windows-1251&output=rss";
      // RT на русском
      //$urlNews="http://russian.rt.com/rss/";
      // Российская газета
      //$urlNews="http://www.rg.ru/xml/index.xml";
      // Новости Украины
      //$urlNews="http://uaport.net/cgi-bin/infostream.rss?rubr15";
      // *** Новости Mail.ru
      //$urlNews="http://news.mail.ru/rss/";
      // ИноСМИ - Все, что достойно перевода
      //$urlNews="http://www.inosmi.ru/misc/export/xml/rss/translation.xml";
      // *** Яндекс.Новости: Интернет
      //$urlNews="http://feeds.feedburner.com/yandex/MAOo";
      // Луганские новости сегодня
      //$urlNews="http://www.citynews.net.ua/news/rss.pl?15";
      //  новости Украины и мира
      //$urlNews="http://export.for-ua.com/ru_allnews.rss";
      // Хакер
      $urlNews="http://www.xakep.ru/articles/rss/default.asp?rss_cat=hack";
      
      

      
                         

        
      if ($p_NewsForm==frnSimple) 
      {
         SimpleTape($urlNews,$p_NewsAmt);
      }
      else
      {
         WithImgTape($urlNews,$p_NewsAmt);
      }
      ?>
      </p>
      <?php
   }
   return $Result;
}
// <!-- --> ************************************************** NewsView.php ***
