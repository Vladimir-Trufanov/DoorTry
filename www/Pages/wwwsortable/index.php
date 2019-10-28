<?php require_once 'db.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
<meta name="Description" content="" />
<meta name="KeyWords" content="" />

<title>Сортировка</title>

<link type="text/css" href="css/jquery-ui-1.8.14.custom.css" rel="stylesheet" />

<style>
	#sortable { list-style-type: none; margin: 0; padding: 0; width: 200px; }
	#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 15px; cursor: pointer;}
	#sortable li span { position: absolute; margin-left: -1.3em; }
</style>


</head>
<body>

<?php

$res = mysql_query("SELECT * FROM `sortable` ORDER BY `position`") or die(mysql_error());
echo "<ul id='sortable'>\r\n";
while($row = mysql_fetch_assoc($res)){
	echo "<li id='{$row['id']}' class='ui-state-default'>{$row['name']}</li>\r\n";
}
echo "</ul>";

?>


</body>
</html>