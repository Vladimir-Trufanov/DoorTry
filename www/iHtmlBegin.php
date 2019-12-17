<?php
// PHP7/HTML5, EDGE/CHROME                               *** iHtmlBegin.php ***

// ****************************************************************************
// * doortry.ru                                         Загрузить начало HTML * 
// *                              c подключением основного или мобильного CSS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.01.2019
// Copyright © 2019 tve                              Посл.изменение: 18.11.2019

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
// Указываем на используемую фавиконку
echo '<link rel="icon" href="https://doortry.ru/favicon.ico" type="image/x-icon">';
echo '<link rel="shortcut icon" href="https://doortry.ru/favicon.ico" type="image/x-icon">';
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
// Подключаем jquery/jquery-ui
echo '<link rel="stylesheet" type="text/css" '. 
     'href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">';
echo '<script '.
     'src="https://code.jquery.com/jquery-3.3.1.min.js" '.
     'integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" '.
     'crossorigin="anonymous">'.
     '</script>';
echo '<script '.
     'src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"'.
     'integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" '.
     'crossorigin="anonymous">'.
     '</script>';
// Подключаем SmartMenus
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
echo '<script src="SmartMenus/jquery.smartmenus.min.js"></script>';
echo '<script src="SmartMenus/MakeSmartMenu.js"></script>';
echo '<link rel="stylesheet" href="SmartMenus/sm-core-css.css">';
//
SeoTags();
// Делаем страницу для смартфона
if ($SiteDevice==Mobile) 
{   
   //echo '<script>alert("Mobile");</script>';
   echo '<link href="Styles/MobiStyles.css" rel="stylesheet">';
   echo '<link href="Styles/Stihi.css" rel="stylesheet">';
   echo '<link rel="stylesheet" href="SmartMenus/sm-doortry-mobi.css">';
}
// Делаем страницу для компьютера
else 
{   
   //echo '<script>alert("Computer");</script>';
   echo '<link href="Styles/Styles.css" rel="stylesheet">';
   echo '<link href="Styles/Stihi.css" rel="stylesheet">';
   echo '<link rel="stylesheet" href="SmartMenus/sm-doortry.css">';
}
// Определяем заданную ленту новостей
getNews();
if (isNews($s_NameNews)) 
   echo '<link href="Styles/IsColNews.css" rel="stylesheet">'; 
else
   echo '<link href="Styles/NoColNews.css" rel="stylesheet">';
// Подключаем вспомогательные JS
echo '<link href="TJsPrown/TJsPrown.css" rel="stylesheet" type="text/css">'; 
echo '<script src="/JS/DoorTry.js"></script>';
echo '<script type="text/javascript" src="/JS/jquery.doubleScroll.js"></script>';
echo '<script src="/JS/FixLoadTimer.js"></script>';
echo '<script src="/TJsPrown/TJsPrown.js"></script>';
// Разворачиваем смартменю
?> 
<script>
MakeSmartMenu();
</script>
<?php
echo '</head>';
echo '<body>';
//echo '<div id="res">Сообщение</div>';

// ********************************************************* iHtmlBegin.php ***
