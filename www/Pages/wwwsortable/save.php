<?php 

require_once 'db.php';

$pos_new = 1;
foreach($_POST['masiv'] as $item){
	$res = mysql_query("UPDATE `sortable` SET `position`='{$pos_new}' WHERE `id`='{$item}'");
	$pos_new++;
}

?>