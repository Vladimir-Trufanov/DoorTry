<?php
// https://habr.com/ru/post/245689/

// Инициируем рабочее пространство страницы
require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteRoot   = $_WORKSPACE[wsSiteRoot];    // Корневой каталог сайта
$SiteAbove  = $_WORKSPACE[wsSiteAbove];   // Надсайтовый каталог
$SiteHost   = $_WORKSPACE[wsSiteHost];    // Каталог хостинга
$SiteDevice = $_WORKSPACE[wsSiteDevice];  // 'Computer' | 'Mobile' | 'Tablet'

   // Подключаем файлы библиотеки прикладных модулей:
   $TPhpPrown=$SiteHost.'/TPhpPrown';
   require_once $TPhpPrown."/TPhpPrown/MakeCookie.php";
   require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";
   prown\ViewGlobal(avgGET);



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>OpenFile test</title>
    <link rel="stylesheet" href="xxStyle.css" type="text/css" media="screen, projection" />
</head>
<body>

<!-- Рисуем нашу кнопку, определяем ей реакцию на нажатие кнопки мыши  -->
<div class="navButtons" onclick="FindFile();" title="Загрузка файла">
   <img src="openfile.png"   width=100% height=100%/></a>
</div>

<!-- Делаем форму   -->
<form action="xxUpload.php?c=x" target="rFrame" method="POST" enctype="multipart/form-data">  
<!-- Формируем спрятанные элементы -->
<div class="hiddenInput">
 <input type="file"   id="my_hidden_file" accept="image/jpeg,image/png,image/gif" name="loadfile" onchange="LoadFile();">  
 <input type="submit" id="my_hidden_load" style="display: none" value='Загрузить'>  
</div></form>
<!-- И скрытый iframe таргет  -->
<iframe id="rFrame" name="rFrame" style="display: none"> </iframe>  

<!-- Подключаем скрипты -->
<script src="xxUpload.js"> </script>
<?php

?>