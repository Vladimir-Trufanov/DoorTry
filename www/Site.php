<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * doortry.ru                                      Выполнить разметку сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 01.06.2019

?>
<div class="pageWrapper">
   
   <header>
   <nav class="TopMenu">
      <?php
      TopMenu();
      ?>
   </nav>
   <h1>DoorTry - коллекционер ошибок</h1>
   </header>
    
   <div class="contentWrapper">
      
      <div class="columnWrapper">
      <article class="main">
         <h2>Название</h2>
         <?php
         MakeQrcode();
         ConnHandler();
         //SimPrincip();
         ?>
      </article>
      
      <aside class="LeftBar">
         <h2>Новости</h2>
         <?php
         NewsMenu();
         if ($p_NewsView)
         {
            ?>
            <h2>Столица на онего</h2>
            <p>
            <?php
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
         ?>
      </aside>
      </div>
      
      <aside class="RightBar">
         <h2>Всякое-разное</h2>
         <?php
         Stih();
         ?>
      </aside>
 
   </div>

   <footer>
      <p>Copyright © 2019 tve</p> 
      <p>---</p> 
      <p>Контакты: <a href="mailto:tve58@inbox.ru">tve58@inbox.ru</a></p>
   </footer>
</div>
<?php
// <!-- --> ****************************************************** Site.php ***
