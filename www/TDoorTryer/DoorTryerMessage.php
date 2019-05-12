<?php
// PHP7/HTML5, EDGE/CHROME                         *** DoorTryerMessage.php ***

// ****************************************************************************
// * doortry.ru                        Вывести сообщение об ошибке/исключении *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.04.2019
// Copyright © 2019 tve                              Посл.изменение: 12.05.2019

/**
 * Сообщение об ошибке или исключении собирается на основании 5 параметров:
 * $errstr - текст сообщения; $errtype - тип сообщения; $errline - строка 
 * сценария, где произошла ошибка или исключение; $errfile - файл сценария; 
 * $errtrace - трассировка всплывания сообщения
**/

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
// *************************************************** DoorTryerMessage.php ***
