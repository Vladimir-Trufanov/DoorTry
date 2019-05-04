<?php
// PHP7/HTML5, EDGE/CHROME                           *** DoorTryerClass.php ***

// ****************************************************************************
// * doortry.ru             Обработать ошибки PHP7+ и пользовательские ошибки *
// *                                  (преобразовать ошибки PHP в исключения) *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 21.04.2019

/**
 * В DoorTryer заложены все типы ошибок. Через установленный модуль от 
 * set_error_handler срабатывают некоторые типы ошибок, часть ошибок срабатывает
 * через try-catch-error, остальные ошибки вылавливаются после завершения работы
 * сценария через register_shutdown_function
**/

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

function DoorTryExec($errstr,$errtype,$errline='',$errfile='',$errtrace='')
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
   echo '$TypeError='.$TypeError.'<br>';
   echo '$e->getCode()='.$e->getCode().'<br>';
   echo 'get_class($e)='.get_class($e).'<br>';
   /*
   DoorTryExec
   (
      $e->getMessage(),$TypeError,
      $e->getLine(),$e->getFile(),$e->getTraceAsString()
   );
   */
}

// ****************************************************************************
// *  DoorTryer class       Обработать ошибки PHP7+ и пользовательские ошибки *
// *                                  (преобразовать ошибки PHP в исключения) *
// ****************************************************************************
class DoorTryer
{
   // -------------------------------------------------------------------------
   // Создать новый объект-перехватчик и подключить его к стеку обработчиков 
   // ошибок PHP, используя механизм "выделение ресурса есть инициализация",
   // подключить обработчик после завершения работы сценария
   // -------------------------------------------------------------------------
   public function __construct()
   {
      //echo 'DoorTryerClass';
      $this->InisetErrors();
      $catcher = new DoorDryer_Catcher();
      set_error_handler(array($catcher,"DoorTryHandler"));
      register_shutdown_function('DoorTryShutdown');
   }
   // -------------------------------------------------------------------------
   // Уничтожить объекта-перехватчик (например, при выходе его из области 
   // видимости функции). Восстановить предыдущий обработчик ошибок
   // -------------------------------------------------------------------------
   public function __destruct()
   {
      restore_error_handler();
   }
   // -------------------------------------------------------------------------
   // Проинициализировать параметры Php.ini для управления выводом ошибок
   // -------------------------------------------------------------------------
   private function InisetErrors()
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
}
// ****************************************************************************
// *  DoorDryer_Catcher class           Внутренний класс: перехватить ошибки. *
// *          Мы не можем использовать для этой же цели непосредственно $this * 
// * (класса DoorTryer): вызов set_error_handler() увеличивает счетчик ссылок *
// *     на объект, а он должен остаться неизменным, чтобы в программе всегда *
// *                          оставалась ровно одна ссылка (Дмитрий Котеров). *
// ****************************************************************************
class DoorDryer_Catcher
{
   // Функция-обработчик ошибок PHP
   public function DoorTryHandler($errno, $errstr, $errfile, $errline)
   {
      // Если error_reporting нулевой, значит, использован оператор @,
      // все ошибки должны игнорироваться
      if (!error_reporting())
      {
         return true;
      }
      $className=terGetValue($errno);
      // Генерируем исключение нужного типа.
      throw new $className($errno, $errstr, $errfile, $errline);
   }  
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
         $lasterror['line'],$lasterror['file'],''
      );
   }
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

// ***************************************************** DoorTryerClass.php ***

