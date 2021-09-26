<?php
// PHP7/HTML5, EDGE/CHROME                               *** MakeQrcode.php ***

// ****************************************************************************
// * doortry.ru                                           Сформировать QrCode *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 01.06.2019

function MakeQrcode()
{
   $Result = true;
   ?>
   <!-- 1 штрих-код 
   <div style="text-align:center;">
   <a target="_blank" style="font-family:arial;text-decoration:none;color:#000;font-size:13px;" 
      href="http://qrcc.ru/qrcode.html">
      <script type="text/javascript" src="http://qrcc.ru/urlqr.js"></script><br>
      QR код этой страницы
   </a>
   </div>
   -->
   <?php
    
   // 2 штрих-код
   include "QrCode/qrlib.php";
   //QRcode::png("https://doortry.ru/Stihi/sorevnovanie-s-hakerami/",
   //"sorevnovanie-s-hakerami.png","L",4,4);
   //QRcode::png("https://doortry.ru - Обработчик ошибок и исключений","doortry.png","L",4,4);
  
   // 3 штрих-код
   /*
   include "QrCode/qrlib.php";
   $backColor = 0xFFFF00; //0x555555;
   $foreColor = 0xFF00FF; //0x111111;
   QRcode::png("http://doortry.ru/%D0%A1%D1%82%D0%B8%D1%85%D0%B8/%D0%A1%D0%BE%D1%80%D0%B5%D0%B2%D0%BD%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5%20%D1%81%20%D1%85%D0%B0%D0%BA%D0%B5%D1%80%D0%B0%D0%BC%D0%B8/","sorevnovanie-s-hakerami.png","L",4,4,false,$backColor,$foreColor);
   */
   return $Result;
}
// <!-- --> ************************************************ MakeQrcode.php ***
