<?php namespace prown;

// PHP7/HTML5, EDGE/CHROME                              *** iniConstMem.php ***
// ****************************************************************************
// * TPhpPrown             Определить общие константы и переменные библиотеки *
// *                                                                          *
// * v1.1, 21.05.2019                              Автор:       Труфанов В.Е. *
// * Copyright © 2019 tve                          Дата создания:  02.04.2019 *
// ****************************************************************************

// Модуль определяет общие константы (а также переменные), которые используются
// в различных функциях библиотеки и в вызывающих их внешних программах, и
// сценариях. 
// Первая группа констант используется для указания режимов вывода сообщений 
// библиотеки. TPhpPrown позволяет выводить сообщения четырьмя способами: 
// в текущей позиции сайта, 
// через исключение с пользовательской ошибкой, 
// в дополнительном блоке для сообщения (в дополнительном div-е), 
// в диалоговом окне с помощью jQueryUi.
// Вторая группа констант определяет семь типов переменных, используемых в 
// библиотеке.
 
// -------------------------------------- Режимы вывода сообщений об ошибке ---
define ("rvsCurrentPos",   -1);  // в текущей позиции сайта 
define ("rvsTriggerError",  0);  // исключение с пользовательской ошибкой  
define ("rvsMakeDiv",       1);  // в дополнительном div-е для сообщения   
define ("rvsDialogWindow",  2);  // в диалоговом окне с помощью JQueryUI   

// -------------------------------------------------------- Типы переменных ---
define ("tArr",   "array");      // массивы (упорядоченные соответствия значений и ключей);
define ("tObj",   "object");     // объекты, представители определённого класса
define ("tInt",   "integer");    // целые числа (из множества {...,-2,-1,0,1,2,...})
define ("tFloat", "double");     // числа с плавающей точкой
define ("tStr",   "string");     // наборы символов=байт (256 различных значений)
define ("tBool",  "boolean");    // простейшийе типы, выражающие истинность значения
define ("tNull",  "null");       // переменные без значения

// ******************************************************** iniConstMem.php *** 
