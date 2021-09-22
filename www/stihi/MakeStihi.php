<?php
// PHP7/HTML5, EDGE/CHROME                                *** MakeStihi.php ***

// ****************************************************************************
// * doortry.ru                          Диспетчер запуска страниц со стихами *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 22.09.2021

function MakeStihi($SiteRoot,$SiteHost,$SiteDevice)
{
   // Определяем каталог страницы со стихотворением (где есть index.php)
   $StihoPage=prown\getComRequest('stihi');  // sorevnovanie-s-hakerami
   $page='/stihi/'.$StihoPage;
   // Запускаем сценарий стихотворения, отправляя заголовок страницы
   /*
   echo('$StihoPage='.$StihoPage.'<br>');
   echo('$page='.$page.'<br>');
   echo("Location: http://".$_SERVER['HTTP_HOST'].$page);
   */
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      Header("Location: https://".$_SERVER['HTTP_HOST'].$page);
   else
   {
      if ($StihoPage=='staraya-versiya') Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
      else
      {
         //Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
         //echo('$StihoPage='.$StihoPage.'<br>');
         //echo  ("Location: http://".$_SERVER['HTTP_HOST'].$page);

// Инициализируем рабочее пространство: корневой каталог сайта и т.д.
/*
require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteRoot   = $_WORKSPACE[wsSiteRoot];    // Корневой каталог сайта
$SiteAbove  = $_WORKSPACE[wsSiteAbove];   // Надсайтовый каталог
$SiteHost   = $_WORKSPACE[wsSiteHost];    // Каталог хостинга
$SiteDevice = $_WORKSPACE[wsSiteDevice];  // 'Computer' | 'Mobile' | 'Tablet'
*/
// Подключаем файлы библиотеки прикладных модулей:
$TPhpPrown=$SiteHost.'/TPhpPrown';
require_once $TPhpPrown."/TPhpPrown/iniConstMem.php";
// Подключаем задействованные классы
// require_once $SiteHost."/TPhpTools/TPhpTools/TPageStarter/PageStarterClass.php";
// Подключаем собственно модули страницы стихотворения
require_once $SiteRoot."/stihi/StihiCommon.php";   
require_once $SiteRoot.'/stihi/'.$StihoPage.'/'.$StihoPage.'.php';   
// Выполняем запуск сессии и начальную инициализацию
//session_start();
//$oStihiStarter = new PageStarter('Stihi');
// Формируем страницу окружения стихотворения
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
echo '<title>=--- Капризный старик</title>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
echo '<meta name="description" content="'.
         '---Бежал ноябрь, работа шла '.
         'В душе кипели страсти '.
         'Жил на работе - чуть дыша '.
         'На улице - ненастье '.
     '">';
echo '<meta name="keywords" content="'.
         '---стихи,всякие,разные,страсти,хакеры,защита,программирование,'.
         'девушки,встречи'.
     '">';
echo '<link href="stihi/Styles.css" rel="stylesheet" type="text/css">';
echo '<link href="stihi/Stihi.css"  rel="stylesheet" type="text/css">';
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
   //echo('$StihoPage='.$StihoPage.'<br>');
   //Proba($CrankyOldMan,$btSsylki,$KapriznyjStarik,$KapriznyjStarikInfo);
   MakePage();  
}
echo '</body>'; 
echo '</html>';
         
      }
   }
}
// ********************************************************** MakeStihi.php ***
