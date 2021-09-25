<?php
// PHP7/HTML5, EDGE/CHROME                              *** StihiCommon.php ***

// ****************************************************************************
// *           Общие функции обслуживания страниц стихотворений               *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  16.09.2021
// Copyright © 2021 tve                              Посл.изменение: 24.09.2021

function blockImg($src,$alt,$StihoPage)
{
   $path=dirStihi.$StihoPage.'/'.$src;
   $Result=
   '<img class="bImg" src="'.$path.'" alt="'.$alt.'">'.
   '<p class="pStrap">'.$alt.'</p>';
   return $Result;
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
   return $str;
}

function modelImgTxtEO($widthLeft,$widthRight,$imgFile,$imgComm,$txt1='',$txt2='',$StihoPage)
{
   // Определяем ширины колонок
   $s1=
   '<style type="text/css">'.
   '.blo1left {width:'.$widthLeft.';float:left;}'.
   '.blo1right{width:'.$widthRight.';float:right;}'.
   '</style>';
   // Выводим левый блок
   $s2=
   '<div class="blo1left">'.
   blockImg($imgFile,$imgComm,$StihoPage).
   '</div>';
   // Выводим правый блок
   $s3=
   '<div class="blo1right">'.
   eche($txt1).$txt2.
   '</div>';
   return $s1.$s2.$s3;
}

/*
function modelImgTxtEE($widthLeft,$widthRight,$imgFile,$imgComm,$txt1='',$txt2='',$StihoPage)
{
   // Определяем ширины колонок
   echo '<style type="text/css">
   .ImgTxtEEleft {width:'.$widthLeft.';float:left;}
   .ImgTxtEEright{width:'.$widthRight.';float:right;}
   </style>';
   // Выводим левый блок
   echo '<div class="ImgTxtEEleft">';
   blockImg($imgFile,$imgComm,$StihoPage);
   echo '</div>';
   // Выводим правый блок
   echo '<div class="ImgTxtEEright">';
   eche($txt1);
   eche($txt2);
   echo '</div>';
}
*/

function modelTxtEImg($widthLeft,$widthRight,$txt='',$imgFile,$imgComm,$StihoPage)
{
   // Определяем ширины колонок
   $s1=
   '<style type="text/css">
   .TxtEImgleft {width:'.$widthLeft.';float:left;}
   .TxtEImgright{width:'.$widthRight.';float:right;}
   </style>';
   // Выводим левый блок
   $s2=
   '<div class="TxtEImgleft">'.
   eche($txt).
   '</div>';
   // Выводим правый блок
   $s3=
   '<div class="TxtEImgright">'.
   blockImg($imgFile,$imgComm,$StihoPage).
   '</div>';
   return $s1.$s2.$s3;
}

function model1txe3imgTxtImg($widthLeft,$widthRight,$txtLeft,
   $imgFileTop,$imgCommTop,$txt,$imgFileBottom,$imgCommBottom,$StihoPage)
{
   // Определяем ширины колонок
   echo '<style type="text/css">
   #m1te3itxileft {width:'.$widthLeft.';float:left;}
   #m1te3itxiright{width:'.$widthRight.';float:right;}
   </style>';
   // Выводим левый блок
   echo '<div id="m1te3itxileft">';
   eche($txtLeft);
   echo '</div>';
   // Выводим правый блок
   echo '<div id="m1te3itxiright">';
   blockImg($imgFileTop,$imgCommTop,$StihoPage);
   echo $txt;
   blockImg($imgFileBottom,$imgCommBottom,$StihoPage);
   echo '</div>';
}
// <!-- --> *********************************************** StihiCommon.php ***
