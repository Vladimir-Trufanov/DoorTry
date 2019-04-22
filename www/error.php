<?php

require_once $_SERVER['DOCUMENT_ROOT']."/Common.php";

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

\common\DoorTryMessage($errstr,$errtype,$errline,$errfile,$errtrace);