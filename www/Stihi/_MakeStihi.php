<?php
// PHP7/HTML5, EDGE/CHROME                                *** MakeStihi.php ***

// ****************************************************************************
// * doortry.ru                          Диспетчер запуска страниц со стихами *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 24.09.2021

function MakeStihi($SiteRoot,$SiteHost,$SiteDevice)
{
   // Определяем каталог страницы со стихотворением (где есть index.php)
   $StihoPage=prown\getComRequest('stihi');  // sorevnovanie-s-hakerami
   //$page='/Stihi/'.$StihoPage;
   // Запускаем сценарий стихотворения
   // Подключаем файлы библиотеки прикладных модулей:
   $TPhpPrown=$SiteHost.'/TPhpPrown';
   require_once $TPhpPrown."/TPhpPrown/iniConstMem.php";
   // Подключаем собственно модули страницы стихотворения
   require_once $SiteRoot."/Stihi/_StihiCommon.php";   
   require_once $SiteRoot.'/Stihi/'.$StihoPage.'.php';   
   // Формируем страницу окружения стихотворения
   echo '<!DOCTYPE html>';
   echo '<html lang="ru">';
   echo '<head>';
   echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
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
 
   echo $SeoTag;

   echo '<link href="Stihi/_Stihi.css"  rel="stylesheet" type="text/css">';
   echo '</head>';
   echo '<body>';
   // Делаем разметку страницы для смартфона
   if ($SiteDevice==Mobile) 
   {   
      //Proba($CrankyOldMan,$btSsylki,$KapriznyjStarik,$KapriznyjStarikInfo);  
   }
   // Делаем разметку страницы для компьютера
   else
   { 
      echo $MakePage; 
   }
   echo '</body>'; 
   echo '</html>';
}
// ********************************************************** MakeStihi.php ***
