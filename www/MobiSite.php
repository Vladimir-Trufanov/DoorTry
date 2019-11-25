<?php
// PHP7/HTML5, EDGE/CHROME                                 *** MobiSite.php ***

// ****************************************************************************
// * doortry.ru                           Выполнить разметку мобильного сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 23.11.2019

// Регулируем верхнее смещение контента главной страницы по её типу
echo '<style type="text/css"> .main';
echo '{margin-top:'.$c_Topset.'rem;}';
echo '</style>';
// Верхнее меню и название сайта
echo '<header>';
   echo '<div id="dVer">';
   echo '<div id="res"></div>';
   echo 'v1.4';
   echo '</div>';
   echo  '<h2>DoorTry - коллекционер ошибок</h2>';

echo '<div class="gambur">';
   echo '<input id="main-menu-state" type="checkbox"/>';
   echo '<label class="main-menu-btn" for="main-menu-state">';
      echo '<span class="main-menu-btn-icon"></span>'; // Кнопка меню-гамбургера
   echo '</label>';
   echo '<nav>'; 
      TopMenu(); 
   echo '</nav>';
echo '</div>';

echo '</header>';


// Главные статьи, cтихотворения, новости
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
   if (isNews($s_NameNews)) 
   {
      echo '<div class="dAbz">';
      NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt,$s_NameNews);
      echo '</div>';
   }
}
/*
MakeQrcode();
echo  prown\getTranslit('Майский вечер в Карелии').'<br>';
phpinfo();
DebugError();
*/
echo '</div>';
/*
echo '<footer>';
echo '<div class="pLeft">Copyright © 2019 tve</div>';
echo '<div class="pRight">Контакты: <a href="mailto:tve58@inbox.ru">tve58@inbox.ru</a></div>';
echo '</footer>';
echo '</div>';
*/
// <!-- --> ************************************************** MobiSite.php ***
