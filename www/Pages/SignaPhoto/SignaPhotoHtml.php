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
   //echo '<script src="Jsx/jquery-1.11.1.min.js"></script>';
   
   
   /*
   echo '<link rel="stylesheet" type="text/css" '. 
     'href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">';
   echo '<script '.
     'src="https://code.jquery.com/jquery-3.3.1.min.js" '.
     'integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" '.
     'crossorigin="anonymous">'.
     '</script>';
   echo '<script '.
     'src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" '.
     'integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" '.
     'crossorigin="anonymous">'.
     '</script>';
   */
   
   
   
   
   
   
   
   
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
      $SignaPortraitUrl=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"?list=signaphotoportrait";
      //console.log($SignaPortraitUrl);
      // Готовим URL для настольно-ландшафтной разметки (одностраничной)
      $SignaUrl=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"?list=signaphoto";
      //console.log($SignaUrl);
      
      // Готовим URL для перезапуска сайта - "Home"
      $SignaHome=
               '<a id="aHome" href="'+'https://kwinflat.ru'+'"><i class="fa fa-tasks fa-lg" aria-hidden="true"> </i></a>';
      console.log($SignaHome);

      $SignaHome=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>";
      $SignaHome=
               '<a id="aHome" href="'+$SignaHome+'"><i class="fa fa-tasks fa-lg" aria-hidden="true"> </i></a>';
      console.log($SignaHome);

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
function markupMobileSite($c_SignaPhoto)
{
   /*
   echo '
   <div data-role = "page" id = "page1">
      <div data-role = "header">
         <div data-role="controlgroup" data-type="horizontal"> 
         <div id="bTasks" class="dibtn">
         <a id="aHome" href="'.'https://kwinflat.ru'.'"><i class="fa fa-tasks fa-lg" aria-hidden="true"> </i></a>
         </div>
   ';
   */
   /*
   echo '
   <div data-role = "page" id = "page1">
      <div data-role = "header">
         <div data-role="controlgroup" data-type="horizontal"> 
         <div id="bTasks" class="dibtn">
         <a id="aHome" href="'.'http://localhost:82/'.'"><i class="fa fa-tasks fa-lg" aria-hidden="true"> </i></a>
         </div>
   ';
   */
   echo '
   <div data-role = "page" id = "page1">
      <div data-role = "header">
         <div data-role="controlgroup" data-type="horizontal"> 
         <div id="bTasks" class="dibtn">
         <a id="aHome" href="'.'http://kwinflatht.nichost.ru'.'"><i class="fa fa-tasks fa-lg" aria-hidden="true"> </i></a>
         </div>
   ';
   echo  '<div id="c1Title"> <h1>'.'Подготовка фото для подписания'.'</h1></div>';
   echo '
         <div id="bHandoright" class="dibtn">
         <a href="#page2"><i class="fa fa-hand-o-right fa-lg" aria-hidden="true"> </i></a>
         </div>
         </div>
      </div>
      <div role="main" class="ui-content" id="cCenter">
   ';
   ViewPhoto();
   echo '
      </div>
      <div data-role = "footer">
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
         <a href="#page1"><i class="fa fa-hand-o-left fa-lg" aria-hidden="true"> </i></a>
         </div>
   ';
   echo  '<div id="c2Title"> <h1>Подписанная фотография</h1></div>';
   echo '
         <div id="bHandoright" class="dibtn">
         <a href="http://localhost:82/"><i class="fa fa-sign-out fa-lg" aria-hidden="true"> </i></a>
         </div>
         </div>
      </div>
      <div role="main" class="ui-content" id="exPhp">
   ';
   ViewProba();
   echo '
      </div>
      <div data-role = "footer">';
   echo $c_SignaPhoto; echo ': PORTRAIT<br>';
   echo '
      </div>
   </div>
   ';
}






// *** <!-- --> **************************************** SignaPhotoHtml.php ***
