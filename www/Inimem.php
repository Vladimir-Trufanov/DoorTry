<?php 
// PHP7/HTML5, EDGE/CHROME                                   *** Inimem.php ***

// ****************************************************************************
// * doortry.ru                    Произвести установки глобальных переменных *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 25.05.2019

// Определяем сайтовые константы
define ("Atfirst",    "atf");    // Перевести переменные в начальные условия  
define ("ChangeSize", "chs");    // "Изменить размер базового шрифта"  
define ("Computer", "Computer"); // устройство, запросившее сайт - компьютер  
define ("Mobile", "Mobile");     // устройство, запросившее сайт - смартфон  
define ("Tablet", "Tablet");     // устройство, запросившее сайт - планшет  
// ------------------------------------ формы представления новостной ленты ---
define ("frnSimple",  1);        // простая новостная лента  
define ("frnWithImg", 2);        // новостная лента с изображениями  
// ---------------------- регулятор кукисов (порядок использования кукисов) ---
define ("rciCookiNo", 0);        // еще не известно разрешены ли браузером кукисы
define ("rciCookiUserNo", 1);    // браузером кукисы разрешены, пользователем еще нет
define ("rciCookiUserYes", 2);   // пользователем разрешено использование кукисов

// Инициализируем общие переменные сайтового сценария
$SiteDevice=prown\getSiteDevice();                 // 'Computer','Mobile','Tablet'
$UserName=$_COOKIE['PersName'] ?? "Гость";         // логин авторизованного посетителя 
$Uagent=$_SERVER['HTTP_USER_AGENT'];               // HTTP_USER_AGENT

// Инициализируем сессионные переменные
$s_Counter=prown\MakeSession('Counter',0,tInt);    // посещения за сессию

// Инициализируем переменные-кукисы
echo 'ini BrowEntry='.'3'.'<br>';
$c_BrowEntry=prown\MakeCookie('BrowEntry',3,tInt,true);          // число запросов сайта из браузера
$c_PersName=prown\MakeCookie('PersName',"Гость",tStr,true);      // логин посетителя
$с_ResCookie=prown\MakeCookie('ResCookie',rciCookiNo,tInt,true); // число запросов сайта посетителем     
echo 'ini $_COOKIE["BrowEntry"]='.$_COOKIE["BrowEntry"].'<br>';

// Инициализируем параметры страницы сайта 
//$p_FormNews=prown\MakeParm('FormNews',frnWithImg); // форма представления новостей

//\prown\ViewGlobal(avgCOOKIE);
//\prown\ViewGlobal(avgSESSION);
//\prown\ViewGlobal(avgGLOBALS);

// ************************************************************* Inimem.php *** 
