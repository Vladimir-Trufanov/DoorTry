<?php
// PHP7/HTML5, EDGE/CHROME                               *** iHtmlBegin.php ***

// ****************************************************************************
// * doortry.ru                                         Загрузить начало HTML * 
// *                              c подключением основного или мобильного CSS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.01.2019
// Copyright © 2019 tve                              Посл.изменение: 19.08.2019

echo  '<!DOCTYPE html>';
echo  '<html lang="ru">';
echo  '<head>';
echo  '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
echo  '<!-- <meta name="viewport" content="width=device-width"> -->';
      SeoTags();
echo  '<link href="Styles/Styles.css" rel="stylesheet">';
      if (isNews()) 
echo  '<link href="Styles/IsColNews.css" rel="stylesheet">'; 
      else
echo  '<link href="Styles/NoColNews.css" rel="stylesheet">'; 
echo  '<link href="JS/TJsPrown.css" rel="stylesheet" type="text/css">'; 
echo  '<script src="/JS/TJsPrown.js"></script>';
echo  '<script src="/JS/DoorTry.js"></script>';
echo  '<script src="/JS/FixLoadTimer.js"></script>';
echo  '</head>';
echo  '<body>';
// ********************************************************* iHtmlBegin.php ***
