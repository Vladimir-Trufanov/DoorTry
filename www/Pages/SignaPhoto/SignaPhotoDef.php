<?php

// Определения для PHP
define ("ajErrBigFile",   "Файл превышает максимальный размер");  
define ("ajNoSetFile",    "Не установлен массив файлов и не загружены данные");
define ("ajErrorisLabel", "Не найдена метка в переданном сообщении");  
define ("ajErrTempoFile", "Ошибка при загрузке файла во временное хранилище");
define ("ajInfoLoadImg",  "Загрузите изображение для нанесения подписи");     
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
