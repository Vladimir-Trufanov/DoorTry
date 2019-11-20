<?php
   $SiteRooti = $_SERVER['DOCUMENT_ROOT'];       // Корневой каталог сайта
   // Подключаем базу данных  
   $pathBase='sqlite:'.$SiteRooti.'/SmartMenus/AjaxBase.db3';                                          
   $db = new PDO($pathBase);
   $sql="UPDATE `Parmi` SET `Posi`=3678";

/*   
   UPDATE <имя таблицы>
SET {<имя столбца> = {<выражение для вычисления значения столбца>

UPDATE Laptop 
SET price = price*0.9;
*/

   $st = $db->query($sql);
   /*
   $pos_new = 100;
   foreach($_POST['masiv'] as $item)
   {
      //$res = mysql_query("UPDATE `sortable` SET `position`='{$pos_new}' WHERE `id`='{$item}'");
      $sql="UPDATE `sortable` SET `position`='{$pos_new}' WHERE `id`='{$item}'";
      $st = $db->query($sql);
      //$results = $st->fetchAll();

      $pos_new++;
   }
   */
?>

<?php
//echo "ajaks\r\n";

?>

  <script> 
  varValue=1;
  //console.log('Ajaks1 = '+varValue);
  if (window.localStorage)
  {
      varValue=localStorage.getItem('AjaksClick');
      if (typeof varValue == "object") varValue=1;
      if (typeof varValue == "undefined") varValue=1;
      varValue=Number(varValue);
   }
   //console.log('Ajaks2 = '+varValue);
   varValue=Number(varValue)+1001;
   console.log('Ajaks3 = '+varValue);
   if (window.localStorage)
   {
      localStorage.setItem('AjaksClick',varValue);
   }
   console.log('AjaksClick = '+varValue);
   </script>
<?php
