<?php

setcookie('fam','Труфанов');
setcookie('fami','Труфановый');
$_COOKIE['fami']='Лайкачева';
$fam="Ивановbxjd Сергей";
$fam=$_COOKIE['fami'];
$user_info=
[
   "brat"=>["fio"=>$fam,"birthday"=>"09.03.1977"],
   "drug"=>["fio"=>"Петров Алексей","birthday"=>"18.09.1983"],
];
//echo $user_info['drug']['fio'];
echo json_encode($user_info);
exit;
?>