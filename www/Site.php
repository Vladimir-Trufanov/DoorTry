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
//echo '<nav class="TopMenu">';
//   TopMenu();
//echo '</nav>';










?> 
      
      <nav class="menu">
  <ul>
    <?php
      // Переключаем пункты меню главных материалов сайта
      if (isComRequest('ConnHandler'))
         echo '<li><a href="index.php?Com=SimPrincip">Простой принцип программирования</a></li>';
      else
         echo '<li><a href="index.php?Com=ConnHandler">Подключить обработчик ошибок/исключений</a></li>';
      // Устанавливаем остальные пункты
      echo '<li><a href="##">Штрихотворения</a></li>';
      echo '<li><a href="#">Новости</a>';

      
      echo '<ul>';
      echo '<li class="menuli"><a href="###">Яндекс-Новости</a></li>';
      echo '<li class="menuli"><a href="###">Лига-Новости</a></li>';
      echo '<li class="menuli"><a href="###">Столица на Онего</a></li>';
      echo '</ul>';
      echo '</li>';
      
      //echo '<li><a href="#">SoftШутки</a></li>';
    ?> 

  </ul>
</nav>
<?php





echo '<h2>DoorTry - коллекционер ошибок</h2>';
echo '</header>';

echo '<div class="contentWrapper">';
      
   echo '<div class="columnWrapper">';

      echo '<article class="main">';
      MakeQrcode();
      MakeH1();
      PageContent();
      
      echo '</article>';
      
      echo '<aside class="RightBar">';
      echo '<h2>Штрихотворение</h2>';
      Stih();
      echo '</aside>';
      
   echo '</div>';

   echo '<aside class="LeftBar">';
   echo '<h2>Новости</h2>';
   
   
   
   //NewsMenu();
   NewsView($p_NewsView,$p_NewsForm,$p_NewsAmt);
   echo '</aside>';
   
echo '</div>';

echo '<footer>';
echo '<span class="p">Copyright © 2019 tve</span>';
echo '<span class="p">Контакты: <a href="mailto:tve58@inbox.ru">tve58@inbox.ru</a></span>';
echo '</footer>';
echo '</div>';

// <!-- --> ****************************************************** Site.php ***
