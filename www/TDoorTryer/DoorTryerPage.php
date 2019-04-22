<?php 


require_once $_SERVER['DOCUMENT_ROOT']."/Common.php";
//\common\Headeri("/Main.php?Com=Atfirst");







// Функции и классы для обработки ошибок PHP7+
// (преобразования ошибок PHP в исключения)

function DoorTryMessage($errstr,$errtype,$errline='',$errfile='',$errtrace='')
{
    echo "<br>-----------------------------";
    echo "<pre>";
    echo "<b>".$errstr."</b><br><br>";
    echo "File: ".$errfile."<br>";
    echo "Line: ".$errline."<br><br>";
    echo $errtype."<br>";
    if (!($errtrace=='')) {echo $errtrace."<br>";}
    echo "</pre>";
    echo "-----------------------------<br>";
    //\common\Headeri("/error.php?etrace=".urlencode($errtrace));
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
   DoorTryMessage
   (
      $e->getMessage(),$TypeError,
      $e->getLine(),$e->getFile(),$e->getTraceAsString()
   );
}
