<?php
// PHP7/HTML5, EDGE/CHROME                            *** SignaPhotoDef.php ***

// ****************************************************************************
// * SignaPhoto       Совместные определения(переменные) для модулей PHP и JS *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.07.2021
// Copyright © 2021 tve                              Посл.изменение: 03.08.2021

// Определения для PHP
define ("ajErrBigFile",   "Файл превышает максимальный размер");  
define ("ajErrorisLabel", "Не найдена метка в переданном сообщении");  
define ("ajErrTempoFile", "Ошибка при загрузке файла во временное хранилище");
define ("ajInfoLoadImg",  "Загрузите изображение для нанесения подписи");     
define ("ajNoSetFile",    "Не установлен массив файлов и не загружены данные");
define ("ajNoTempoFile",  "Не загружен файл во временное хранилище");
define ("ajSuccessfully", "Файл успешно загружен");     

// Переменные JavaScript, соответствующие определениям в PHP
$define=
'<script>'.
'ajErrBigFile="'  .ajErrBigFile.  '";'.
'ajErrorisLabel="'.ajErrorisLabel.'";'.
'ajErrTempoFile="'.ajErrTempoFile.'";'.
'ajInfoLoadImg="' .ajInfoLoadImg. '";'.
'ajNoSetFile="'   .ajNoSetFile.   '";'.
'ajNoTempoFile="' .ajNoTempoFile. '";'.
'ajSuccessfully="'.ajSuccessfully.'";'.
'</script>';

// ****************************************************** SignaPhotoDef.php ***
