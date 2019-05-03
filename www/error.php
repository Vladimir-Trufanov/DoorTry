<?php

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
}

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

//echo '==='.$errtrace.'===';
DoorTryMessage($errstr,$errtype,$errline,$errfile,$errtrace);