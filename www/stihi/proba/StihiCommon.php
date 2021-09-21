<?php
// PHP7/HTML5, EDGE/CHROME                  *** StihiCommon.php ***

// ****************************************************************************
// *                 Страница стихотворения ""                *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  16.09.2021
// Copyright © 2021 tve                              Посл.изменение: 20.09.2021

function blockImg($src,$alt)
{
   $Result=
   '<img class="bImg" src="'.$src.'" alt="'.$alt.'">'.
   '<p class="pStrap">'.$alt.'</p>';
   echo $Result;
}

function eche($stri)
{
   // Заставляем анализировать строку, как форматированную
   $str='<pre>'.$stri.'</pre>';
   // Заменяем переводы строк на '<br>'
   $news='';
   for ($i=0; $i<strlen($str); $i++)
   {
      if (ord($str[$i])==13) $news=$news.'<br>';
      else if (ord($str[$i])==10) $news=$news;
      else $news=$news.$str[$i];
   }
   // Вырезаем '<pre>' и '</pre>'
   $str=substr($news,5,strlen($news)-11);
   echo $str;
}

function modelImgTxtEO($widthLeft,$widthRight,$imgFile,$imgComm,$txt1='',$txt2='')
{
   // Определяем ширины колонок
   echo '<style type="text/css">
   .blo1left {width:'.$widthLeft.';}
   .blo1right{width:'.$widthRight.';}
   </style>';
   // Выводим левый блок
   echo '<div class="blo1left">';
   blockImg($imgFile,$imgComm);
   echo '</div>';
   // Выводим правый блок
   echo '<div class="blo1right">';
   eche($txt1);
   echo $txt2;
   echo '</div>';
}


function modelImgTxtEO1($widthLeft,$widthRight,$txtLeft,
   $imgFileTop,$imgCommTop,$txt,$imgFileBottom,$imgCommBottom)
{
   // Определяем ширины колонок
   echo '<style type="text/css">
   .blo1left {width:'.$widthLeft.';}
   .blo1right{width:'.$widthRight.';}
   </style>';
   // Выводим левый блок
   echo '<div class="blo1left">';
   eche($txtLeft);
   echo '</div>';
   // Выводим правый блок
   echo '<div class="blo1right">';
   blockImg($imgFileTop,$imgCommTop);
   echo $txt;
   blockImg($imgFileBottom,$imgCommBottom);
   echo '</div>';
}
// <!-- --> ****************************** StihiCommon.php ***
