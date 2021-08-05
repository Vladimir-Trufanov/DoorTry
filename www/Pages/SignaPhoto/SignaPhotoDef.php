<?php
// PHP7/HTML5, EDGE/CHROME                            *** SignaPhotoDef.php ***

// ****************************************************************************
// * SignaPhoto       Совместные определения(переменные) для модулей PHP и JS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.07.2021
// Copyright © 2021 tve                              Посл.изменение: 05.08.2021

// Определения для PHP
define ("ajErrBigFile",     "Файл превышает максимальный размер"); 
define ("ajErrFreshStamp",  "Ошибка при наложении подписи на изображение");
define ("ajErrMoveServer",  "Ошибка при перемещении файла на сервер");  
define ("ajErrorisLabel",   "Не найдена метка в переданном сообщении");  
define ("ajErrTempoFile",   "Ошибка при загрузке файла во временное хранилище");
define ("ajInfoLoadImg",    "Загрузите изображение для нанесения подписи");     
define ("ajInvalidType",    "Неверный тип файла изображения");  
define ("ajIsFreshStamp",   "На изображение наложена свежая подпись");
define ("ajLostScriptFile", "Утерян файл скрипта");   
define ("ajNoSetFile",      "Не установлен массив файлов и не загружены данные");
define ("ajNoTempoFile",    "Не загружен файл во временное хранилище");
define ("ajSuccessfully",   "Файл успешно загружен");     

// Переменные JavaScript, соответствующие определениям в PHP
$define=
'<script>'.
'ajErrBigFile="'     .ajErrBigFile.    '";'.
'ajErrFreshStamp="'  .ajErrFreshStamp. '";'.
'ajErrMoveServer="'  .ajErrMoveServer. '";'.
'ajErrorisLabel="'   .ajErrorisLabel.  '";'.
'ajErrTempoFile="'   .ajErrTempoFile.  '";'.
'ajInfoLoadImg="'    .ajInfoLoadImg.   '";'.
'ajInvalidType="'    .ajInvalidType.   '";'.
'ajIsFreshStamp="'   .ajIsFreshStamp.  '";'.
'ajLostScriptFile="' .ajLostScriptFile.'";'.
'ajNoSetFile="'      .ajNoSetFile.     '";'.
'ajNoTempoFile="'    .ajNoTempoFile.   '";'.
'ajSuccessfully="'   .ajSuccessfully.  '";'.
'</script>';

// ****************************************************** SignaPhotoDef.php ***
