<?php

// ------------------------------------------- Массив зарегистрированных ошибок
// 1 - фатальная ошибка во время выполнения
$TypeErrors[E_ERROR]             = "E_ERROR";
// 2 - предупреждение во время выполнения        
$TypeErrors[E_WARNING]           = "E_WARNING"; 
// 4 - ошибка трансляции
$TypeErrors[E_PARSE]             = "E_PARSE";
// 8 - уведомление о проблеме
$TypeErrors[E_NOTICE]            = "E_NOTICE";
// 16 - фатальная ошибка ядра PHP
$TypeErrors[E_CORE_ERROR]        = "E_CORE_ERROR";
// 32 - предупреждение ядра PHP
$TypeErrors[E_CORE_WARNING]      = "E_CORE_WARNING";
// 64 - фатальная ошибка движка ZEND
$TypeErrors[E_COMPILE_ERROR]     = "E_COMPILE_ERROR";
// 128 - предупреждение движка ZEND
$TypeErrors[E_COMPILE_WARNING]   = "E_COMPILE_WARNING";
// 256 - фатальная ошибка по trigger_error()
$TypeErrors[E_USER_ERROR]        = "E_USER_ERROR";
// 512 - предупреждение по trigger_error()
$TypeErrors[E_USER_WARNING]      = "E_USER_WARNING";
// 1024 - уведомление по trigger_error()
$TypeErrors[E_USER_NOTICE]       = "E_USER_NOTICE";
// 2048 - рекомендация по улучшению кода
$TypeErrors[E_STRICT]            = "E_STRICT"; 
// 4096 - ошибка с возможностью обработки
$TypeErrors[E_RECOVERABLE_ERROR] = "E_RECOVERABLE_ERROR";
// 8192 - устаревшая конструкция
$TypeErrors[E_DEPRECATED]        = "E_DEPRECATED"; 
// 16384 - устаревшее по trigger_error()
$TypeErrors[E_USER_DEPRECATED]   = "E_USER_DEPRECATED"; 
// 32767
$TypeErrors[E_ALL]               = "E_ALL"; 
// ------------------------------------------- Массив зарегистрированных ошибок


function isPhp7()
{
   $Result=False;
   if (defined('PHP_VERSION_ID')) 
   {
      if (PHP_VERSION_ID>=70000) {$Result=True;}
   }
   return $Result;
}
// -------------------------------------------------------------------------
// Проинициализировать параметры Php.ini для управления выводом ошибок
// -------------------------------------------------------------------------
function InisetErrors()
{
   // Определеяем уровень протоколирования ошибок
   error_reporting(E_ALL);
   // Определяем режим вывода ошибок:
   //   если display_errors = on, то в случае ошибки браузер получит html 
   //   c текстом ошибки и кодом 200
   //   если же display_errors = off, то для фатальных ошибок код ответа будет 500
   //   и результат не будет возвращён пользователю, для остальных ошибок – 
   //   код будет работать неправильно, но никому об этом не расскажет
   ini_set('display_errors','Off');
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
}

// Определяем новую функцию-обработчик
function myErrorHandler($errno,$msg,$file,$line)
{
   // Если используется @, ничего не делать
   if (error_reporting()==0) return;
   // Иначе - выводим сообщение
   echo '<div style="border-style:inset; border-width:2">';
   echo "Произошла ошибка с кодом <b>$errno</b>!<br />";
   echo "Файл: <tt>$file</tt>, строка $line.<br />";
   echo "Текст ошибки: <i>$msg</i>";
   echo "</div>";
}
// ****************************************************************************
// *                 Отловить незафиксированный тип ошибки                    *
// ****************************************************************************
function terGetValue($inkey)
{
   global $TypeErrors;
   $result='E_UNKNOWN';
   foreach($TypeErrors as $key => $value) 
   { 
      if ($inkey==$key)
      {
         $result=$value;
         break;
      } 
   }
   return $result;         
}

// Функция-обработчик ошибок PHP

function DooriTryHandler($errno,$errstr,$errfile,$errline)
{
   // Если error_reporting нулевой, значит, использован оператор @,
   // все ошибки должны игнорироваться
   if (!error_reporting())
   {
      return true;
   }
   $className=terGetValue($errno);
   // Генерируем исключение нужного типа.
   //throw new Exception('$errno','$errstr','$errfile','$errline');
   throw new ConfigFileNotFoundException('eeeeerrno');
}  






function ddt()
{
   echo 'DDT<br>';
   // Инициализируем параметры Php.ini для управления выводом ошибок
   //InisetErrors();
   // Регистрируем новую функцию-обработчик для всех типов ошибок
   //set_error_handler("myErrorHandler",E_ALL);
   set_error_handler("DooriTryHandler",E_ALL);
   // Вызываем функцию для несуществующего файла, чтобы 
   // сгенерировать предупреждение, которое будет перехвачено.
   //@filemtime("spoon");
   filemtime("spoon");
}
