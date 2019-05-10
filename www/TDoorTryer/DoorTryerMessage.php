<?php
// PHP7/HTML5, EDGE/CHROME                         *** DoorTryerMessage.php ***

// ****************************************************************************
// * doortry.ru                        Вывести сообщение об ошибке/исключении *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.04.2019
// Copyright © 2019 tve                              Посл.изменение: 10.05.2019

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
