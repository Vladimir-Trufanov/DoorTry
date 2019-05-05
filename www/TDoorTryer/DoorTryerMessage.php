<?php
function DoorTryMessage($errstr,$errtype,$errline='',$errfile='',$errtrace='')
{
   echo '<div style="border-style:inset; border-width:2">';
   echo "<pre>";
   echo "<b>".$errstr."</b><br><br>";
   echo "File: ".$errfile."<br>";
   echo "Line: ".$errline."<br><br>";
   echo $errtype."<br>";
   if (!($errtrace=='')) {echo $errtrace."<br>";}
   echo "</pre>";
   echo "</div>";
}
