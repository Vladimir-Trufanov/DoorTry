<?php 


require_once $_SERVER['DOCUMENT_ROOT']."/Common.php";
//\common\Headeri("/Main.php?Com=Atfirst");







// Функции и классы для обработки ошибок PHP7+
// (преобразования ошибок PHP в исключения)

function DoorTryExec($errstr,$errtype,$errline='',$errfile='',$errtrace='')
{
   // \common\Headeri("/error.php");

   /*
    \common\Headeri("/error.php".
      "?estr=".urlencode($errstr).
      "&etype=".urlencode($errtype).
      "&eline=".urlencode($errline).
      "&efile=".urlencode($errfile).
      "&etrace=".urlencode($errtrace));
   */
   
   //$uripage="error.php".
   $uripage="http://kwinflatht.nichost.ru/error.php".
   //$uripage="http://localhost:82/error.php".
      "?estr=".urlencode($errstr).
      "&etype=".urlencode($errtype).
      "&eline=".urlencode($errline).
      "&efile=".urlencode($errfile).
      "&etrace=".urlencode($errtrace);
   
   
   //        document.location.replace("index.php?Com=Cook");
   //echo '--script';
   echo '<script>';
   //echo 'document.location.assign("'.'error.php'.'")';
   //echo 'window.location.assign("'.'http://ittve.me'.'")';
   echo 'window.location.assign("'.$uripage.'")';

   //echo 'document.location.replace("'.$uripage.'")';
   //echo 'document.location.assign("'.$uripage.'")';
   echo '</script>';
   //echo '==script';

      
      
}

function DoorTryPage($e)
{
   //echo '***'.$e.'***';
   // Определяем тип ошибки
   $value=\prown\MakeRegExp(regErrorType,$e,$matches,false);
   if ($value>0)
   {
      $findes=$matches[0]; 
      $TypeError=$findes[0][0]; $Point=$findes[0][1];  
   }
   else
   {
      $TypeError='NoDefine'; $Point=-1;  
   }
   //echo '$TypeError='.$TypeError;
   DoorTryExec
   (
      $e->getMessage(),$TypeError,
      $e->getLine(),$e->getFile(),$e->getTraceAsString()
   );
}
