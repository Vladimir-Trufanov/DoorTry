<?php
?>
   <script> 
   </script>
<?php
// ������� ������ ������� ����
function getPosi($db)
{
    // ������ ������� ������ 
    $sql="SELECT Posi FROM 'Parmi'";
    $st = $db->query($sql);
    $results = $st->fetch();
    return $results;
}
$SiteRooti = $_SERVER['DOCUMENT_ROOT'];       // �������� ������� �����
// ���������� ���� ������  
$pathBase='sqlite:'.$SiteRooti.'/SmartMenus/AjaxBase.db3';                                          
$db = new PDO($pathBase);
// �������� ������ �������
$row = getPosi($db);
echo 'Posi='.$row[0];
?>