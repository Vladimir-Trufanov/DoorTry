<?php
// PHP7/HTML5, EDGE/CHROME                               *** iHtmlBegin.php ***

// ****************************************************************************
// * doortry.ru                                         Загрузить начало HTML * 
// *                              c подключением основного или мобильного CSS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.01.2019
// Copyright © 2019 tve                              Посл.изменение: 30.08.2019

// Делаем страницу для смартфона
if ($SiteDevice==Mobile) 
{   
   echo '<!DOCTYPE html>';
   echo '<html lang="ru">';
   echo '<head>';
   // Добавляем Google аналитику
   echo '<!-- Global site tag (gtag.js) - Google Analytics -->';
   echo '<script async src="https://www.googletagmanager.com/gtag/js?id=UA-36748654-2"></script>';
   echo '<script>';
   echo '  window.dataLayer = window.dataLayer || [];';
   echo '  function gtag(){dataLayer.push(arguments);}';
   echo "  gtag('js', new Date());";
   echo '';
   echo "  gtag('config', 'UA-36748654-2');";
   echo '</script>';
   // Указываем на используемую фавиконку
   echo '<link rel="icon" href="https://doortry.ru/favicon.png" type="image/png">';
   echo '<link rel="shortcut icon" href="https://doortry.ru/favicon.png" type="image/png">';
   //
   echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
   SeoTags();
   echo '<link href="Styles/MobiStyles.css" rel="stylesheet">';
   echo '<link href="Styles/Stihi.css" rel="stylesheet">';
   echo '<link href="JS/TJsPrown.css" rel="stylesheet" type="text/css">'; 
   echo '<script src="/JS/TJsPrown.js"></script>';
   echo '<script src="/JS/DoorTry.js"></script>';
   echo '<script src="/JS/FixLoadTimer.js"></script>';
   echo '</head>';
   echo '<body>';
}
// Делаем страницу для компьютера
else 
{   
   echo '<!DOCTYPE html>';
   echo '<html lang="ru">';
   echo '<head>';
   // Добавляем Google аналитику
   echo '<!-- Global site tag (gtag.js) - Google Analytics -->';
   echo '<script async src="https://www.googletagmanager.com/gtag/js?id=UA-36748654-2"></script>';
   echo '<script>';
   echo '  window.dataLayer = window.dataLayer || [];';
   echo '  function gtag(){dataLayer.push(arguments);}';
   echo "  gtag('js', new Date());";
   echo '';
   echo "  gtag('config', 'UA-36748654-2');";
   echo '</script>';
   //
   echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
   SeoTags();
   echo '<link href="Styles/Styles.css" rel="stylesheet">';
   echo '<link href="Styles/Stihi.css" rel="stylesheet">';
   // Определяем заданную ленту новостей
   getNews();
   if (isNews($s_NameNews)) 
      echo '<link href="Styles/IsColNews.css" rel="stylesheet">'; 
   else
      echo '<link href="Styles/NoColNews.css" rel="stylesheet">';
   echo '<link href="JS/TJsPrown.css" rel="stylesheet" type="text/css">'; 
   echo '<script src="/JS/TJsPrown.js"></script>';
   echo '<script src="/JS/DoorTry.js"></script>';
   echo '<script src="/JS/FixLoadTimer.js"></script>';
   echo '</head>';
   echo '<body>';
}
// ********************************************************* iHtmlBegin.php ***
