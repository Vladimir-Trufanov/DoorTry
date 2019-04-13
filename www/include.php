<?php

// Parse error: syntax error, unexpected 'echo' (T_ECHO), expecting ',' or ';' 
//              in C:\Webservers\DoorTry\www\include.php on line 6
//echo "Hi" 
//echo "Hello";

// Warning: fopen(spoon): failed to open stream: No such file or directory 
//          in C:\Webservers\DoorTry\www\include.php on line 10
//fopen("spoon", "r");

// Fatal error: Uncaught Error: [] operator not supported for strings 
//              in C:\Webservers\DoorTry\www\include.php:17 
//              Stack trace: #0 C:\Webservers\DoorTry\www\index.php(426): 
//              include() #1 {main} thrown in C:\Webservers\DoorTry\www\include.php on line 17
//$str='try';
//$str[]=4;
    
// E_COMPILE_ERROR
// Warning:     require_once(not-exists.php): failed to open stream: No such file or directory 
//              in C:\Webservers\DoorTry\www\include.php on line 25
// Fatal error: require_once(): Failed opening required 'not-exists.php' 
//              (include_path='.;C:\php\pear') 
//              in C:\Webservers\DoorTry\www\include.php on line 25
//require_once 'not-exists.php';

// Warning: include_once(not-exists.php): failed to open stream: No such file or directory 
//          in C:\Webservers\DoorTry\www\include.php on line 32
// Warning: include_once(): Failed opening 'not-exists.php' 
//          for inclusion (include_path='.;C:\php\pear') 
//          in C:\Webservers\DoorTry\www\include.php on line 32
include_once 'not-exists.php';



?>