<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// *  *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 11.04.2019

/*
try 
{
   $x=5; echo 1/$x."<br>";
   //$x=0; echo 1/$x."<br>";
   require_once 'not-exists.php';
   //$str='try';
   //$str[]=4;
   $x=3; echo 1/$x."<br>";
} 
catch (Error $e) 
{
   echo "Ошибка: "."{$e->getMessage()}";
}
*/



// ------- 1 ghbvth
/*
// включаем отображение всех ошибок, кроме E_NOTICE
error_reporting(E_ALL);
ini_set('display_errors',1);
ini_set('error_log','log.txt');
ini_set('log_errors',true);

// наш обработчик ошибок
function myHandler($level, $message, $file, $line, $context) 
{
   // в зависимости от типа ошибки формируем заголовок сообщения
   switch ($level) 
   {
   case E_WARNING:
      $type = 'Warning';
      break;
   case E_ERROR:
      $type = 'Error';
      break;
   case E_NOTICE:
      $type = 'Notice';
      break;
   default;
      // это не E_WARNING и не E_NOTICE
      // значит мы прекращаем обработку ошибки
      // далее обработка ложится на сам PHP
      return false;
   }
   // выводим текст ошибки
   echo $type.'<br>';
   
   //    echo &quot;&lt;h2&gt;$type: $message&lt;/h2&gt;&quot;;
   //     echo &quot;&lt;p&gt;&lt;strong&gt;File&lt;/strong&gt;: $file:$line&lt;/p&gt;&quot;;
   //     echo &quot;&lt;p&gt;&lt;strong&gt;Context&lt;/strong&gt;: $&quot;.
   // join(', $', array_keys(///  //$context)).&quot;&lt;/p&gt;&quot;;
   // сообщаем, что мы обработали ошибку, и дальнейшая обработка не требуется
   return true;
}
// регистрируем наш обработчик, он будет срабатывать на для всех типов ошибок
set_error_handler('myHandler',E_ERROR);
*/

/*

 // Немного предварительных настроек

// устанавливаем режим отображения ошибок
// отображать все ошибки, кроме E_NOTICE
error_reporting  (E_ALL & ~E_NOTICE);

// эта константа отвечает за
// включение/выключение режима отладки
// во время отладки - сообщения не отсылаются
// по почте, а просто печатаются на экран
define('DEBUG', 0);

// это глобальная переменная, в которой
// будет храниться сообщение, которое
// должен видеть пользователь
$MSG = '';

// e-mail разработчика, куда отправлять ошибки
define('ADM_EMAIL','tve58@inbox.ru');

// log-файл
define('LOGFILE','mylog.log'); //'/home/mysite/mylog.log');

// разница во времени с сервером (в секундах)
define('TIMEOFFSET', 0);

// сама функция

function my_error_handler($code, $msg, $file, $line)
{
// глобальная переменная, в которую будет
// записываться сообщение об ошибке.
global $MSG;

// пропускаем ошибки уровня E_NOTICE
// и игнорируем ошибки, если режим сообщения об ошибках отключен
if ( ($code == E_NOTICE) or (error_reporting() == 0) ) {
return;
}

// если мы вызвали ошибку уровня E_USER_NOTICE - просто
// записать текст ошибки в глобальную переменную $MSG
// и прекратить выполнение функции

if ($code == E_USER_NOTICE) {
$MSG = $msg;
Return;
}

// если ошибка уровня E_ERROR - печатаем текст ошибки
// и завершаем выполнение скрипта

if ($code == E_ERROR) {
die ('<br><b>ERRORing:</b> '.$msg.'<br>In '.$file.' (line '.$line.')'.'trr<br>');
}

// если ошибка уровня E_WARNING - печатаем текст ошибки
// и прекращаем выполнение функции

if ($code == E_WARNING) {
echo '<br><b>WARNINGing:</b> '.$msg.'<br>In '.$file.' (line '.$line.')trr<br>';
Return;
}

// если ошибка уровня E_USER_ERROR

if ($code == E_USER_ERROR) {

// записываем в переменную $MSG текст, о том что произошла ошибка,
// причины сообщать не будем, только сообщим что подробности
// отправлены на e-mail кому следует.

$MSG = 'Критическая Ошибка: действие выполнено небыло. <br>
Сообщение об ошибке было отправлено разработчику.';

// подробности записываем в переменную $text

$text = $msg.'<br>'.'Файл: '.$file.' ('.$line.')';

// Если константа DEBUG установлена в 1 - печатаем информацию об
// ошибке на экран, если нет - отправляем текст ошибки почтой
// функция error_mail() и пишем в log - функция error_writelog()

if (DEBUG == 1) {
error_print($text);
} else {
error_mail($text);
error_writelog($text);
}

Return;
}
}


// устанавливаем обработчик
set_error_handler('my_error_handler');

//Теперь описываем служебные функции 


// ф-я печатает ошибку на экран
function error_print($text)
{
echo $text.'<p>';
}

// ф-я отправляет ошибку почтой
function error_mail($text)
{
$text = str_replace("<br>", "n", $text);

$info = 'Время: '.get_datetime()."nRemote IP:".get_ip()."n";

mail(ADM_EMAIL, "Error reporting", $info.$text);
}

// ф-я пишет ошибку в лог
function error_writelog($text)
{
$text = str_replace("<br>", "t", $text);
if (@$fh = fopen(LOGFILE, "a+")) {
fputs($fh, get_datetime()."t".get_ip()."t".$text."n");
fclose($fh);
}
}


// получаем время, с учётом разницы во времени
function get_time()
{
return(date("H:i", time () + TIMEOFFSET));
}

// получаем дату, с учётом разницы во времени
function get_date()
{
return(date("Y-m-d", time () + TIMEOFFSET));
}

// получаем  дату и время, с учётом разницы во времени
function get_datetime()
{
return get_date().' '.get_time();
}

// получаем IP
function get_ip()
{
return($_SERVER['REMOTE_ADDR']);
}
//И наконец пример использования 

// ф-я записывает новость в файл
function write_news($title, $text)
{
$news_file = '/home/mysite/news.txt';

// проверяем наличие заголовка - ошибка не критическая
if (!trim($title)) {

// для того чтобы определить что функция завершилась
// неудачей - необходимо вернуть false. Функция
// trigger_error() - возвращает true, мы будем
// возвращать её инвертированный результат

return !trigger_error('Необходимо указать заголовок новости');
}

// проверяем наличие текста новости - ошибка не критическая
if (!trim($text)) {
return !trigger_error('Необходимо указать текст новости');
}

// проверяем наличие файла в который будем писать
// если файл не найден - возникает критическая ошибка

if (!file_exists($news_file)) {
return !trigger_error('Файл базы новостей не найден!', E_USER_ERROR);
}

// ...тут предварительная обработка данных...

// записываем новость
$fh = fopen($news_file, "a+");
fputs($fh, $title."t".$text."n");
fclose($fh);

// если всё нормально - функция возвращает true
return true;
}

// пытаемся записать новость
// эти данные могут приходить из web-формы

$res = write_news("Моя новость", "Текст моей новости");

if ($res === false) {

// если вернулся false - печатаем ошибку
echo $MSG;

} else {

// если всё в порядке - можно сообщить об этом
// а лучше отфорвардить пользователя куда-нибудь.
echo 'Новость была добавлена';
}
*/





//echo 'Начало <br>';

 //include_once 'not-exists.php'; // E_WARNING
 //require_once 'not-exists.php';

   //$x=5; echo 1/$x."<br>";
   //$x=0; echo 1/$x."<br>";
   //require_once 'not-exists.php';
   //$str='try';
   //$str[]=4;
   //$x=3; echo 1/$x."<br>";
   
   //try
   //{
   //$str='try';
   //$str[]=4;
   //}
   //catch (Error $e)
   //{
      //echo $e->getMessage();
      // При необходимости выводим дополнительную информацию
      /*
      echo '<pre>';
      echo $e->getTraceAsString();
      echo '</pre>';
      Header("Content-type: text/plain");
      $headers = getallheaders();
      print_r($headers);
      print_r($_SERVER);
      */
   //}

 
//echo 'Конец <br>';


  function suffer()
  {
    // Создаем новый объект-преобразователь. Начиная с этого момента 
    // и до уничтожения переменной $w2e все перехватываемые ошибки 
    // превращаются в одноименные исключения.
    $w2e = new PHP_Exceptionizer(E_ALL);
    try {
    
    // 1 Открываем несуществующий файл. Здесь будет ошибка E_WARNING.
    // fopen("spoon", "r");
    
    // 2 Ошибка преобразования типа
    // $str='try';
    // $str[]=4;
    
    // 3 Ошибка деления на ноль
    // $x=0; echo 1/$x."<br>";
    
    // 4
    //require_once 'not-exists.php';
    
    } 
    catch (CompileError $e) 
    {
      // Перехватываем исключение класса E_EXCEPTION
      echo "<pre><b>ex Перехвачена ошибка!</b>\n", $e, "</pre>";
    }
    catch (E_EXCEPTION $e) 
    {
      // Перехватываем исключение класса E_EXCEPTION
      echo "<pre><b>ex Перехвачена ошибка!</b>\n", $e, "</pre>";
    }
    catch (Error $e) 
    {
      // Перехватываем исключение класса Error.
      echo "<pre><b>er Перехвачена ошибка!</b>\n", $e, "</pre>";
    }
   /**
    * Следующие типы ошибок, хотя и поддерживаются формально, не могут
    * быть перехвачены:
    * E_ERROR, E_PARSE, E_CORE_ERROR, E_CORE_WARNING, E_COMPILE_ERROR,
    * E_COMPILE_WARNING
   **/

    
    
    // В конце можно явно удалить преобразователь командой:
    unset($w2e);
    // Но можно этого и не делать - переменная и так удалится при
    // выходе из функции (при этом вызовется деструктор объекта $w2e,
    // отключающий слежение за ошибками).
  }


  //require_once "PHP/Exceptionizer.php";

  // Для большей наглядности поместим основной проверочный код в функцию.
  //suffer();

  // Убеждаемся, что перехват действительно был отключен.
  //echo "<b>Дальше должно идти обычное сообщение PHP.</b>";
    
    // 1 Открываем несуществующий файл. Здесь будет ошибка E_WARNING.
    //fopen("spoon", "r");
    
    // 2 Ошибка преобразования типа
    //$str='try';
    //$str[]=4;
    
    // 3 Ошибка деления на ноль
    // $x=0; echo 1/$x."<br>";

    // 4
    //require_once 'not-exists.php';
    
///------------------------------
// register_shutdown_function('ShutDown');

function catchError($errno, $errstr, $errfile = '', $errline = '')
{
    echo "<br>-----------------------------<br>";
    echo "Error Type : " .$errno. "<br>";
    echo "Error Message : " . $errstr . "<br>";
    echo "Line Number : " . $errline. "<br>";
    echo "errfile : " . $errfile. "<br>";
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
      E_STRICT,
      E_DEPRECATED,
      E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR, E_RECOVERABLE_ERROR, 
      E_CORE_WARNING, E_COMPILE_WARNING)))
   {
      catchError($lasterror['type'],$lasterror['message'],$lasterror['file'],$lasterror['line']);
   }
} 

// определеяем уровень протоколирования ошибок
error_reporting(E_ALL);
// определяем режим вывода ошибок
//   если display_errors = on, то в случае ошибки браузер получит html 
//   c текстом ошибки и кодом 200
//   если же display_errors = off, то для фатальных ошибок код ответа будет 500
//   и результат не будет возвращён пользователю, для остальных ошибок – 
//   код будет работать неправильно, но никому об этом не расскажет
ini_set('display_errors', 'on');
  
//$w2e = new PHP_Exceptionizer(E_ALL);
require_once "DoorDryerClass.php";
$w2e = new DoorDryer(E_ALL);
try 
{
   echo 'Привет!<br>';
   include 'includErrs.php'; 
   echo '<br>Hi!';
} 
catch (E_EXCEPTION $e) 
{
   echo "<pre><b>ex Перехвачена ошибка!</b>\n", $e, "</pre>";
}
unset($w2e);



// ************************************************************** index.php ***
