<?php
// PHP7/HTML5, EDGE/CHROME                         *** SignaPhotoUpload.php ***

// ****************************************************************************
// * SignaPhoto        Выполнить окончательную переброску файла, загруженного *
// *   во временный каталог, на целевое место; провести контроль файла        *        
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  04.11.2021
// Copyright © 2021 tve                              Посл.изменение: 04.11.2021

// Готовим окончательную переброску файла, загруженного во временный каталог,
// в целевой каталог "TempServer" на хостинге под первоначальным именем
$uploaddir = '../../../../TempServer/'; 
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
//  
echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}
echo 'Некоторая отладочная информация:';
print_r($_FILES);
print "</pre>";

// *** <!-- --> ************************************** SignaPhotoUpload.php ***
