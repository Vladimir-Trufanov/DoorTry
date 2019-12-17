<?php namespace prown;

// PHP7/HTML5, EDGE/CHROME                            *** iniErrMessage.php ***

// ****************************************************************************
// * TPhpPrown                          Определить общие сообщения библиотеки *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  26.01.2019
// Copyright © 2019 tve                              Посл.изменение: 20.05.2019

// Определения констант ошибочных сообщений от функций библиотеки

// isCalcInBrowser: Проанализировать UserAgent браузера по версиям родительских
//                      браузеров и определить работает ли функция Calc для CSS
define ("ManyBrowsersRec", "В UserAgent присутствует несколько браузеров");
define ("InverBrowsers",   "Неверная или отсутствует версия браузера");

// MakeUserError:       Cгенерировать ошибку/исключение или просто сформировать 
//                     сообщение об ошибке в "жёсткой" системе обработки ошибок
define ("WrongTypeError", "Неверно указан тип ошибки");

// MakeUserError:       Cгенерировать ошибку/исключение или просто сформировать 
//                     сообщение об ошибке в "жёсткой" системе обработки ошибок
define ("FetchStrObsolete","Устарела выборка подстроки регулярным выражением");

// ****************************************************** iniErrMessage.php *** 
