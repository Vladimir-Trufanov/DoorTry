<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * doortry.ru                                      Выполнить разметку сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 26.01.2020

// Штрих-код с адресом сайта
echo '<div id="dImghVerh">';
echo '<img id="ImghVerh" src="doortry.png" alt="doortry.ru">';
echo '</div>';

// Верхнее меню и название сайта
echo '<header>';
   ?>
   <div id="tipo">
      <div id="tipoTTL">
      DoorTry - коллекционер ошибок
      in1 v1.9
      </div>
      <div id="tipoIMG">
         ЗНАЧОК
      </div>
      <div class="Pogoda">
      <table>
      <tr>
        <td rowspan="4" class="first">Первая</td>
        <td class="second">Вторая</td>
        <td>Третья</td>
        <td>Четвертая</td>
      </tr>
      <tr>
        <td rowspan="3" class="third">Пятая</td>
        <td>Шестая</td>
        <td>Седьмая</td>
      </tr>
      <tr>
        <td>Восьмая</td>
        <td>Девятая</td>
      </tr>
      <tr>
        <td>Десятая</td>
        <td>Одиннадцатая</td>
      </tr>
      <tr class="separator">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      </table>
      </div>
   </div>
   
   <?php

   /*
   echo '<div id="dVer">';
   //echo '<div id="res"></div>';
   echo 'in'.$s_Counter.' v1.9';
   echo '</div>';
   //require_once $SiteRoot."/ApiPogoda.php";
   echo  '<h2>DoorTry - коллекционер ошибок</h2>';
   */
   echo '<nav>'; TopMenu(); echo '</nav>';
echo '</header>';

// 2 или 3 колонки контента сайта
echo '<div class="contentWrapper">';
   // Главные статьи и Стихотворения
   echo '<div class="columnWrapper">';
      echo '<article class="main">';
         MakeQrcode();
         MakeH1();
         //echo  prown\getTranslit('Создать каталог и задать его права').'<br>';
         //phpinfo();
         //DebugError();
         PageContent($SiteHost,$SiteProtocol);
      echo '</article>';
      echo '<aside class="RightBar">';
         echo $stih;
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
      $today = getdate();
      echo '<div class="pLeft">Copyright © 2019-'.$today["year"].' tve</div>';
      echo '<div class="pRight">Контакты: <a href="mailto:tve58@inbox.ru">tve58@inbox.ru</a></div>';
   echo '</footer>';
echo '</div>';

// <!-- --> ****************************************************** Site.php ***
