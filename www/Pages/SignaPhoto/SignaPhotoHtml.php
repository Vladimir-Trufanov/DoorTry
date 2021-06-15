<?php
// PHP7/HTML5, EDGE/CHROME                           *** SignaPhotoHtml.php ***

// ****************************************************************************
// * SignaPhoto                         Вспомогательные функции сайтостраницы *
// *                                              для подписывания фотографий *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.06.2021
// Copyright © 2021 tve                              Посл.изменение: 14.06.2021

// ****************************************************************************
// *                            Начать HTML-страницу сайта                    *
// ****************************************************************************
function IniPage(&$c_SignaPhoto)
{
   $Result=true;
   // Инициируем или изменяем счетчик числа запросов страницы
   $c_SignaPhoto=prown\MakeCookie('SignaPhoto',0,tInt,true);  
   $c_SignaPhoto=prown\MakeCookie('SignaPhoto',$c_SignaPhoto+1,tInt);  
   // Загружаем заголовочную часть страницы
   echo '<!DOCTYPE html>';
   echo '<html lang="ru">';
   echo '<head>';
   echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
   echo '<title>Подписать фотографию</title>';
   echo '<meta name="description" content="Проба Img">';
   echo '<meta name="keywords"    content="Проба Img">';

   echo '<script src="SignaPhoto.js"></script>';
   echo '<script src="Jsx/jquery-1.11.1.min.js"></script>';
   return $Result;
}
// ****************************************************************************
// *                         Завершить HTML-страницу сайта                    *
// ****************************************************************************
function FinaPage()
{
   $Result=true;
   return $Result;
}
// ****************************************************************************
// *     Сформировать запросы для вызова страниц с портретной ориентацией     *
// *   и ландшафтной. Так как страница "Подписать фотографию" использует две  *
// * разметки: для страницы на компьютере и ландшафтной странице на смартфоне -
// *   простая разметка на дивах; а для портретной страницы на смартфоне с    *
// *                              помощью jquery mobile                       *
// ****************************************************************************
function MakeTextPages()
{
   ?> <script>
      // Определяем защишенность сайта, для того чтобы правильно сформулировать 
      // в запросе http или https
      $https='<?php echo $_SERVER["HTTPS"];?>';
      if ($https=="off") $https="http"
      else $https="https"; 
      //console.log($https);
      // Готовим URL для мобильно-портретной разметки, то есть разметки
      // для jQuery-мobile c двумя страницами 
      $SignaPortraitUrl=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphotoportrait";
      //console.log($SignaPortraitUrl);
      // Готовим URL для настольно-ландшафтной разметки (одностраничной)
      $SignaUrl=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphoto";
      //console.log($SignaUrl);
   </script> <?php
}



// Вывести изображение последнего загруженного фото
function ViewPhoto()
{
   echo 'Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo Photo ';
   //echo '<img src="images/photo.jpg" alt="" id="pic">';
}
// Вывести изображение подписи последних размеров
function ViewStamp()
{
   echo 'Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp Stamp ';
   //echo '<p><img src="images/stamp.png" alt="" id="picStamp"></p>';
}
// Вывести изображение c подписью
function ViewProba()
{
   //echo '<img src="images/proba.png" alt="" id="picProba">';
   echo 'Proba - Подписанная фотография';
}
// Вывести область управления
function ViewLead()
{
   echo 'Lead Управление<br>';
   echo '<div id="SiteDevice">Устройство неизвестное</div>';

}

// Выполнить разметку мобильных подстраниц "Подписать фотографию"
function markupMobileSite($TitleMain,$c_SignaPhoto)
{
   echo '
   <div data-role = "page" id = "page1">
      <div data-role = "header">
         <div data-role="controlgroup" data-type="horizontal"> 
         <div id="bTasks" class="dibtn">
         <a href="https://kwinflat.ru"><i class="fa fa-tasks fa-lg" aria-hidden="true"> </i></a>
         </div>
   ';
   echo  '<div id="c1Title"> <h1>'.$TitleMain.'</h1></div>';
   echo '
         <div id="bHandoright" class="dibtn">
         <a href="#"><i class="fa fa-hand-o-right fa-lg" aria-hidden="true"> </i></a>
         </div>
         </div>
      </div>
      <div role="main" class="ui-content" id="cCenter">
   ';
   //require_once 'Pages/cCenter.php';
   //echo 'Pages/cCenter.php';
   ViewPhoto();
   echo '
      </div>
      <div data-role = "footer">
      <p>For more information <a href = "#page2">click here</a></p>
   ';
   echo $c_SignaPhoto; echo ': PORTRAIT<br>';
   echo '
      </div>
      </div>
   '; 
   echo '
   <div data-role = "page" id = "page2">
      <div data-role = "header">
         <div data-role="controlgroup" data-type="horizontal"> 
         <div id="bTasks" class="dibtn">
         <a href="https://kwinflat.ru"><i class="fa fa-hand-o-left fa-lg" aria-hidden="true"> </i></a>
         </div>
   ';
   echo  '<div id="c2Title"> <h1>Текст фрагмента программы</h1></div>';
   echo '
         <div id="bHandoright" class="dibtn">
         <a href="#"><i class="fa fa-sign-out fa-lg" aria-hidden="true"> </i></a>
         </div>
         </div>
      </div>
      <div role="main" class="ui-content" id="exPhp">
   ';
   ViewProba();
   echo '
      </div>
      <div data-role = "footer">
         <p><a href = "#page1">Back to previous page</a></p>';
   echo $c_SignaPhoto; echo ': PORTRAIT<br>';
   echo '
      </div>
   </div>
   ';
}






// *** <!-- --> **************************************** SignaPhotoHtml.php ***
