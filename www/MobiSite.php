<?php
// PHP7/HTML5, EDGE/CHROME                                 *** MobiSite.php ***

// ****************************************************************************
// * doortry.ru                           Выполнить разметку мобильного сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 30.08.2019

// Верхнее меню и название сайта
   echo '<header>';
      echo '<div id="dVer">';
      echo '<div id="res"></div>';
      echo 'v1.4';
      echo '</div>';
      echo  '<h2>DoorTry - коллекционер ошибок</h2>';
      
      /*
      echo '<input id="main-menu-state" type="checkbox"/>';
      echo '<label class="main-menu-btn" for="main-menu-state">';
      echo '<span class="main-menu-btn-icon"></span>'; // Кнопка меню-гамбургера
      echo '</label>';
      */
      echo '<nav class="TopMenu">';
         TopMenu();
      echo  '</nav>';
   echo '</header>';


echo '<div class="main">';
if (isComRequest(prown\getTranslit(ConnHandler),'list'))
{
   MakeH1();
   PageContent();
   }
elseif (isComRequest(prown\getTranslit(SimPrincip),'list'))
{
   MakeH1();
   PageContent();
   }
else
{   
         // Новости
      if (isNews($s_NameNews)) 
      {
         //echo '<aside class="LeftBar">';
            NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt,$s_NameNews);
         //echo '</aside>'; 
      }
}

   
echo '</div>';

/*
echo  '<div class="pageWrapper">';
echo  '<header>';
echo  '<nav class="TopMenu">';
         TopMenu();
echo  '</nav>';
echo  '<h2>DoorTry - коллекционер ошибок</h2>';
echo  '</header>';
*/
/*
echo  '<div class="contentWrapper">';
echo     '<div class="columnWrapper">';
echo        '<article class="main">';
               MakeQrcode();
               MakeH1();
               echo  prown\getTranslit('list').'<br>';
               PageContent();
echo        '</article>';
echo        '<aside class="RightBar">';
               Stih();
echo        '</aside>';
echo     '</div>';
         if (isNews($s_NameNews)) {
echo     '<aside class="LeftBar">';
            NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt,$s_NameNews);
echo     '</aside>'; }
echo  '</div>';
*/
/*
echo '<footer>';
echo '<div class="pLeft">Copyright © 2019 tve</div>';
echo '<div class="pRight">Контакты: <a href="mailto:tve58@inbox.ru">tve58@inbox.ru</a></div>';
echo '</footer>';
echo '</div>';
*/

// <!-- --> ************************************************** MobiSite.php ***
