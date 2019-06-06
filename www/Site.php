<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * doortry.ru                                      Выполнить разметку сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 05.06.2019

echo '<div class="pageWrapper">';
echo '<header>';
echo '<nav class="TopMenu">';
   TopMenu();
echo '</nav>';
echo '<h1>DoorTry - коллекционер ошибок</h1>';
echo '</header>';

echo '<div class="contentWrapper">';
      
   echo '<div class="columnWrapper">';

      echo '<article class="main">';
      echo '<h2>Название</h2>';
      MakeQrcode();
      ConnHandler();
      //SimPrincip();
      echo '</article>';
      
      echo '<aside class="RightBar">';
      echo '<h2>Штрихотворение</h2>';
      Stih();
      echo '</aside>';
      
   echo '</div>';

   echo '<aside class="LeftBar">';
   echo '<h2>Новости</h2>';
   NewsMenu();
   NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt);
   echo '</aside>';
   
echo '</div>';

echo '<footer>';
echo '<p>Copyright © 2019 tve</p>'; 
echo '<p>Контакты: <a href="mailto:tve58@inbox.ru">tve58@inbox.ru</a></p>';
echo '</footer>';
echo '</div>';

// <!-- --> ****************************************************** Site.php ***
