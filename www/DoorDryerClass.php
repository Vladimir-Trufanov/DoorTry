<?php ## Класс для преобразования ошибок PHP в исключения.
/**
 * Класс для преобразования перехватываемых (см. set_error_handler()) 
 * ошибок и предупреждений PHP в исключения.
 *
 * Следующие типы ошибок, хотя и поддерживаются формально, не могут
 * быть перехвачены:
 * E_ERROR, E_PARSE, E_CORE_ERROR, E_CORE_WARNING, E_COMPILE_ERROR,
 * E_COMPILE_WARNING
 */
class DoorDryer
{
  // Создает новый объект-перехватчик и подключает его к стеку
  // обработчиков ошибок PHP (используется идеология "выделение 
  // ресурса есть инициализация").
  public function __construct($mask = E_ALL)
  {
    $catcher = new DoorDryer_Catcher();
    $catcher->mask = $mask;
    $catcher->prevHdl = set_error_handler(array($catcher, "handler"));
  }
  // Вызывается при уничтожении объекта-перехватчика (например,
  // при выходе его из области видимости функции). Восстанавливает
  // предыдущий обработчик ошибок.
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
   // Битовые флаги предупреждений, которые будут перехватываться
   public $mask = E_ALL;
   
   // Функция-обработчик ошибок PHP
   public function handler($errno, $errstr, $errfile, $errline)
   {
      echo 'Handler<br>';
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
      echo '$className1='.$className.'<br>';
      foreach ($types as $t) 
      {
         $e=constant($t);
         if ($errno & $e) 
         {
            $className = $t;
            break;
         }
      }
      echo '$className2='.$className.'<br>';
      
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

/**
 * Создаем иерархию "серьезности" ошибок, чтобы можно было
 * ловить не только исключения с указанием точного типа, но 
 * и сообщения, не менее "фатальные", чем указано.
 */
class E_EXCEPTION extends PHP_Exceptionizer_Exception {}
class E_NOTICE extends E_EXCEPTION {}


/*
class E_EXCEPTION extends PHP_Exceptionizer_Exception {}
  class AboveE_STRICT extends E_EXCEPTION {} 
    class E_STRICT extends AboveE_STRICT {}
    class AboveE_NOTICE extends AboveE_STRICT {}
      class E_NOTICE extends AboveE_NOTICE {}
      class AboveE_WARNING extends AboveE_NOTICE {}
        class E_WARNING extends AboveE_WARNING {}
        class AboveE_PARSE extends AboveE_WARNING {}
          class E_PARSE extends AboveE_PARSE {}
          class AboveE_ERROR extends AboveE_PARSE {}
            class E_ERROR extends AboveE_ERROR {} 
            class E_CORE_ERROR extends AboveE_ERROR {}
            class E_CORE_WARNING extends AboveE_ERROR {}
            class E_COMPILE_ERROR extends AboveE_ERROR {}
            class E_COMPILE_WARNING extends AboveE_ERROR {}
  class AboveE_USER_NOTICE extends E_EXCEPTION {}
    class E_USER_NOTICE extends AboveE_USER_NOTICE {}
    class AboveE_USER_WARNING extends AboveE_USER_NOTICE {}
      class E_USER_WARNING extends AboveE_USER_WARNING {}
      class AboveE_USER_ERROR extends AboveE_USER_WARNING {}
        class E_USER_ERROR extends AboveE_USER_ERROR {}
  // Иерархии пользовательских и встроенных ошибок не сравнимы,
  // т.к. они используются для разных целей, и оценить 
  // "серьезность" нельзя.
*/
?>