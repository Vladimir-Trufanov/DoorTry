<?php 
// PHP7/HTML5, EDGE/CHROME                                   *** iniMem.php ***

// ****************************************************************************
// * doortry.ru                    Произвести установки глобальных переменных *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 23.09.2021

// Выделение строк меню при показе кода страницы в браузере
define ("NewLine", "\r\n");

// Определяем сайтовые константы
define ("Atfirst",    "atf");    // Перевести переменные в начальные условия  
define ("ChangeSize", "chs");    // "Изменить размер базового шрифта"  
define ("NotNews", "NotNews");   // "Новости неинициированы"  
// -------------------------------------------------- Основные статьи сайта ---
define ("SimPrincip", "Простой принцип программирования");       
define ("ConnHandler", "Подключение обработчика ошибок и исключений");        
// ------------------------------------ Формы представления новостной ленты ---
define ("frnSimple",  1);        // простая новостная лента  
define ("frnWithImg", 2);        // новостная лента с изображениями  
// ---------------------- Регулятор кукисов (порядок использования кукисов) ---
define ("rciCookiNo", 0);        // еще не известно разрешены ли браузером кукисы
define ("rciCookiUserNo", 1);    // браузером кукисы разрешены, пользователем еще нет
define ("rciCookiUserYes", 2);   // пользователем разрешено использование кукисов
// ----------------- Адрес корневого каталога изображений для стихотворений ---
define ("dirStihi",'/Stihi/');

// Инициализируем массив новостных лент и массив стихотворений
// Ссылка на список RSS-каналов "https://subscribe.ru/catalog?rss"
$aNews=array
(
   'Ведомости России'                => 'http://www.vedomosti.ru/newsline/out/rss.xml', 
   'Cтолица на Онего'                => 'https://stolicaonego.ru/rss.php',
   'Новости Абхазии'                 => 'https://www.votpusk.ru/newsrss/cn/newsAB1.xml',
   'Новости российского спорта'      => 'http://stadium.ru/rss', 
   'Военное обозрение'               => 'http://topwar.ru/rss.xml',
   'Новости Mail.ru'                 => 'http://news.mail.ru/rss/',
   'Идеи перепланировки и ремонта'   => 'https://www.houzz.ru/getGalleries/featured/out-rss', 
   'Все самое самое'                 => 'http://only-most.ru/?feed=rss', 
);
$aStihi=array
( 
   'Соревнование с хакерами' => 'sorevnovanie-s-hakerami',   
   'Капризный старик'        => 'kapriznyj-starik',   
);
// Инициализируем переменные-кукисы
$c_BrowEntry=prown\MakeCookie('BrowEntry',0,tInt,true);          // число запросов сайта из браузера
$c_PersEntry=prown\MakeCookie('PersEntry',0,tInt,true);          // счетчик посещений текущим посетителем
$c_PersName=prown\MakeCookie('PersName',"Гость",tStr,true);      // логин посетителя
$с_ResCookie=prown\MakeCookie('ResCookie',rciCookiNo,tInt,true); // порядок использования кукисов     
$c_UserName=prown\MakeCookie('UserName',"Гость",tStr,true);      // логин авторизованного посетителя
// Каталог текущего стихотворения - записи базы данных
$c_StihoPage=prown\MakeCookie('CurrStih',"sorevnovanie-s-hakerami",tStr,true); 
$c_StihoPage=IniCurrStih($c_StihoPage);
// Инициализируем параметры страницы сайта 
if ($SiteDevice==Mobile) 
{   
   $p_NewsForm=prown\MakeParm('NewsForm',frnWithImg);            // форма представления новостей
}
else
{
   $p_NewsForm=prown\MakeParm('NewsForm',frnSimple);             // форма представления новостей
}
$p_NewsAmt=prown\MakeParm('NewsAmt',8);                          // количество новостей в форме
$p_NewsView=prown\MakeParm('NewsView',true,tBool,true);          // true - разворачивать новости при загрузке
// Инициализируем сессионные переменные
$s_Counter=prown\MakeSession('Counter',0,tInt,true);             // посещения за сессию
$s_NameNews=prown\MakeSession('NameNews',NotNews,tStr,true);     // активированная лента новостей

// ************************************************************* iniMem.php *** 
