<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * doortry.ru    Сайт сбора сообщений об ошибках/исключениях и формирования *
// *         страницы с выводом сообщений, а также комментариев для PHP5-PHP7 *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 18.05.2019
      
// echo '1. '.$_SERVER['REQUEST_URI'].'<br>';
// header('Location: http://www.new-website.com');

session_start(); 

// Инициализируем надсайтовый каталог и каталог хостинга
require_once "iGetAbove.php";
$SiteAbove = iGetAbove($SiteRoot);      // Надсайтовый каталог
$SiteHost = iGetAbove($SiteAbove);      // Каталог хостинга
// Подключаем файлы библиотеки прикладных модулей
require_once $SiteHost."/TPhpPrown/getSiteDevice.php";
require_once $SiteHost."/TPhpPrown/iniConstMem.php";
require_once $SiteHost."/TPhpPrown/MakeCookie.php";
require_once $SiteHost."/TPhpPrown/MakeParm.php";
require_once $SiteHost."/TPhpPrown/MakeSession.php";
require_once $SiteHost."/TPhpPrown/ViewGlobal.php";
// Подключаем задействованные классы

// Подключаем рабочие модули сайта 
require_once $SiteRoot."/IniMenu.php";
require_once $SiteRoot."/MakeQrcode.php";   
require_once $SiteRoot."/Pages/ConnHandler.php";   
require_once $SiteRoot."/Pages/SimPrincip.php"; 
require_once $SiteRoot."/Pages/News/NewsView.php";   
require_once $SiteRoot."/Pages/News/SimpleTape.php";   
require_once $SiteRoot."/Pages/News/WithImgTape.php";   
require_once $SiteRoot."/Pages/Stih/Stih.php";   
// Выполняем начальную инициализацию
require_once $SiteRoot."/Inimem.php";   

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

require_once $SiteRoot."/iHtmlBegin.php";
require_once $SiteRoot."/Site.php";
// Подключаем и запускаем регистратор времени загрузки страницы
require_once $SiteHost."/TPhpTools/TFixLoadTimer/FixLoadTimerClass.php";
$oFixLoadTimer = new FixLoadTimer();
//oFixLoadTimer->mask = $mask;
require_once $SiteRoot."/iHtmlEnd.php";

// *************************************************************** Main.php ***
