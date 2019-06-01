<?php
// PHP7/HTML5, EDGE/CHROME                              *** WithImgTape.php ***

// ****************************************************************************
// * doortry.ru       Показать ленту RSS, как новостную ленту с изображениями *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 01.06.2019

function WithImgTape($url,$Amt=0)

// $url - адрес ленты новостей RSS, например:
//    "https://news.yandex.ru/gadgets.rss?&"         - Яндекс-Новости;
//    "http://www.stolica.onego.ru/rss.php/feed.xml" - Столица на Онего;

// $Amt - количество новостей для представления в форме. 
// Если $Amt==0 (по умолчанию), то показываются все новости

{
   $Result = true;
   $content = file_get_contents($url);
   $items = new SimpleXmlElement($content);
   print "<ul>";
   // Инициируем счетчик количества выведенных новостей
   $Point=1;
   // Показываем заданное количество новостей
   foreach($items -> channel -> item as $item) 
   {
      print "<li><a href = '{$item->link}' title = '$item->title'>" .
         $item->title . "</a> - " . $item -> description . "</li>";

      // Ограничиваем количество новостей
      $Point=$Point+1;
      if ($Amt!=0)
      {
         if ($Point>$Amt) break;
      }
   }
   print "</ul>";
   return $Result;
}
// ******************************************************** WithImgTape.php ***
