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
$Uagent=$_SERVER['HTTP_USER_AGENT'];               // HTTP_USER_AGENT

// Инициализируем переменные-кукисы
$c_BrowEntry=prown\MakeCookie('BrowEntry',0,tInt,true);          // число запросов сайта из браузера
$c_PersEntry=prown\MakeCookie('PersEntry',0,tInt,true);          // счетчик посещений текущим посетителем
$c_PersName=prown\MakeCookie('PersName',"Гость",tStr,true);      // логин посетителя
$с_ResCookie=prown\MakeCookie('ResCookie',rciCookiNo,tInt,true); // порядок использования кукисов     
$c_UserName=prown\MakeCookie('UserName',"Гость",tStr,true);      // логин авторизованного посетителя

// Инициализируем параметры страницы сайта 
$p_NewsForm=prown\MakeParm('NewsForm',frnSimple);                // форма представления новостей
$p_NewsAmt=prown\MakeParm('NewsAmt',8);                          // количество новостей в форме
$p_NewsView=prown\MakeParm('NewsView',false,tBool,true);         // true - разворачивать новости при загрузке

// Инициализируем сессионные переменные
$s_Counter=prown\MakeSession('Counter',0,tInt,true);             // посещения за сессию

\prown\ViewGlobal(avgCOOKIE);
//\prown\ViewGlobal(avgSESSION);
//\prown\ViewGlobal(avgGLOBALS);

// ************************************************************* Inimem.php *** 
