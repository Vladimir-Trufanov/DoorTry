<?php 

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
   //echo '$TypeError='.$TypeError;
   DoorTryExec
   (
      $e->getMessage(),$TypeError,
      $e->getLine(),$e->getFile(),$e->getTraceAsString()
   );
}
