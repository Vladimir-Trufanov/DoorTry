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
      echo 'BeginNews();';
      echo '</script>';
      // Выводим новости
      //echo '$p_FormNews='.$p_FormNews.'<br>';
      //echo '$p_AmtNews ='.$p_AmtNews.'<br>';
      $urlNews="http://www.stolica.onego.ru/rss.php/feed.xml";
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
