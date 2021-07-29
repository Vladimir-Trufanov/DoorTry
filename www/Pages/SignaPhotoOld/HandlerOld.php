<?php

/*
$_FILES['loadfile']=Array(
   [name]     => MyFile.txt (comes from the browser, so treat as tainted)
   [type]     => text/plain  (not sure where it gets this from - assume the browser, so treat as tainted)
   [tmp_name] => /tmp/php/php1h4j1o (could be anywhere on your system, depending on your config settings, 
                 but the user has no control, so this isn't tainted)
   [error]    => UPLOAD_ERR_OK  (= 0)
   [size]     => 123   (the size in bytes)
)
*/

// Проверяем установлен ли массив файлов и массив с переданными данными
if(isset($_FILES) && isset($_FILES['image'])) 
{
  //Переданный массив сохраняем в переменной
  $image = $_FILES['image'];
  // Проверяем размер файла и если он превышает заданный размер
  // завершаем выполнение скрипта и выводим ошибку
  if ($image['size'] > 300000) {die('Большой файл!');}
  // Достаем формат изображения
  $imageFormat = explode('.', $image['name']);
  $imageFormat = $imageFormat[1];
  // Генерируем новое имя для изображения. Можно сохранить и со старым
  // но это не рекомендуется делать
  //$imageFullName='./images/'.hash('crc32',time()).'.'.$imageFormat;
  $imageFullName='./images/photo.'.$imageFormat;
  // Сохраняем тип изображения в переменную
  $imageType = $image['type'];
  // Сверяем доступные форматы изображений, если изображение
  // соответствует, копируем изображение в папку images
  if ($imageType == 'image/jpeg' || $imageType == 'image/png' || $imageType == 'image/gif') 
  {
    // Если переброска файла на сервер произошла успешно, указываем это в сообщении
    if (move_uploaded_file($image['tmp_name'],$imageFullName)) {echo 'Успешно!';}
    // Отмечаем ошибочную переброску 
    else {echo 'Ошибка переброса!';}
  }
  else echo 'Не изображение!';
}
