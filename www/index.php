<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// * DOORTRY       сайт сбора сообщений об ошибках/исключениях и формирования *
// *         страницы с выводом сообщений, а также комментариев для PHP5-PHP7 *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 10.05.2019

$SiteRoot=$_SERVER['DOCUMENT_ROOT'];

$FaultLocation=false;
require_once $SiteRoot."/TDoorTryer/DoorTryerPage.php";
try 
{
   //require_once $SiteRoot."/Main.php";
   require_once $SiteRoot."/MainDoorTry.php";
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
// ************************************************************** index.php ***
