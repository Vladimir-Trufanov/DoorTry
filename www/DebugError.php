<?php                                           
// PHP7/HTML5, EDGE/CHROME                               *** DebugError.php ***

// ****************************************************************************
// * doortry.ru                                                    DebugError *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  05.03.2018
// Copyright © 2018 tve                              Посл.изменение: 26.10.2019

// функция обработки ошибок
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // Этот код ошибки не включен в error_reporting
        return;
    }
 
    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
        echo "  Фатальная ошибка в строке $errline файла $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Завершение работы...<br />\n";
        exit(1);
        break;
 
    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;
 
    case E_USER_NOTICE:
        //echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;
    
    case E_WARNING:
        //echo "<b>My E_WARNING</b> [$errno] $errstr<br />\n";
        //echo "<b>My E_WARNING</b><br />\n";
        break;
    
    case E_NOTICE:
        //echo "<b>My E_WARNING</b> [$errno] $errstr<br />\n";
        //echo "<b>My E_Notice</b><br />\n";
        break;
    
    default:
        echo "Неизвестная ошибка: [$errno] $errstr<br />\n";
        break;
    }
 
    /* Не запускаем внутренний обработчик ошибок PHP */
    return true;
}
 
// функция для тестирования обработчика ошибок
function scale_by_log($vect, $scale)
{
    if (!is_numeric($scale) || $scale <= 0) {
        trigger_error("log(x) для x <= 0 не определен, вы используете: scale = $scale", E_USER_ERROR);
    }
 
    if (!is_array($vect)) {
        trigger_error("Некорректный входной вектор, пропущен массив значений", E_USER_WARNING);
        return null;
    }
 
    $temp = array();
    foreach($vect as $pos => $value) {
        if (!is_numeric($value)) {
            trigger_error("Значение на позиции $pos не является числом, будет использован 0 (ноль)", E_USER_NOTICE);
            $value = 0;
        }
        $temp[$pos] = log($scale) * $value;
    }
 
    return $temp;
}

function DebugError()
{
   $Result=true;
   echo 'Привет!<br>';


    
 
// определим массив с нечисловым элементом
echo "vector a\n";
$a = array(2, 3, "foo", 5.5, 43.3, 21.11);
print_r($a);
   
// переключаемся на пользовательский обработчик
$old_error_handler = set_error_handler("myErrorHandler");
//restore_error_handler();

/*
// проблема, мы передаем строку вместо массива
echo "<br>1.----\nvector c - a warning\n";
// Некорректный входной вектор, пропущен массив значений 
$c = scale_by_log("not array", 2.3);
var_dump($c); // NULL
*/

$a=0; $a=1/$a;

restore_error_handler();
//$a=0; $a=1/$a;

/* 
// проблема, мы передаем строку вместо массива
echo "<br>2.----\nvector c - a warning\n";
// Некорректный входной вектор, пропущен массив значений 
$c = scale_by_log("not array", 2.3);
var_dump($c); // NULL
*/   
   return $Result;
}
// ********************************************************* DebugError.php *** 
