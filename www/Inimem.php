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
define ("Computer", "Computer"); // "Устройство, запросившее сайт - компьютер"  
define ("Mobile", "Mobile");     // "Устройство, запросившее сайт - смартфон"  
define ("Tablet", "Tablet");     // "Устройство, запросившее сайт - планшет"  

// Определяем параметры сессии:
//    cookie_lifetime=0 говорит о времени жизни файлов куки до закрытия браузера, 
// если задать этому параметру определенное значение, сессия будет прерываться 
// при активном сеансе, поэтому лучше ее оставлять в значении ноль;
//    gc_maxlifetime указывает на время сессии в секундах, после прошествии 
// которого данные могут быть удалены (по умолчанию 1440 = 24 минуты).
$cookie_lifetime=ini_get("session.cookie_lifetime");
$gc_maxlifetime = ini_get("session.gc_maxlifetime");
echo '$cookie_lifetime='.$cookie_lifetime.'<br>';
echo 'gc_$maxlifetime='.$gc_maxlifetime.'<br>';

// Инициализируем общие переменные сайтового сценария
$SiteDevice=prown\getSiteDevice();          // 'Computer','Mobile','Tablet'
$UserName=$_COOKIE['PersName'] ?? "Гость";  // Логин авторизованного посетителя 
$Uagent=$_SERVER['HTTP_USER_AGENT'];        // HTTP_USER_AGENT

// Инициализируем сессионные переменные
//$s_Counter=prown\MakeSession('Counter',0,tInt);
//$s_Proba=prown\MakeSession('Proba','Proba',tStr);

//\prown\ViewGlobal(avgCOOKIE);
\prown\ViewGlobal(avgSESSION);
//\prown\ViewGlobal(avgGLOBALS);




//if (!isset($_SESSION['Counter'])) $_SESSION['Counter']=0; // Посещения за сессию
/*
// Инициализируем регулятор кукисов (настраиваем порядок использования кукисов):
//    $mCookies=0, еще не известно разрешены ли браузером кукисы
//    $mCookies=1, браузером кукисы разрешены, пользователем еще нет
//    $mCookies=2, пользователем разрешено использование кукисов
$mCookies=$_COOKIE['mCookies'] ?? 1;        

// Инициализируем переменные-кукисы
$BrowEntry=$_COOKIE['BrowEntry'] ?? 1;      // Число запросов сайта из браузера
$PersEntry=$_COOKIE['PersEntry'] ?? 1;      // Число запросов сайта посетителем
$PersName=$_COOKIE['PersName'] ?? "Гость";  // Логин посетителя
*/
// ************************************************************* Inimem.php *** 
