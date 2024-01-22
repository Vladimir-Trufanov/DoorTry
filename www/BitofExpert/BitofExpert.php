<?php
// PHP7/HTML5, EDGE/CHROME                              *** BitofExpert.php ***

// ****************************************************************************
// * Крошки опыта           Кусочки информации о  преодоленных препятствиях в *
// *        программировании всего лишь одного человека. Здесь не представлен *
// *        весь путь: ассемблеры, алгол, фортран, кобол, бэйсик, c, clipper, *
// *        delphi, lazarus, java, PHP, js, apitor, arduino, chto-esche-budet * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  21.01.2024
// Copyright © 2024 tve                              Посл.изменение: 21.01.2024

/*
// Подключаем особенности стиля для компьютерной и мобильной версий
if ($SiteDevice==Mobile) 
{   
   //echo '<link href="/Styles/TPhpPrownMobi.css" rel="stylesheet">';
}
else 
{   
   //echo '<link href="/Styles/TPhpPrownComp.css" rel="stylesheet">';
}
*/

/*
// Загружаем файл html
$FileContent=file_get_contents($SiteRoot."/Pages/BitofExpert/BitofExpert.html");

// Спецсимволы, которые следует экранировать:       $ ^ . * + ? \ { } [ ] ( ) |
// по опыту tve (22.01.2024) экранировать:          -
// ограничитель рег.выражения / , то экранировать:  /

// Не являются спецсимволами:
// @ : , ' " ; - _ = < > % # ~ ` & ! /

$FileContent=preg_replace('/<!DOCTYPE([0-9a-zA-Zа-яёА-ЯЁ><!=":;,%\[\]\{\}\/\-\.\s\n\r]+)body/u', '<body', $FileContent);
echo $FileContent;
*/

require_once "BitofExpert.html";

// ******************************************************** BitofExpert.php ***

