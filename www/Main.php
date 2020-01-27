<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * doortry.ru    Сайт сбора сообщений об ошибках/исключениях и формирования *
// *         страницы с выводом сообщений, а также комментариев для PHP5-PHP7 *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 27.01.2020
      
// Подключаем файлы библиотеки прикладных модулей:
// а) директива Allow_url_include позволяет использоваnm обертки Fopen, 
// которые поддерживают работу с URL, в функциях Include, Include_once, 
// Require, Require_once. Директива Allow_url_include требует включения 
// опции Allow_url_fopen;
// б) директива Allow_url_fopen включает поддержку оберток URL (URL wrappers), 
// которые позволяют работать с объектами URL, как с обычными файлами. Обертки,
// доступные по умолчанию, служат для работы с удаленными файлами с 
// использованием Ftp или Http протокола.
$TPhpPrown=$_SERVER['DOCUMENT_ROOT'];
//$TPhpPrown='https://doortry.ru';
require_once $TPhpPrown."/TPhpPrown/Findes.php";
require_once $TPhpPrown."/TPhpPrown/getAbove.php";
require_once $TPhpPrown."/TPhpPrown/getSiteDevice.php";
require_once $TPhpPrown."/TPhpPrown/getTranslit.php";
require_once $TPhpPrown."/TPhpPrown/iniConstMem.php";
require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
require_once $TPhpPrown."/TPhpPrown/MakeParm.php";
require_once $TPhpPrown."/TPhpPrown/MakeSession.php";
require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";
// Инициализируем корневой каталог, надсайтовый каталог и каталог хостинга
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
$SiteAbove=prown\GetAbove($SiteRoot);      // Надсайтовый каталог
$SiteHost=prown\GetAbove($SiteAbove);      // Каталог хостинга
// Подключаем задействованные классы
require_once $SiteHost."/TPhpTools/TPageStarter/PageStarterClass.php";
// Подключаем рабочие модули сайта 
require_once $SiteRoot."/ComRequest.php";
//require_once $SiteRoot."/DebugError.php";
require_once $SiteRoot."/IniCurrStih.php";
require_once $SiteRoot."/IniTPhpPrown.php";
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
// Подключаем нужную главную страницу
if (isComRequest(prown\getTranslit(ConnHandler),'list'))
{
   require $SiteRoot.'/Pages/DoorTry/ConnHandler.php';
}
else
{
   require $SiteRoot.'/Pages/DoorTry/SimPrincip.php';
}
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
//\prown\ViewGlobal(avgSESSION);
//\prown\ViewGlobal(avgGLOBALS);

// Если поступил запрос на страницу со стихотворением, то запускаем страницу
if (IsSet($_REQUEST['stihi'])) MakeStihi($SiteRoot,$SiteDevice);
// Если поступил запрос на пробную страницу, то запускаем её
else if (isComRequest('proba','list')) 
{
   $page='/Pages/Proba/ProbaTest.php';
   Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
   //echo ("Location: http://".$_SERVER['HTTP_HOST'].$page);
}
// В большинстве остальных случаев запускаем главные страницы
else
{
   require_once $SiteRoot."/iHtmlBegin.php";
   if ($SiteDevice==Mobile)
   {   
      require_once $SiteRoot."/MobiSite.php";
   }
   else 
   {
      //echo $SiteRoot."/TPhpPrown/Findes.php".'<br>';
      //echo $SiteAbove."/TPhpPrown/Findes.php".'<br>';
      //echo $SiteHost."/TPhpPrown/Findes.php".'<br>';
      require_once $SiteRoot."/Site.php";
   }
   // Подключаем и запускаем регистратор времени загрузки страницы
   require_once $SiteHost."/TPhpTools/TFixLoadTimer/FixLoadTimerClass.php";
   $oFixLoadTimer = new FixLoadTimer();
   //require_once $SiteRoot."/timer.php";
   //require_once $SiteRoot."/DebugTimer.php";
   //\prown\ViewGlobal(avgCOOKIE);
   //require_once $SiteRoot."/get-info.php";
   require_once $SiteRoot."/iHtmlEnd.php";
}
// *************************************************************** Main.php ***
