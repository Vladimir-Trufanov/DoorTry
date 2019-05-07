<?php
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// *      DOORTRY - сайт сбора ошибок и формирования страницы с ошибками      *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 07.05.2019

$SiteRoot=$_SERVER['DOCUMENT_ROOT'];



require_once $SiteRoot."/TDoorTryer/DoorTryerPage.php";
try 
{
   require_once $SiteRoot."/Main.php";
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}
