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
function HtmlBegin()
{
   $Result=true;
   echo '<!DOCTYPE html>';
   echo '<html lang="ru">';
   echo '<head>';
   echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
   echo '<title>Подписать фотографию</title>';
   echo '<meta name="description" content="Проба Img">';
   echo '<meta name="keywords"    content="Проба Img">';

   echo '<script src="SignaPhoto.js"></script>';
   echo '<script '.
      'src="https://code.jquery.com/jquery-3.3.1.min.js" '.
      'integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" '.
      'crossorigin="anonymous">'.
      '</script>';
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

// *** <!-- --> **************************************** SignaPhotoHtml.php ***
