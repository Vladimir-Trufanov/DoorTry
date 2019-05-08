<?php
// PHP7/HTML5, EDGE/CHROME                            *** DoorTryerPage.php ***

// ****************************************************************************
// * doortry.ru                      Обработать ошибки и исключения PHP5-PHP7 *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 07.05.2019

/**
 * В DoorTryer заложены все типы ошибок. Через установленный модуль от 
 * set_error_handler обрабатывается большинство ошибок, остальные ошибки 
 * вылавливаются после завершения работы сценария через 
 * register_shutdown_function, через try-catch-error обрабатываются исключения
**/

require_once $SiteRoot."/TDoorTryer/DoorTryerMessage.php";

// ------------------------------------------ Используемые регулярные выражения
// "фрагмент с типом ошибки с начала строки до ":"
define ("regErrorType",   "/^[A-Za-z_]{1,}:/u");
// "фрагмент от "#2" до конца строки
define ("regTrace2",   "/#2[\s\S]{1,}$/u");
// "фрагмент трассировки в сообщении об ошибке"
define ("regTrace",   "/Stack trace:[\s\S]{1,}$/u");
// "фрагмент трассировки с начала строки до "thrown"
define ("regThrown",   "/^[\s\S]{1,}thrown/u");
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

// ****************************************************************************
// *         Определить: является ли версия текущего PHP-сценария             *
// *                        седьмой или большей                               *
// ****************************************************************************
function isPhp7()
{
   $Result=False;
   if (defined('PHP_VERSION_ID')) 
   {
      if (PHP_VERSION_ID>=70000) {$Result=True;}
   }
   return $Result;
}
// ****************************************************************************
// *    Выбрать из строки подстроку, соответствующую регулярному выражению    *                          *
// ****************************************************************************
// ----------------------------------------------------------------------------
//     Выбрать из строки подстроку, соответствующую регулярному выражению 
// ----------------------------------------------------------------------------
function findes($preg,$string,&$point=0)
{
   $findes='';
   $value=preg_match($preg,$string,$matches,PREG_OFFSET_CAPTURE);
   if ($value>0)
   {
      $findes=$matches[0][0];
      $point=$matches[0][1];
   }
   return $findes;
}
// ****************************************************************************
// *    Проинициализировать параметры Php.ini для управления выводом ошибок   *
// ****************************************************************************
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
// *      Проверить наличие ключа в массиве зарегистрированных ошибок PHP     *
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
// *               Определить наименование по типу ошибки и                   *
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
// *              Выбрать из принудительного исключения трассировку           *
// ****************************************************************************
function terGetTrace2($e)
{
   // Выбираем из сообщения трассировку, начиная со 2 строки "#2" (для того,
   // чтобы отрезать трассировку, вызванную принудительным исключениеми) и
   // добавляем в хвосте ограничитель для выборки строк трассировки "#999" 
   $SayTrass='';
   $value=preg_match_all(regTrace2,$e,$matches,PREG_OFFSET_CAPTURE);
   if ($value>0)
   {
      $findes=$matches[0]; 
      $SayTrass=$findes[0][0].'#999 ';  
   }
   // Инициируем счетчик выводимых строк трассировки и выбираем первую строку 
   $i=0;  $Result='';
   $findes=findes("/#[\s\S]{1,}?#/u",$SayTrass);
   $findes=substr($findes,0,strlen($findes)-1);
   while (strlen($findes)>0)
   {
      // Выделяем остаток трассировки
      $SayTrass=substr($SayTrass,strlen($findes));
      // Выделяем фрагмент прежнего счетчика строк
      $numbers=findes("/#[0-9]{1,}\s/u",$findes);
      // Формируем и выводим актуальную строку трассировки
      $Result=$Result.'#'.$i.' '.substr($findes,strlen($numbers));
      // Выбираем следующую строку 
      $findes=findes("/#[\s\S]{1,}?#/u",$SayTrass);
      $findes=substr($findes,0,strlen($findes)-1);
      $i=$i+1;
   }
   return $Result;
}
// ****************************************************************************
// * Сформировать и подготовить для вывода сообщение об ошибке или исключении *
// ****************************************************************************
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
}
// ****************************************************************************
// * [SHT]     Обработать пропущенные ошибки после завершения работы сценария *
// ****************************************************************************
function DoorTryShutdown()
{
   global $TypeErrors;
   
   $lasterror=error_get_last();
   $typelast=intval($lasterror['type']);
   if (terIsKey($typelast))
   {
      // Пробуем выбрать трассировку
      $point=0;
      $string=$lasterror['message'];
      $trace=findes(regTrace,$string,$point);
      // Если трассировка есть, то отделяем трассировку от сообщения 
      if ($trace>'')
      {
         $string=substr($string,0,$point);      
      } 
      // Так как текст трассировки может завершаться словом "thrown",
      // то отрезаем его
      $thrown=findes(regThrown,$trace);
      if ($thrown>'')
      {
         $trace=substr($thrown,0,strlen($thrown)-6);      
      } 
      // Так как сообщение об ошибке может начинаться с "Uncaught Error" - 
      // "необнаруженная ошибка", то отрезаем этот фрагмент
      $thrown=findes('/Uncaught Error: /u',$string,$point);
      if ($thrown>'')
      {
         $string=substr($string,$point+16);      
      }
      // Так как сообщение об ошибке может начинаться с "Uncaught exception 'Exception' with message" - 
      // "необнаруженное исключение", то отрезаем этот фрагмент
      $thrown=findes("/Uncaught exception 'Exception' with message /u",$string,$point);
      if ($thrown>'')
      {
         $string=substr($string,$point+44);      
      }
      // Так как сообщение об ошибке может начинаться с "Uncaught Exception" - 
      // "необнаруженное исключение", то отрезаем этот фрагмент
      $thrown=findes("/Uncaught Exception: /u",$string,$point);
      if ($thrown>'')
      {
         $string=substr($string,$point+20);      
      }
      // Определяем тип ошибки, формируем и выводим сообщение
      $TypeError=terGetValue(intval($typelast));
      DoorTryExec
      (
         $string,$TypeError.' [SHT]',
         $lasterror['line'],$lasterror['file'],$trace,true
      );
   }
} 
// ****************************************************************************
// * [HND]       Обработать ошибки, отловленные до завершения работы сценария *
// ****************************************************************************
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
      try
      {
         // Делаем принудительное исключение для того,
         // чтобы поймать трассировку
         throw new Exception('Hello!');
      }
      catch (Exception $e)
      {
         // Выделяем трассировку
         $errtrace=terGetTrace2($e); 
         // Запускаем вывод ошибки     
         DoorTryExec
         (
            $errstr,$TypeError.' [HND]',$errline,$errfile,$errtrace,true
         );
      }
   }
   else
   {
      DoorTryExec('Авария 195',1,'','','',false);
   }
}  
// ****************************************************************************
// * [PGE]                                              Обработать исключения *
// ****************************************************************************
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
   // При неопределенном типе ошибки для PHP5 
   // назначаем тип ошибки по типу класса
   if ($TypeError=='NoDefine')
   {
      if (!(isPhp7()))
      {
         $TypeError=get_class($e).':';   
      }
   }
   DoorTryExec
   (
      $e->getMessage(),$TypeError.' [PGE]',
      $e->getLine(),$e->getFile(),$e->getTraceAsString(),true
   );
}
// ****************************************************************************
// *                Запустить обработку ошибок и исключений                   *
// ****************************************************************************
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
// Инициализируем параметры Php.ini для управления выводом ошибок
InisetErrors();
// Регистрируем функцию, которая будет выполняться по завершению работы скрипта
register_shutdown_function('DoorTryShutdown');
// Регистрируем новую функцию-обработчик для всех типов ошибок
set_error_handler("DoorTryHandler",E_ALL);

// ****************************************************** DoorTryerPage.php ***
