<?php
// PHP7/HTML5, EDGE/CHROME                               *** SignaPhoto.php ***

// ****************************************************************************
// * SignaPhoto                                              Главный модуль - *
// *                                сайтостраница для подписывания фотографий *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  01.06.2021
// Copyright © 2021 tve                              Посл.изменение: 15.06.2021

// Инициируем рабочее пространство страницы
require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();
$SiteRoot   = $_WORKSPACE[wsSiteRoot];    // Корневой каталог сайта
$SiteAbove  = $_WORKSPACE[wsSiteAbove];   // Надсайтовый каталог
$SiteHost   = $_WORKSPACE[wsSiteHost];    // Каталог хостинга
$SiteDevice = $_WORKSPACE[wsSiteDevice];  // 'Computer' | 'Mobile' | 'Tablet'
// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteHost."/TDoorTryer/DoorTryerPage.php";
try 
{
   // Подключаем файлы библиотеки прикладных модулей:
   $TPhpPrown=$SiteHost.'/TPhpPrown';
   require_once $TPhpPrown."/TPhpPrown/ViewGlobal.php";




// определяем callback функцию основного окна которой вернем ответ по окончанию загрузки 
 function jsOnResponse($obj)  
 {  
 echo '<script type="text/javascript"> window.parent.onResponse("'.$obj.'"); </script> ';  
 }  
 
function get_file_extension($file_name)
{
  return substr(strrchr($file_name,'.'),1);
}
 
 
// определяем куда скопируем файл пользователя
 $dir = 'tempi/';  
 $exti= get_file_extension(basename($_FILES['loadfile']['name']));
 $name = 'x25'; // basename($_FILES['loadfile']['name']);  
 $file = $dir . $name.'.'.$exti;  
 
echo '++++'.$file.'+++++<br>'; 
echo '++++ $SiteRoot '.$SiteRoot.'+++++<br>'; 
//копируем файл и получаем результат
 $success = move_uploaded_file($_FILES['loadfile']['tmp_name'], $file);  
//вызываем callback функцию и передаем ей результат
 jsOnResponse("{'filename':'" . $name . "', 'success':'" . $success . "'}");  


   //prown\ViewGlobal(avgGET);
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}


?> 
