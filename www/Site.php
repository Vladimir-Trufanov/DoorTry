<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * ittve.me                          Обо мне, путешествиях и ... Черногории *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 19.02.2019

?>

<div class="pageWrapper">
<header>
<nav class="clear">
<ul>
<li><a href="#">Простой принцип</a></li>
<li><a href="#">Штрихотворения</a></li>
<li><a href="#">SoftШутки</a></li>
<li><a href="includErrs.php">Ошибки</a></li>
<li><a href="#">Контакты</a></li>
</ul>
</nav>
<h1>DoorTry - коллекционер ошибок</h1>
</header>
<div class="contentWrapper">
<div class="columnWrapper">

<article class="main">
  <h2>Название</h2>

<?php
   /*
   <!-- 1 штрих-код -->
   <div style="text-align:center;">
   <a target="_blank" style="font-family:arial;text-decoration:none;color:#000;font-size:13px;" 
      href="http://qrcc.ru/qrcode.html">
   <script type="text/javascript" src="http://qrcc.ru/urlqr.js"></script><br>
   QR код этой страницы
   </a>
   </div>
   */
   
   /*
   // 2 штрих-код
   include "phpqrcode/qrlib.php";
   QRcode::png("http://ittve.me", "test.png", "L", 4, 4);
  
   // 3 штрих-код
   $backColor = 0xFFFF00; //0x555555;
   $foreColor = 0xFF00FF; //0x111111;
   QRcode::png("http://doortry.ru","doortry.png","L",4,4,false,$backColor,$foreColor);
   */
?>
 
  <p><img src="imgs/clouds.jpg" alt="Облака" class="half right">Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum.</p>
  <p>Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. </p>
  <p>Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. </p>
  <h3><img src="imgs/jellyfish.jpg" alt="Медуза" class="half left">Подзаголовок</h3>
  <p>Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. </p>
  <h3>Подзаголовок</h3>
  <p>Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tor</p>
</article>

<!-- первая боковая панель -->
<aside class="sidebar1">
  <h2>Новости</h2>
  <ul>
    <li>Яндекс-Новости</li>
    <li>Лига-Новости</li>
  </ul>
  <p><img src="imgs/gator.jpg" alt="Аллигатор"></p>


  <h3>Яндекс-Новости</h3>

<p>

<?php
 
$url = "https://news.yandex.ru/gadgets.rss?&";
  $content = file_get_contents($url);
  $items = new SimpleXmlElement($content);
 
  print "<ul>";
   $Point=1;
   foreach($items -> channel -> item as $item) 
   {
    print "<li><a href = '{$item->link}' title = '$item->title'>" .
    $item->title . "</a> - " . $item -> description . "</li>";
   $Point=$Point+1;
   
   if ($Point>2) {break;}
   
   }
 
  print "</ul>";
?>
</p>
 

  <h3>Лига-Новости</h3>
<p>

<?php

   $rss = simplexml_load_file ( 'http://news.liga.net/economics/rss.xml' );
   
   
   echo ''."\n";
   $Point=1;
   foreach ( $rss->channel->item as $item )  
   {
      $image = $item->enclosure;  
      $item->pubDate = date("H:i ", strtotime("$item->pubDate"));  
      echo '<details class="rss_sp">';
      echo '<img src="'.$image['url'].'" width="'.$image['width'].
         '" height="'.$image['height'].'" alt="" class="image_link" />';
      echo '<td>';  
      echo '<summary><span>'.$item->title.'</span></summary>';  
      echo '<div><p>'.$item->description.'</p></div><a href="'.
         $item->link.'"target="blank" class="link">Подробнее</a>';  
      echo '</td>';  echo '</details>'."\n";  
      echo '<tr><td colspan="2">&nbsp;</td></tr>'."\n";  
      echo '<span class="date">'.$item->pubDate.'</span>';  
   $Point=$Point+1;
   if ($Point>2) {break;}

   }
   echo ' ';
   
   //phpinfo();



?>
</p>

</aside>
</div>

<!-- вторая боковая панель -->
<aside class="sidebar2">
<h2>Всякое-разное</h2>
  <p>Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor.Suspendisse vitae quam lorem, in tempus velit. </p>
  <p><img src="imgs/mule.jpg" alt="Ослик"></p>
  <p>Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor.Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor.</p>
</aside>
</div>
<footer>
<p>Copyright © 2019 tve</p> 
<p>---</p> 
<p>Контакты: <a href="mailto:tve58@inbox.ru">tve58@inbox.ru</a></p>
</footer>
</div>

<?php
// <!-- --> ****************************************************** Site.php ***
