<?php
// PHP7/HTML5, EDGE/CHROME                               *** SimpleTape.php ***

// ****************************************************************************
// * doortry.ru               Показать ленту RSS, как простую новостную ленту *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 01.06.2019

function SimpleTape($url,$Amt=0)

// $url - адрес ленты новостей RSS, например:
//    'http://news.liga.net/economics/rss.xml'          - Лига-Новости;
//    'http://uaport.net/cgi-bin/infostream.rss?rubr15' - новости Украины;

// $Amt - количество новостей для представления в форме. 
// Если $Amt==0 (по умолчанию), то показываются все новости

{
   $Result = true;
   $rss = simplexml_load_file($url);
   echo ''."\n";
   $Point=1;
   foreach ($rss->channel->item as $item)
   {
      $image = $item->enclosure;
      $item->pubDate = date("H:i ", strtotime("$item->pubDate"));
      echo '<details class="rss_sp">';
      echo '<img src="'.$image['url'].'" width="'.$image['width'].
         '" height="'.$image['height'].'" alt="" class="image_link" />';
      echo '<td>'; 
      echo '<summary><span>'.$item->title.'</span></summary>';
      echo '<div><p>'.$item->description.'</p></div><a href="'.
         $item->link.'"target="blank" class="link">Подробнее</a>';
      echo '</td>';  
      echo '</details>'."\n";
      echo '<tr><td colspan="2">&nbsp;</td></tr>'."\n";
      echo '<span class="date">'.$item->pubDate.'</span>'; 
      
      // Ограничиваем количество новостей
      $Point=$Point+1;
      if ($Amt!=0)
      {
         if ($Point>$Amt) break;
      }
   }
   echo ' ';
   return $Result;
}
// ********************************************************* SimpleTape.php ***
