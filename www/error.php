<?php
    
if (IsSet($_GET['etrace'])) 
{
   $errtrace=urldecode($_GET['etrace']);
   echo  
}



 
    echo "<br>-----------------------------";
    echo "<pre>";
    echo "<b>".'$errstr'."</b><br><br>";
    echo "File: ".'$errfile'."<br>";
    echo "Line: ".'$errline'."<br><br>";
    echo '$errtype'."<br>";
    //if (!($errtrace=='')) {echo $errtrace."<br>";}
 
    
    
    echo "</pre>";
    echo "-----------------------------<br>";
