<?php
// PHP7/HTML5, EDGE/CHROME                                 *** MobiSite.php ***

// ****************************************************************************
// * doortry.ru                           Выполнить разметку мобильного сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 09.02.2020

// Регулируем верхнее смещение контента главной страницы по её типу
//echo '<style type="text/css"> .main';
//echo '{margin-top:1rem;}';
//echo '</style>';
// Выводим название сайта и главное меню
//echo '<div id="res"></div>'; // Резервное сообщение
echo '<header>';
   // Размещаем div c версией сайта и кратким инфо-сообщением
   echo '<div id="dVer">';
   echo 'v1.5';
   echo '</div>';
   echo  '<h2>DoorTry - коллекционер ошибок</h2>';
   // Размещаем гамбургер-меню
   echo '<div id="gamburg">';
      TopMenu(); 
   echo '</div>';
echo '</header>';
// Главные статьи, cтихотворения, новости
echo '<div class="main">';
   if (prown\isComRequest(prown\getTranslit(ConnHandler),'list'))
   {
      MakeH1();
      PageContent();
   }
   elseif (prown\isComRequest(prown\getTranslit(SimPrincip),'list'))
   {
      MakeH1();
      PageContent();
   }
   else
   {
      $News=prown\getComRequest('novosti');
      if ($News==NULL) 
      {
         MakeH1();
         PageContent();
      }
      else
      {
         echo '<div class="News">';
         NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt,$News);
         echo '</div>';
      }
   }
echo '</div>';
/*
MakeQrcode();
echo  prown\getTranslit('Майский вечер в Карелии').'<br>';
phpinfo();
DebugError();
*/
/*
echo '<footer>';
echo '<div class="pLeft">Copyright © 2019 tve</div>';
echo '<div class="pRight">Контакты: <a href="mailto:tve58@inbox.ru">tve58@inbox.ru</a></div>';
echo '</footer>';
echo '</div>';
*/
// <!-- --> ************************************************** MobiSite.php ***
