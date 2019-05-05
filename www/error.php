<?php
// PHP7/HTML5, EDGE/CHROME                                    *** error.php ***

// ****************************************************************************
// * doortry.ru      Разобрать параметры запроса и вывести страницу с ошибкой *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 03.05.2019

$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
require_once $SiteRoot."/TDoorTryer/DoorTryerMessage.php";

$errstr='';    
if (IsSet($_GET['estr'])) 
{
   $errstr=urldecode($_GET['estr']);
}
$errtype='';    
if (IsSet($_GET['etype'])) 
{
   $errtype=urldecode($_GET['etype']);
}
$errline='';    
if (IsSet($_GET['eline'])) 
{
   $errline=urldecode($_GET['eline']);
}
$errfile='';    
if (IsSet($_GET['efile'])) 
{
   $errfile=urldecode($_GET['efile']);
}
$errtrace='';    
if (IsSet($_GET['etrace'])) 
{
   $errtrace=urldecode($_GET['etrace']);
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
   <title>Обработчик ошибок и исключений</title>
   <meta charset="utf-8">
   <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
   <meta name="viewport" content="width=device-width"> 
   <meta name="description" content="DoorTry - обработчик ошибок и исключений">
   <meta name="keywords" content="DoorTry - обработчик ошибок и исключений">
   <!-- 
   <link href="Styles/Styles.css" rel="stylesheet">
   -->
</head>
<body>
<?php

DoorTryMessage($errstr,$errtype,$errline,$errfile,$errtrace);

?>
</body> 
</html>
<?php
// <!-- -->