<?php
require_once $SiteRoot."/iHtmlBegin.php";
echo 'Приветик из Main! ';

$config_file_path="config.php"; testFile($config_file_path);
//print_age(-10);
//$str='try'; $str[]=4;
//@filemtime("spoon");
//filemtime("spoon");

require_once $SiteRoot."/includErrs.php";
//require_once $SiteRoot."/Site.php";

echo 'Завершение в Main! ';
require_once $SiteRoot."/iHtmlEnd.php";
