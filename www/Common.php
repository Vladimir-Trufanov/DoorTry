<?php namespace common;
// PHP7/HTML5, EDGE/CHROME                                   *** Common.php ***

// ****************************************************************************
// * doortry.ru                                     Блок общесайтовых функций *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  22.04.2019
// Copyright © 2019 tve                              Посл.изменение: 22.04.2019

// ****************************************************************************
// *                 Послать заголовок с настройкой на HTTPS                  *
// ****************************************************************************
function Headeri($page)
{
    if ($_SERVER['HTTP_HOST']=='doortry.ru')
    {
        //echo "Location: https://".$_SERVER['HTTP_HOST'].$page;
        Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
    }
    else 
    {
        //echo "Location: http://".$_SERVER['HTTP_HOST'].$page;
        Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
    }
}

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


// ************************************************************* Common.php ***

