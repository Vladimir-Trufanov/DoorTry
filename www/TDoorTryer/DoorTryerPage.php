<?php 
// Функции и классы для обработки ошибок PHP7+
// (преобразования ошибок PHP в исключения)

function DoorTryMessage($errstr,$TypeError,$errline='',$errfile='',$TraceAsString='')
{
    echo "<br>-----------------------------";
    echo "<pre>";
    echo "<b>".$errstr."</b><br><br>";
    echo "File: ".$errfile."<br>";
    echo "Line: ".$errline."<br><br>";
    echo $TypeError."<br>";
    if (!($TraceAsString=='')) {echo $TraceAsString."<br>";}
    echo "</pre>";
    echo "-----------------------------<br>";
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
   DoorTryerMessage
   (
      $e->getMessage(),$TypeError,
      $e->getLine(),$e->getFile(),$e->getTraceAsString()
   );
}
