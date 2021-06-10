<?php
// PHP7/HTML5, EDGE/CHROME                           *** SignaPhotoHtml.php ***

// ****************************************************************************
// * SignaPhoto                         Вспомогательные функции сайтостраницы *
// *                                              для подписывания фотографий *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.06.2021
// Copyright © 2021 tve                              Посл.изменение: 10.06.2021

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
// *** <!-- --> **************************************** SignaPhotoHtml.php ***
