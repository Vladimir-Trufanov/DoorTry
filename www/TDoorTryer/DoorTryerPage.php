<?php

require_once $SiteRoot."/TDoorTryer/DoorTryerMessage.php";

// -------------- Рег.выражение "фрагмент с типом ошибки с начала строки до ":"
define ("regErrorType",   "/^[A-Za-z_]{1,}:/u");
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
// ****************************************************************************
// *     Проверить наличие ключа в массиве зарегистрированных ошибок PHP7+    *
// ****************************************************************************
function terIsKey($inkey)
{
   global $TypeErrors;
   $result=false;
   foreach($TypeErrors as $key => $value) 
   { 
      if ($inkey==$key)
      {
         $result=true;
         break;
      } 
   }
   return $result;         
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


function DoorTryExec($errstr,$errtype,$errline='',$errfile='',$errtrace='',$MakePage=true)
{
   if ($MakePage==true)
   {
      $uripage="http://kwinflatht.nichost.ru/error.php".
      //$uripage="http://localhost:82/error.php".
         "?estr=".urlencode($errstr).
         "&etype=".urlencode($errtype).
         "&eline=".urlencode($errline).
         "&efile=".urlencode($errfile).
         "&etrace=".urlencode($errtrace);
   
      // Вызываем страницу ошибки через javascript
      echo '<script>';
      echo 'window.location.assign("'.$uripage.'")';
      echo '</script>';

      // Вызываем страницу ошибки через отправку заголовка
      // Header("Location: ".$uripage);
   }
   else DoorTryMessage($errstr,$errtype,$errline,$errfile,$errtrace);
   /*
   {
      echo '<div style="border-style:inset; border-width:2">';
      echo "<pre>";
      echo "<b>".$errstr."</b><br><br>";
      echo "File: ".$errfile."<br>";
      echo "Line: ".$errline."<br><br>";
      echo $errtype."<br>";
      if (!($errtrace=='')) {echo $errtrace."<br>";}
      echo "</pre>";
      echo "</div>";
   }
   */
}

// ****************************************************************************
// *      Обработать пропущенные ошибки после завершения работы сценария      *
// ****************************************************************************
function DoorTryShutdown()
{
   global $TypeErrors;
   
   $lasterror=error_get_last();
   $typelast=intval($lasterror['type']);
   if (terIsKey($typelast))
   {
      $TypeError=terGetValue(intval($typelast));
      DoorTryExec
      (
         $lasterror['message'],$TypeError,
         $lasterror['line'],$lasterror['file'],'DoorTryShutdown',true
      );
   }
} 
// Функция-обработчик ошибок PHP
function DoorTryHandler($errno,$errstr,$errfile,$errline)
{
   global $TypeErrors;
   // Если error_reporting нулевой, значит, использован оператор @,
   // все ошибки должны игнорироваться
   if (!error_reporting())
   {
      return true;
   }
   $typelast=intval($errno);
   if (terIsKey($typelast))
   {
      $TypeError=terGetValue(intval($typelast));
      DoorTryExec
      (
         $errstr,$TypeError,$errline,$errfile,'DoorTryHandler',true
      );
   }
   else
   {
      DoorTryExec('Авария 195',1,'','','',false);
   }



   //$className=terGetValue($errno);
   // Генерируем исключение нужного типа.
   //throw new $className($errno,$errstr,$errfile,$errline);
   //DoorTryExec
   //(
   //   $lasterror['message'],$TypeError,
   //   $lasterror['line'],$lasterror['file'],'',false
   //);
}  


function DoorTryPage($e)
{
   //echo '***'.$e.'***';
   // Определяем тип ошибки
   $value=preg_match_all(regErrorType,$e,$matches,PREG_OFFSET_CAPTURE);
   if ($value>0)
   {
      $findes=$matches[0]; 
      $TypeError=$findes[0][0]; $Point=$findes[0][1];  
   }
   else
   {
      $TypeError='NoDefine'; $Point=-1;  
   }
   //echo '$TypeError='.$TypeError.'<br>';
   //echo '$e->getCode()='.$e->getCode().'<br>';
   //echo 'get_class($e)='.get_class($e).'<br>';
   
   DoorTryExec
   (
      $e->getMessage(),$TypeError,
      $e->getLine(),$e->getFile(),$e->getTraceAsString(),true
   );
   
   
}

// Связываем ошибки с исключениями
class E_EXCEPTION         extends Exception {}     // 0
class E_ERROR             extends E_EXCEPTION {}   // 1
class E_WARNING           extends E_EXCEPTION {}   // 2
class E_PARSE             extends E_EXCEPTION {}   // 4
class E_NOTICE            extends E_EXCEPTION {}   // 8
class E_CORE_ERROR        extends E_EXCEPTION {}   // 16
class E_CORE_WARNING      extends E_EXCEPTION {}   // 32
class E_COMPILE_ERROR     extends E_EXCEPTION {}   // 64
class E_COMPILE_WARNING   extends E_EXCEPTION {}   // 126
class E_USER_ERROR        extends E_EXCEPTION {}   // 256
class E_USER_WARNING      extends E_EXCEPTION {}   // 512
class E_USER_NOTICE       extends E_EXCEPTION {}   // 1024
class E_STRICT            extends E_EXCEPTION {}   // 2048
class E_RECOVERABLE_ERROR extends E_EXCEPTION {}   // 4096
class E_DEPRECATED        extends E_EXCEPTION {}   // 8192
class E_USER_DEPRECATED   extends E_EXCEPTION {}   // 16384
class E_ALL               extends E_EXCEPTION {}   // 32767

   //echo 'DDToii<br>';
   // Инициализируем параметры Php.ini для управления выводом ошибок
   InisetErrors();
   // Регистрируем функцию, которая будет выполняться по завершению работы скрипта
   register_shutdown_function('DoorTryShutdown');
   // Регистрируем новую функцию-обработчик для всех типов ошибок
   //set_error_handler("myErrorHandler",E_ALL);
   set_error_handler("DoorTryHandler",E_ALL);
