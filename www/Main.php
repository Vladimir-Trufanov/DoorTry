<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// * doortry.ru    Сайт сбора сообщений об ошибках/исключениях и формирования *
// *         страницы с выводом сообщений, а также комментариев для PHP5-PHP7 *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 18.05.2019

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
// Выполняем начальную инициализацию
require_once $SiteRoot."/Inimem.php";   

// Изменяем счетчик запросов сайта из браузера и, таким образом,       
// регистрируем новую загрузку страницы
$x=$c_BrowEntry+1;
echo 'man BrowEntry='.$x.'<br>';
$c_BrowEntry=prown\MakeCookie('BrowEntry',$c_BrowEntry+1,tInt);  
echo 'man $_COOKIE["BrowEntry"]='.$_COOKIE["BrowEntry"].'<br>';

/*
// Изменяем счетчик посещений текущим посетителем      
$PersEntry = $PersEntry+1;
\prown\MakeCookie('PersEntry',$PersEntry); 
// Изменяем счетчик посещений за сессию                 
$_SESSION['Counter']++;
// echo "Вы обновили эту страницу ".$_SESSION['Counter']++." раз. ";
// echo "<br><a href=".$_SERVER['PHP_SELF'].">обновить"; 
// Если после авторизации изменилось имя пользователя,
// то перенастраиваем счетчики
if ($PersName<>$UserName)
{
   $PersEntry = 1;
   \prown\MakeCookie('PersEntry',$PersEntry); 
   $PersName=$UserName;
   \prown\MakeCookie('PersName',$PersName); 
}
*/

require_once $SiteRoot."/iHtmlBegin.php";
require_once $SiteRoot."/Site.php";
require_once $SiteRoot."/iHtmlEnd.php";

// *************************************************************** Main.php ***
