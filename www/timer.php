<?php
?>
   <script> 
   </script>
<?php
// Выбрать массив пунктов меню
function getPosi($db)
{
    // Делаем выборку данных 
    $sql="SELECT Posi FROM 'Parmi'";
    $st = $db->query($sql);
    $results = $st->fetch();
    return $results;
}
$SiteRooti = $_SERVER['DOCUMENT_ROOT'];       // Корневой каталог сайта
// Подключаем базу данных  
$pathBase='sqlite:'.$SiteRooti.'/SmartMenus/AjaxBase.db3';                                          
$db = new PDO($pathBase);
// Выбираем массив позиций
$row = getPosi($db);
echo 'Posi='.$row[0];
?>