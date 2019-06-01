<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Site.php ***

// ****************************************************************************
// * doortry.ru                                      Выполнить разметку сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 01.06.2019

?>
<div class="pageWrapper">
   
   <header>
      <?php
      IniTopMenu();
      ?>
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
   
   
   // 2 штрих-код
   //include "QrCode/qrlib.php";
   //QRcode::png("TPhpPrown - библиотека PHP-прикладных функций","TPhpPrown.png","L",4,4);
   

   //QRcode::png("http://doortry.ru - Обработчик ошибок и исключений","doortry.png","L",4,4);
   //QRcode::png("http://ittve.me", "test.png", "L", 4, 4);
  
   // 3 штрих-код
   //$backColor = 0xFFFF00; //0x555555;
   //$foreColor = 0xFF00FF; //0x111111;
   //QRcode::png("http://doortry.ru","doortry.png","L",4,4,false,$backColor,$foreColor);
   
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
    <li>Столица на онего</li>
  </ul>

<p><img src="imgs/gator.jpg" alt="Аллигатор"></p>

<h3>Столица на онего</h3>
<p>
<?php
//echo '$p_FormNews='.$p_FormNews.'<br>';
//echo '$p_AmtNews ='.$p_AmtNews.'<br>';

$urlNews="http://www.stolica.onego.ru/rss.php/feed.xml";
if ($p_FormNews==frnSimple) 
{
   require_once $SiteRoot."/Pages/News/SimpleTape.php";   
   SimpleTape($urlNews,$p_AmtNews);
}
else
{
   require_once $SiteRoot."/Pages/News/WithImgTape.php";   
   WithImgTape($urlNews,$p_AmtNews);
}
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
