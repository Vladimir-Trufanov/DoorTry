<?php
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
//копируем файл и получаем результат
 $success = move_uploaded_file($_FILES['loadfile']['tmp_name'], $file);  
//вызываем callback функцию и передаем ей результат
 jsOnResponse("{'filename':'" . $name . "', 'success':'" . $success . "'}");  
?> 
