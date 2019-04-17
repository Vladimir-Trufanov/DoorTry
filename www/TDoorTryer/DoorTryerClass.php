<?php 
// Функции и классы для обработки ошибок PHP7+
// (преобразования ошибок PHP в исключения)

$TypeError[E_ERROR]             = "E_ERROR"; 
$TypeError[E_WARNING]           = "E_WARNING"; 
$TypeError[E_PARSE]             = "E_PARSE"; 
$TypeError[E_NOTICE]            = "E_NOTICE"; 
$TypeError[E_CORE_ERROR]        = "E_CORE_ERROR"; 
$TypeError[E_CORE_WARNING]      = "E_CORE_WARNING"; 
$TypeError[E_COMPILE_ERROR]     = "E_COMPILE_ERROR"; 
$TypeError[E_COMPILE_WARNING]   = "E_COMPILE_WARNING"; 
$TypeError[E_USER_ERROR]        = "E_USER_ERROR"; 
$TypeError[E_USER_WARNING]      = "E_USER_WARNING"; 
$TypeError[E_USER_NOTICE]       = "E_USER_NOTICE"; 
$TypeError[E_STRICT]            = "E_STRICT"; 
$TypeError[E_RECOVERABLE_ERROR] = "E_RECOVERABLE_ERROR"; 
$TypeError[E_DEPRECATED]        = "E_DEPRECATED"; 
$TypeError[E_USER_DEPRECATED]   = "E_USER_DEPRECATED"; 
$TypeError[E_ALL]               = "E_ALL"; 

function DoorTryShutdown()
{
   global $TypeError;
   
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
      echo '###'.$TypeError[E_WARNING].'###';
      DoorTryMessage
      (
         $lasterror['message'],'$TypeError',
         $lasterror['line'],$lasterror['file'],''
      );
   }
} 

/**
 *    В DoorTryer заложены все типы ошибок.
 * Через set_error_handler срабатывают только некоторые, часть срабатывает
 * через try-catch-error, остальные через register_shutdown_function.
 */
class DoorTryer
{
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



   // Создает новый объект-перехватчик и подключает его к стеку
   // обработчиков ошибок PHP (используется идеология "выделение 
   // ресурса есть инициализация").
   public function __construct()
   {
      $this->InisetErrors();
      $catcher = new DoorDryer_Catcher();
      set_error_handler(array($catcher,"DoorTryHandler"));
      register_shutdown_function('DoorTryShutdown');
   }
   // Вызывается при уничтожении объекта-перехватчика (например,
   // при выходе его из области видимости функции). Восстанавливает
   // предыдущий обработчик ошибок
   public function __destruct()
   {
      restore_error_handler();
   }
}

/**
 * Внутренний класс, содержащий метод перехвата ошибок.
 * Мы не можем использовать для этой же цели непосредственно $this 
 * (класса PHP_Exceptionizer): вызов set_error_handler() увеличивает 
 * счетчик ссылок на объект, а он должен остаться неизменным, чтобы в 
 * программе всегда оставалась ровно одна ссылка.
 */
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
      // Получаем текстовое представление типа ошибки
      $types = array(
         "E_ERROR",             // 1 - фатальная ошибка во время выполнения,  остановка программы
         "E_WARNING",           // 2 - предупреждение во время выполнения,    --- продолжение работы 
         "E_PARSE",             // 4 - ошибка трансляции,                     остановка программы
         "E_NOTICE",            // 8 - уведомление о проблеме,                остановка программы
         "E_CORE_ERROR",        // 16 - фатальная ошибка ядра PHP,            остановка программы
         "E_CORE_WARNING",      // 32 - предупреждение ядра PHP,              ----------------------
         "E_COMPILE_ERROR",     // 64 - фатальная ошибка движка ZEND,         остановка программы
         "E_COMPILE_WARNING",   // 128 - предупреждение движка ZEND,          ----------------------
         "E_USER_ERROR",        // 256 - фатальная ошибка по trigger_error(), ----------------------
         "E_USER_WARNING",      // 512 - предупреждение по trigger_error(),   ----------------------
         "E_USER_NOTICE",       // 1024 - уведомление по trigger_error(),     ----------------------
         "E_STRICT",            // 2048 - рекомендация по улучшению кода,     ----------------------
         "E_RECOVERABLE_ERROR", // 4096 - ошибка с возможностью обработки,    ----------------------
         "E_DEPRECATED",        // 8192 - устаревшая конструкция,             ----------------------
         "E_USER_DEPRECATED",   // 16384 - устаревшее по trigger_error(),     ----------------------
         "E_ALL"                // 32767
      );
      // Формируем имя класса-исключения в зависимости от типа ошибки
      $className=__CLASS__."_"."Exception";
      foreach ($types as $t) 
      {
         $e=constant($t);
         if ($errno & $e) 
         {
            $className = $t;
            break;
         }
      }
      // Генерируем исключение нужного типа.
      throw new $className($errno, $errstr, $errfile, $errline);
   }  
}

/**
 * Базовый класс для всех исключений, полученных в результате ошибки PHP.
 */
abstract class PHP_Exceptionizer_Exception extends Exception
{
   public function __construct($no=0,$str=null,$file=null,$line=0) 
   {
      parent::__construct($str,$no);
      $this->file=$file;
      $this->line=$line;
   }
}

class E_EXCEPTION extends PHP_Exceptionizer_Exception {}
class E_ERROR extends E_EXCEPTION {} 
class E_WARNING extends E_EXCEPTION {} 
class E_PARSE extends E_EXCEPTION {}
class E_NOTICE extends E_EXCEPTION {}
class E_CORE_ERROR extends E_EXCEPTION {}
class E_CORE_WARNING extends E_EXCEPTION {}
class E_COMPILE_ERROR extends E_EXCEPTION {}
class E_COMPILE_WARNING extends E_EXCEPTION {}
class E_USER_ERROR extends E_EXCEPTION {}
class E_USER_WARNING extends E_EXCEPTION {}
class E_USER_NOTICE extends E_EXCEPTION {}
class E_STRICT extends E_EXCEPTION {}
class E_RECOVERABLE_ERROR extends E_EXCEPTION {}
class E_DEPRECATED extends E_EXCEPTION {}
class E_USER_DEPRECATED extends E_EXCEPTION {}


 
     
