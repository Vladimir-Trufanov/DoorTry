<?php
//echo "ajaks\r\n";

?>

  <script> 
  varValue=1;
  //console.log('Ajaks1 = '+varValue);
  if (window.localStorage)
  {
      varValue=localStorage.getItem('Ajaks');
      if (typeof varValue == "object") varValue=1;
      if (typeof varValue == "undefined") varValue=1;
      varValue=Number(varValue);
   }
   //console.log('Ajaks2 = '+varValue);
   varValue=Number(varValue)+1;
   //console.log('Ajaks3 = '+varValue);
   if (window.localStorage)
   {
      localStorage.setItem('Ajaks',varValue);
   }
   console.log('Ajaks = '+varValue);
   </script>
<?php

/*
   $SiteRoot = $_SERVER['DOCUMENT_ROOT'];       // Корневой каталог сайта
   $pathBase='sqlite:'.$SiteRoot.'/sort.db3';                                          
   $db = new PDO($pathBase);
   //echo "ajaks\r\n";
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