<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// *  *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 11.04.2019

// Определеяем уровень протоколирования ошибок
error_reporting(E_ALL);
// Определяем режим вывода ошибок:
//   если display_errors = on, то в случае ошибки браузер получит html 
//   c текстом ошибки и кодом 200
//   если же display_errors = off, то для фатальных ошибок код ответа будет 500
//   и результат не будет возвращён пользователю, для остальных ошибок – 
//   код будет работать неправильно, но никому об этом не расскажет
ini_set('display_errors','off');
// Определяем режим вывода ошибок при запуске PHP. Если = on, то даже если 
// display_errors включена; ошибки, возникающие во время запуска PHP, не будут 
// отображаться. Настойчиво рекомендуем включать директиву 
// display_startup_errors только для отладки
ini_set('display_startup_errors','Off');
// Определяем ведение журнала, в котором будут сохраняться сообщения об ошибках.
// Это может быть журнал сервера или error_log. Применимость этой настройки 
// зависит от конкретного сервера.
//    При работе на готовых работающих web сайтах следует протоколировать 
// ошибки там, где они отображаются
ini_set('log_errors','On');
ini_set('error_log','log.txt');



   function catchError($errno, $errstr, $errfile = '', $errline = '')
{
    echo "<br>-----------------------------<br>";
    echo "Error Type : " .$errno. "<br>";
    echo "Error Message : " . $errstr . "<br>";
    echo "Line Number : " . $errline. "<br>";
    echo "errfile : " . $errfile. "<br>";
    echo "-----------------------------<br>";
   echo '<pre>';
   $lasterror = error_get_last();
   echo "{$lasterror->getMessage()}";
   echo $lasterror->getTraceAsString();
   echo '</pre>';
    echo "-----------------------------<br>";
    exit();
} 
function ShutDown()
{
   $lasterror = error_get_last();
   if (in_array($lasterror['type'],Array( 
      E_ERROR, 
      E_WARNING, 
      E_PARSE,
      E_NOTICE,
      E_CORE_ERROR,
      E_CORE_WARNING,
      E_COMPILE_ERROR,
      E_COMPILE_WARNING,
      E_USER_ERROR,
      E_USER_WARNING,
      E_USER_NOTICE,
      E_STRICT,
      E_RECOVERABLE_ERROR, 
      E_DEPRECATED,
      E_USER_DEPRECATED
   )))
   {
      catchError($lasterror['type'],$lasterror['message'],$lasterror['file'],$lasterror['line']);
   }
} 

   register_shutdown_function('shutdown');








require_once "DoorTryerClass.php";
$w2e = new DoorTryer(E_ALL);
try 
{

   echo 'Привет!<br>';
   include 'includErrs.php'; 
   echo '<br>Hi!';

} 
catch (E_EXCEPTION $e) 
{
   echo "<pre><b>ex Перехвачена ошибка!</b><br>".$e."</pre>";
}
catch (Error $e) 
{
   echo "<pre><b>er Перехвачена ошибка!</b><br>".$e."</pre>";
}
unset($w2e);

  
// ************************************************************** index.php ***
