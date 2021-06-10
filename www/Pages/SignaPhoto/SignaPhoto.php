<?php
// PHP7/HTML5, EDGE/CHROME                               *** SignaPhoto.php ***

// ****************************************************************************
// * SignaPhoto      Главный модуль сайтостраница для подписывания фотографий *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  01.06.2021
// Copyright © 2021 tve                              Посл.изменение: 10.06.2021

require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteRoot   = $_WORKSPACE[wsSiteRoot];    // Корневой каталог сайта
$SiteAbove  = $_WORKSPACE[wsSiteAbove];   // Надсайтовый каталог
$SiteHost   = $_WORKSPACE[wsSiteHost];    // Каталог хостинга
$SiteDevice = $_WORKSPACE[wsSiteDevice];  // 'Computer' | 'Mobile' | 'Tablet'
// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
//require_once $TPhpPrown."/TPhpPrown/CommonPrown.php";
// Подключаем файлы библиотеки прикладных классов:
//$TPhpTools=$SiteHost.'/TPhpTools';
//require_once $TPhpTools."/TPhpTools/iniErrMessage.php";
// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteHost."/TDoorTryer/DoorTryerPage.php";
try 
{
   require_once 'SignaPhotoHtml.php';
   HtmlBegin();
   echo '<link rel="stylesheet" type="text/css" href="SignaPhoto.css">';

   // Как можно раньше (до полной загрузки страницы) определяем
   // ориентацию смартфона
   echo '
      <script>
      SiteDevice="Computer";
   ';
   if ($SiteDevice=='Mobile')
   {
      ?>
      console.log(SiteDevice);
      // Определяем защишенность сайта, для того чтобы правильно сформулировать 
      // в запросе "http" или "https"
      $https="<?php echo $_SERVER['HTTPS']; ?>"
      if ($https=='off') $https='http'
      else $https='https'; 
      console.log($https);
      // Готовим вызов страницы c разметкой для режима "мобильный и портретный"
      // и перезапускем страницу
      $page=$https+'://'+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphotoportrait";
      console.log($page);
      window.location = $page;
      <?php
   }
   echo '
      </script>
   ';
   echo '</head>';
   echo '<body>';
   echo 'Компьютер или мобильнай и ландшафтный';
   /*
   echo '***<br>';
   echo 'Всем привет!<br>';
   echo '<pre>';
   print_r(gd_info());
   echo '</pre>';
   echo '***<br>';
   */
   echo '</body>';
   echo '</html>';
   //prown\ViewGlobal(avgSERVER);
   //prown\ViewGlobal(avgCOOKIE);
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// *** <!-- --> ******************************************** SignaPhoto.php ***
