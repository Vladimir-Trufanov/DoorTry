<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * doortry.ru    Сайт сбора сообщений об ошибках/исключениях и формирования *
// *         страницы с выводом сообщений, а также комментариев для PHP5-PHP7 *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 11.10.2019
      
// echo '1. '.$_SERVER['REQUEST_URI'].'<br>';
// header('Location: http://www.new-website.com');

// Инициализируем надсайтовый каталог и каталог хостинга
require_once "iGetAbove.php";
$SiteAbove = iGetAbove($SiteRoot);      // Надсайтовый каталог
$SiteHost = iGetAbove($SiteAbove);      // Каталог хостинга
// Подключаем файлы библиотеки прикладных модулей
require_once $SiteHost."/TPhpPrown/Findes.php";
require_once $SiteHost."/TPhpPrown/getSiteDevice.php";
require_once $SiteHost."/TPhpPrown/getTranslit.php";
require_once $SiteHost."/TPhpPrown/iniConstMem.php";
require_once $SiteHost."/TPhpPrown/MakeCookie.php";
require_once $SiteHost."/TPhpPrown/MakeParm.php";
require_once $SiteHost."/TPhpPrown/MakeSession.php";
require_once $SiteHost."/TPhpPrown/ViewGlobal.php";
// Подключаем задействованные классы
require_once $SiteHost."/TPhpTools/TPageStarter/PageStarterClass.php";

// Подключаем рабочие модули сайта 
require_once $SiteRoot."/ComRequest.php";
require_once $SiteRoot."/DebugError.php";
require_once $SiteRoot."/IniCurrStih.php";
require_once $SiteRoot."/IniMenu.php";
require_once $SiteRoot."/MakeQrcode.php"; 
// Подключаем управление новостями  
require_once $SiteRoot."/Pages/News/MakeNews.php";   
require_once $SiteRoot."/Pages/News/SimpleTape.php";   
require_once $SiteRoot."/Pages/News/WithImgTape.php";   
// Выполняем запуск сессии и начальную инициализацию
//session_start();
$oMainStarter = new PageStarter('Main');
require_once $SiteRoot."/IniMem.php"; 

if (isComRequest(prown\getTranslit(ConnHandler),'list'))
   require $SiteRoot.'/Pages/DoorTry/ConnHandler.php';
else
   require $SiteRoot.'/Pages/DoorTry/SimPrincip.php';

// Подключаем управление стихами и ранее выбранное стихотворение
require_once $SiteRoot."/stihi/MakeStihi.php";   
require_once $SiteRoot."/stihi/Stih.php";   
// Изменяем счетчик запросов сайта из браузера и, таким образом,       
// регистрируем новую загрузку страницы
$c_BrowEntry=prown\MakeCookie('BrowEntry',$c_BrowEntry+1,tInt);  
// Изменяем счетчик посещений текущим посетителем      
$c_PersEntry=prown\MakeCookie('PersEntry',$c_PersEntry+1,tInt);
// Изменяем счетчик посещений за сессию                 
$s_Counter=prown\MakeSession('Counter',$s_Counter+1,tInt);   
// Если после авторизации изменилось имя пользователя,
// то перенастраиваем счетчики и посетителя
if ($c_PersName<>$c_UserName)
{
   $c_PersEntry=prown\MakeCookie('PersEntry',1,tInt);
   $s_Counter=prown\MakeSession('Counter',1,tInt); 
   $c_PersName=prown\MakeCookie('PersName',$c_UserName,tStr);
}

//\prown\ViewGlobal(avgCOOKIE);
//\prown\ViewGlobal(avgSESSION);
//\prown\ViewGlobal(avgGLOBALS);

// Если поступил запрос на страницу со стихотворением, то запускаем страницу
if (IsSet($_REQUEST['stihi'])) MakeStihi($SiteRoot,$SiteDevice);

// Если поступил запрос на пробную страницу, то запускаем её
/*
else if (isComRequest('tabmenu','list')) 
{
   $page='/Pages/tabmenu';
   Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
   //echo ("Location: http://".$_SERVER['HTTP_HOST'].$page);
}
*/
// В больштнстве остальных случаев запускаем главные страницы
else
{
   require_once $SiteRoot."/iHtmlBegin.php";
   if ($SiteDevice==Mobile)
   {   
      require_once $SiteRoot."/MobiSite.php";
   }
   else 
   {   
      require_once $SiteRoot."/Site.php";
   }
   // Подключаем и запускаем регистратор времени загрузки страницы
   require_once $SiteHost."/TPhpTools/TFixLoadTimer/FixLoadTimerClass.php";
   $oFixLoadTimer = new FixLoadTimer();
   require_once $SiteRoot."/timer.php";
   //require_once $SiteRoot."/DebugTimer.php";
   require_once $SiteRoot."/iHtmlEnd.php";
}
// *************************************************************** Main.php ***
