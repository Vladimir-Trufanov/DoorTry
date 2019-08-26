<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * doortry.ru                                      Выполнить разметку сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 21.08.2019

echo  '<div class="pageWrapper">';
echo  '<header>';
echo  '<nav class="TopMenu">';
         TopMenu();
echo  '</nav>';
echo  '<h2>DoorTry - коллекционер ошибок</h2>';
echo  '</header>';

echo  '<div class="contentWrapper">';
echo     '<div class="columnWrapper">';
echo        '<article class="main">';
               MakeQrcode();
               MakeH1();
               echo  prown\getTranslit('Разные вместе').'<br>';
               PageContent();
echo        '</article>';
echo        '<aside class="RightBar">';
               Stih();
echo        '</aside>';
echo     '</div>';
         
         //echo 'Лента новостей: '.$s_NameNews;

         if (isNews($s_NameNews)) {
echo     '<aside class="LeftBar">';
            NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt,$s_NameNews);
echo     '</aside>'; }
echo  '</div>';

echo '<footer>';
echo '<div class="pLeft">Copyright © 2019 tve</div>';
echo '<div class="pRight">Контакты: <a href="mailto:tve58@inbox.ru">tve58@inbox.ru</a></div>';
echo '</footer>';
echo '</div>';

// <!-- --> ****************************************************** Site.php ***
