<?php
// PHP7/HTML5, EDGE/CHROME                             *** iniHtmlBegin.php ***

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
if ($_SERVER['HTTP_HOST']=='doortry.ru')
{
   echo '<!-- Global site tag (gtag.js) - Google Analytics -->';
   echo '<script async src="https://www.googletagmanager.com/gtag/js?id=UA-36748654-2"></script>';
   echo '<script>';
   echo '  window.dataLayer = window.dataLayer || [];';
   echo '  function gtag(){dataLayer.push(arguments);}';
   echo "  gtag('js', new Date());";
   echo '';
   echo "  gtag('config', 'UA-36748654-2');";
   echo '</script>';
}
// Подключаем jquery/jquery-ui

   echo '
      <link rel="stylesheet" href="Jsx/jquery-ui.min.css"/> 
      <script src="Jsx/jquery-1.11.1.min.js"></script>
      <script src="Jsx/jquery-ui.min.js"></script>
   ';


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
   echo '<link rel="stylesheet" href="SmartMenus/sm-doortry-mobi.css">';
}
// Делаем страницу для компьютера
else 
{   
   echo '<link href="Styles/Styles.css" rel="stylesheet">';
   echo '<link rel="stylesheet" href="SmartMenus/sm-doortry.css">';
}
// Определяем заданную ленту новостей
getNews();
if (isNews($s_NameNews)) 
   echo '<link href="Styles/IsColNews.css" rel="stylesheet">'; 
else
   echo '<link href="Styles/NoColNews.css" rel="stylesheet">';
// Подключаем вспомогательные JS
echo '<link href="Jsx/TJsPrown.css" rel="stylesheet" type="text/css">'; 
echo '<script src="/Jsx/DoorTry.js"></script>';
echo '<script src="/Jsx/jquery.doubleScroll.js"></script>';
echo '<script src="/Jsx/FixLoadTimer.js"></script>';
echo '<script src="/Jsx/TJsPrown.js"></script>';
// Разворачиваем смартменю
echo '<script> MakeSmartMenu(); </script>';
// Подключаем яндекс-метрику
if ($_SERVER['HTTP_HOST']=='doortry.ru')
{
echo '
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(56869024, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56869024" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
';
}
echo '</head>';
echo '<body>';
//echo '<div id="res">Сообщение</div>';

// ******************************************************* iniHtmlBegin.php ***
