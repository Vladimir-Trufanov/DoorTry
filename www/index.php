<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// *  *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 11.04.2019





require_once "TDoorTryer/DoorTryerClass.php";
$w2e = new DoorTryer(E_ALL);
try 
{

   echo 'Привет!<br>';
   include 'includErrs.php'; 
   echo '<br>Hi!';

} 
catch (E_EXCEPTION $e) 
{
   echo "<pre><b>ex Перехвачена ошибка!</b><br>".$e."</pre>";
}
catch (Error $e) 
{
   echo "<pre><b>er Перехвачена ошибка!</b><br>".$e."</pre>";
}
unset($w2e);

  
// ************************************************************** index.php ***
