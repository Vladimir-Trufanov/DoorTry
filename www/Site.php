<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * doortry.ru                                      Выполнить разметку сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 26.01.2020

echo '<div class="pageWrapper">';
   // Штрих-код с адресом сайта
   echo '<div id="dImghVerh">';
   echo '<img id="ImghVerh" src="doortry.png" alt="doortry.ru">';
   echo '</div>';
   // Верхнее меню и название сайта
   echo '<header>';
      echo '<div id="dVer">';
      //echo '<div id="res"></div>';
      echo 'in'.$s_Counter.' v1.8';
      echo '</div>';
      echo  '<h2>DoorTry - коллекционер ошибок</h2>';
      echo '<nav>'; TopMenu(); echo '</nav>';
   echo '</header>';
   // 2 или 3 колонки контента сайта
   echo '<div class="contentWrapper">';
      // Главные статьи и Стихотворения
      echo '<div class="columnWrapper">';
         echo '<article class="main">';
            MakeQrcode();
            MakeH1();
            //echo  prown\getTranslit('Обслуживатель баз данных SQLite3').'<br>';
            //phpinfo();
            //DebugError();
            PageContent($SiteHost);
         echo '</article>';
         echo '<aside class="RightBar">';
            Stih();
         echo '</aside>';
      echo '</div>';
      // Новости
      if (isNews($s_NameNews)) 
      {
         echo '<aside class="LeftBar">';
            NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt,$s_NameNews);
         echo '</aside>'; 
      }
   // Подвал
   echo '<footer>';
      echo '<div class="pLeft">Copyright © 2020 tve</div>';
      echo '<div class="pRight">Контакты: <a href="mailto:tve58@inbox.ru">tve58@inbox.ru</a></div>';
   echo '</footer>';
echo '</div>';
// <!-- --> ****************************************************** Site.php ***
